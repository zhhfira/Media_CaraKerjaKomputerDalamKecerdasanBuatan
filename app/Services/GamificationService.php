<?php
namespace App\Services;

use App\Models\{User, Badge, UserPoint, UserBadge};

class GamificationService
{
    public function handle(User $user, int $quizId, int $score): ?Badge
    {
        $this->recalculateXP($user);
        return $this->checkBadge($user, $quizId, $score);
    }

    private function recalculateXP(User $user): void
    {
        $totalXP = \App\Models\QuizAttempt::where('user_id', $user->id)
            ->selectRaw('MAX(score) as best_score')
            ->groupBy('quiz_id')
            ->get()
            ->sum('best_score');

        $level = $this->calculateLevel($totalXP);

        UserPoint::updateOrCreate(
            ['user_id' => $user->id],
            ['total_xp' => $totalXP, 'level' => $level]
        );
    }

    private function checkBadge(User $user, int $quizId, int $score): ?Badge
    {
        $badge = Badge::where('quiz_id', $quizId)->first();
        if (!$badge) return null;

        $sudahPunya = UserBadge::where('user_id', $user->id)
                               ->where('badge_id', $badge->id)->exists();
        if ($sudahPunya) return null;

        $quiz = \App\Models\Quiz::find($quizId);
        if (!$quiz) return null;

        if ($score >= $quiz->kkm) {
            UserBadge::create([
                'user_id'   => $user->id,
                'badge_id'  => $badge->id,
                'earned_at' => now(),
            ]);
            return $badge;
        }
        return null;
    }

    private function calculateLevel(int $xp): int
    {
        if ($xp >= 500) return 3; // Mahir
        if ($xp >= 200) return 2; // Menengah
        return 1;                 // Pemula
    }

    public function getLevelName(int $level): string
    {
        return ['', 'Pemula', 'Menengah', 'Mahir'][$level];
    }

    public function getProgressToNext(int $xp, int $level): array
    {
        $starts  = [1 => 0,   2 => 200, 3 => 500];
        $targets = [1 => 200, 2 => 500, 3 => 600];

        if ($level >= 3) {
            return ['pct' => 100, 'sisa' => 0, 'target' => 600];
        }

        $pct = round(($xp - $starts[$level]) / ($targets[$level] - $starts[$level]) * 100);

        return [
            'pct'    => min(max($pct, 0), 100),
            'sisa'   => $targets[$level] - $xp,
            'target' => $targets[$level],
        ];
    }
}