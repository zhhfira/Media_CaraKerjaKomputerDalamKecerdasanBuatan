<?php

use App\Http\Controllers\Admin\QuestionAdminController;
use App\Http\Controllers\Admin\QuizAdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

/* LANDING (publik) */
Route::get('/', fn () => view('landing'))->name('landing');
Route::get('/tentang', fn () => view('tentang'))->name('tentang');

/* GUEST (belum login) */
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'registerLihat'])->name('register.lihat');
    Route::post('/register/submit', [AuthController::class, 'registerSubmit'])->name('register.submit');

    Route::get('/login', [AuthController::class, 'loginLihat'])->name('login.lihat');
    Route::post('/login/submit', [AuthController::class, 'loginSubmit'])->name('login.submit');
});

/* AUTH (sudah login) */
Route::middleware('auth')->group(function () {

    // Dashboard siswa & guru
    Route::get('/siswa/dashboard', [SiswaController::class, 'dashboard'])
        ->name('siswa.dashboard');
    Route::get('/siswa/leaderboard', [SiswaController::class, 'leaderboard'])
        ->name('siswa.leaderboard');
    Route::get('/guru/dashboard', [GuruController::class, 'dashboard'])
        ->name('guru.dashboard');
        
    // === SISWA: QUIZ (wajib login) ===
    Route::get('/quiz/{quiz}', [QuizController::class, 'show'])->name('quiz.show');
    Route::post('/quiz/{quiz}/submit', [QuizController::class, 'submit'])->name('quiz.submit');

    // === GURU/ADMIN: CRUD QUIZ + SOAL (wajib login + usertype admin) ===
    Route::middleware('admin')->prefix('guru')->name('guru.')->group(function () {

        // (Kalau kamu sudah punya halaman list quiz, ini aktif)
        Route::get('/quizzes', [QuizAdminController::class, 'index'])->name('quizzes.index');
        Route::get('/quizzes/create', [QuizAdminController::class, 'create'])->name('quizzes.create');
        Route::post('/quizzes', [QuizAdminController::class, 'store'])->name('quizzes.store');
        Route::get('/quizzes/{quiz}/edit', [QuizAdminController::class, 'edit'])->name('quizzes.edit');
        Route::put('/quizzes/{quiz}', [QuizAdminController::class, 'update'])->name('quizzes.update');
        Route::delete('/quizzes/{quiz}', [QuizAdminController::class, 'destroy'])->name('quizzes.destroy');

        // === FORMAL: SOAL per QUIZ ===
        Route::get('/quizzes/{quiz}/questions', [QuestionAdminController::class, 'index'])->name('questions.index');
        Route::get('/quizzes/{quiz}/questions/create', [QuestionAdminController::class, 'create'])->name('questions.create');
        Route::post('/quizzes/{quiz}/questions', [QuestionAdminController::class, 'store'])->name('questions.store');

        Route::get('/quizzes/{quiz}/questions/{question}/edit', [QuestionAdminController::class, 'edit'])->name('questions.edit');
        Route::put('/quizzes/{quiz}/questions/{question}', [QuestionAdminController::class, 'update'])->name('questions.update');

        Route::delete('/quizzes/{quiz}/questions/{question}', [QuestionAdminController::class, 'destroy'])->name('questions.destroy');

        // Data siswa & nilai (view kamu: guru/datasiswa, guru/nilaisiswa)
        Route::get('/datasiswa', [GuruController::class, 'datasiswa'])->name('datasiswa');
        Route::get('/nilaisiswa', [GuruController::class, 'nilaisiswa'])->name('nilaisiswa');
    });

    // Materi umum (auth)
    Route::prefix('materi')->name('materi.')->group(function () {
        Route::get('/pendahuluan', fn () => view('materi.pendahuluan'))->name('pendahuluan');
        Route::get('/data', fn () => view('materi.data'))->name('data');
        Route::get('/data2', fn () => view('materi.data2'))->name('data2');
        Route::get('/data3', fn () => view('materi.data3'))->name('data3');
        Route::get('/algoritma', fn () => view('materi.algoritma'))->name('algoritma');
        Route::get('/algoritma2', fn () => view('materi.algoritma2'))->name('algoritma2');
        Route::get('/ml', fn () => view('materi.ml'))->name('ml');
        Route::get('/ml2', fn () => view('materi.ml2'))->name('ml2');
        Route::get('/ml3', fn () => view('materi.ml3'))->name('ml3');
        Route::get('/ct', fn () => view('materi.ct'))->name('ct');
        Route::get('/ct2', fn () => view('materi.ct2'))->name('ct2');
    });

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
