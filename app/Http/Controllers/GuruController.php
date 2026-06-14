<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\User;
use App\Models\QuizAttempt;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GuruController extends Controller
{
public function dashboard()
{
    $totalSiswa = User::where('usertype', 'user')->count();

    $rataQuiz1 = \App\Models\QuizAttempt::where('quiz_id', 1)
                    ->selectRaw('MAX(score) as best')->groupBy('user_id')
                    ->get()->avg('best') ?? 0;

    $rataQuiz2 = \App\Models\QuizAttempt::where('quiz_id', 2)
                    ->selectRaw('MAX(score) as best')->groupBy('user_id')
                    ->get()->avg('best') ?? 0;

    $rataQuiz3 = \App\Models\QuizAttempt::where('quiz_id', 3)
                    ->selectRaw('MAX(score) as best')->groupBy('user_id')
                    ->get()->avg('best') ?? 0;

    $rataQuiz4 = \App\Models\QuizAttempt::where('quiz_id', 4)
                    ->selectRaw('MAX(score) as best')->groupBy('user_id')
                    ->get()->avg('best') ?? 0;

    $rataEvaluasi = \App\Models\QuizAttempt::where('quiz_id', 5)
                    ->selectRaw('MAX(score) as best')->groupBy('user_id')
                    ->get()->avg('best') ?? 0;

    return view('guru.dashboard', compact(
        'totalSiswa',
        'rataQuiz1',
        'rataQuiz2',
        'rataQuiz3',
        'rataQuiz4',
        'rataEvaluasi'
    ));
}

    public function datasiswa()
    {
        $siswa = User::where('usertype', 'user')
            ->orderBy('created_at', 'asc')
            ->get();



        return view('guru.datasiswa', compact('siswa'));
    }

public function nilaisiswa()
{
    $quizzes = Quiz::orderBy('id')->get()->values();

    $siswa = User::where('usertype', 'user')->orderBy('created_at')->get();

    $rekap = $siswa->map(function ($user) use ($quizzes) {

        // Ambil semua attempt user ini untuk detail popup
        $allAttempts = QuizAttempt::with('quiz')
            ->where('user_id', $user->id)
            ->orderBy('quiz_id')
            ->orderBy('created_at')
            ->get();

        // Ambil skor TERTINGGI per quiz untuk kolom rekap
        $bestScores = QuizAttempt::where('user_id', $user->id)
            ->selectRaw('quiz_id, MAX(score) as best_score')
            ->groupBy('quiz_id')
            ->pluck('best_score', 'quiz_id');

        $kuis1    = $bestScores[1] ?? null;
        $kuis2    = $bestScores[2] ?? null;
        $kuis3    = $bestScores[3] ?? null;
        $kuis4    = $bestScores[4] ?? null;
        $evaluasi = $bestScores[5] ?? null;

        // Rata-rata dari skor tertinggi per quiz (hanya yang sudah dikerjakan)
        $nilaiAda = collect([$kuis1, $kuis2, $kuis3, $kuis4, $evaluasi])
                        ->filter(fn($v) => $v !== null);
        $rataRata = $nilaiAda->count() > 0
                        ? round($nilaiAda->avg(), 2)
                        : 0;

        // Detail semua attempt untuk popup
        $details = $allAttempts->map(function ($r) {
            $duration = ($r->started_at && $r->finished_at)
                ? $r->started_at->diffInSeconds($r->finished_at)
                : null;

            return [
                'quiz'   => $r->quiz->title,
                'score'  => $r->score,
                'kkm'    => $r->quiz->kkm,
                'status' => $r->score >= $r->quiz->kkm ? 'Memenuhi' : 'Belum memenuhi',
                'time'   => $duration
                    ? floor($duration / 60) . ' menit ' . ($duration % 60) . ' detik'
                    : '-',
                'waktu_kerjakan' => $r->finished_at
                    ? \Carbon\Carbon::parse($r->finished_at)->translatedFormat('d F Y, H:i')
                    : '-',
            ];
        })->toArray();

        return (object) [
            'user_id'      => $user->id,
            'student_name' => $user->username,
            'kelas'        => $user->kelas,
            'kuis1'        => $kuis1,
            'kuis2'        => $kuis2,
            'kuis3'        => $kuis3,
            'kuis4'        => $kuis4,
            'evaluasi'     => $evaluasi,
            'rata_rata'    => $rataRata,
            'details'      => $details,
        ];
    });

    return view('guru.nilaisiswa', compact('rekap'));
}
public function progresSiswa()
{
    $siswa = User::where('usertype', 'user')
        ->with(['point', 'badges'])
        ->orderBy('created_at')
        ->get();

    $quizzes = Quiz::orderBy('id')->get();

    $data = $siswa->map(function ($user) use ($quizzes) {

        // Skor tertinggi per quiz
        $bestScores = QuizAttempt::where('user_id', $user->id)
            ->selectRaw('quiz_id, MAX(score) as best_score')
            ->groupBy('quiz_id')
            ->pluck('best_score', 'quiz_id');

        // Quiz yang sudah dikerjakan
        $quizDikerjakan = $bestScores->count();

        // Total progress materi
        $totalMateri    = \App\Models\MateriProgress::where('user_id', $user->id)->count();

        // XP & level
        $xp = $user->point->total_xp ?? 0;
        $levelNum = $user->point->level ?? 1;
        $gamification = new \App\Services\GamificationService();
        $levelLabel = $gamification->getLevelName($levelNum);
        $level = ['level' => $levelNum, 'label' => $levelLabel];

        // Persentase progress (dari 19 item: 14 materi + 5 quiz)
        $totalItem  = 19;
        $quizLulus  = $bestScores->filter(fn($s) => $s >= 75)->count();
        $progres    = round((($totalMateri + $quizLulus) / $totalItem) * 100);

        return (object) [
            'user'           => $user,
            'xp'             => $xp,
            'level'          => $level,
            'badges'         => $user->badges,
            'quiz_dikerjakan'=> $quizDikerjakan,
            'total_materi'   => $totalMateri,
            'progres'        => min($progres, 100),
            'best_scores'    => $bestScores,
        ];
    });

    return view('guru.progres-siswa', compact('data', 'quizzes'));
}

}
