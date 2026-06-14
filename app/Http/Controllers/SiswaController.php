<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizAttempt;
use App\Models\MateriProgress;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class SiswaController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();

        // TOTAL
        $totalQuiz = 4;
        $totalEvaluasi = 1;

        // SUDAH DIKERJAKAN (Quiz 1-4)
        $quizDikerjakan = QuizAttempt::where('user_id', $user->id)
            ->whereIn('quiz_id', [1,2,3,4])
            ->distinct('quiz_id')
            ->count('quiz_id');

        // Evaluasi (Quiz ID 5)
        $evaluasiDikerjakan = QuizAttempt::where('user_id', $user->id)
            ->where('quiz_id', 5)
            ->exists() ? 1 : 0;

        // Progress tetap dari total 5
        $totalSemua = 19;
        $materiDibaca = MateriProgress::where('user_id', $user->id)
        ->where('is_read', true)
        ->count();

    $kuisDikerjakan = QuizAttempt::where('user_id', $user->id)
        ->whereIn('quiz_id', [1,2,3,4,5])
        ->distinct('quiz_id')
        ->count('quiz_id');

    $completed = $materiDibaca + $kuisDikerjakan;
    $progress = round(($completed / $totalSemua) * 100);

        // Rata-rata nilai tiap kuis
        $rataQuiz1 = QuizAttempt::where('user_id', $user->id)
                        ->where('quiz_id', 1)
                        ->max('score');

        $rataQuiz2 = QuizAttempt::where('user_id', $user->id)
                        ->where('quiz_id', 2)
                        ->max('score');

        $rataQuiz3 = QuizAttempt::where('user_id', $user->id)
                        ->where('quiz_id', 3)
                        ->max('score');

        $rataQuiz4 = QuizAttempt::where('user_id', $user->id)
                        ->where('quiz_id', 4)
                        ->max('score');

        $rataEvaluasi = QuizAttempt::where('user_id', $user->id)
                            ->where('quiz_id', 5)
                            ->max('score');

        return view('siswa.dashboard', compact(
        'totalQuiz',
        'totalEvaluasi',
        'quizDikerjakan',
        'evaluasiDikerjakan',
            'progress',
            'rataQuiz1',
            'rataQuiz2',
            'rataQuiz3',
            'rataQuiz4',
            'rataEvaluasi'
        ));
    }

    public function leaderboard()
    {
        // Hapus filter kelas, ambil semua siswa
        $rankings = \App\Models\User::where('usertype', 'user')
            ->leftJoin('user_points', 'users.id', '=', 'user_points.user_id')
            ->orderByDesc('user_points.total_xp')
            ->select(
                'users.id',
                'users.username',
                'users.kelas',       // ← tetap diambil untuk ditampilkan di kolom
                'user_points.total_xp',
                'user_points.level'
            )
            ->get();
        $allBadges = \App\Models\Badge::whereNotNull('quiz_id')->orderBy('quiz_id')->get();

        return view('siswa.leaderboard', compact('rankings','allBadges'));
    }
}
