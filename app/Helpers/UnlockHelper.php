<?php

namespace App\Helpers;

use App\Models\MateriProgress;
use App\Models\QuizAttempt;
use Illuminate\Support\Facades\Auth;

class UnlockHelper
{
    // Syarat unlock tiap HALAMAN materi
    private static array $materiRequirements = [
        'pendahuluan'      => null,              // selalu terbuka
        'data.konsep'      => 'pendahuluan',
        'data.penting'     => 'data.konsep',
        'data.bias'        => 'data.penting',
        'data.dataset'     => 'data.bias',
        'algoritma.konsep' => null,              // dibuka setelah kuis 1
        'algoritma.ai'     => 'algoritma.konsep',
        'ml.konsep'        => null,              // dibuka setelah kuis 2
        'ml.belajar'       => 'ml.konsep',
        'ml.jenis'         => 'ml.belajar',
        'ml.pohon'         => 'ml.jenis',
        'ct.konsep'        => null,              // dibuka setelah kuis 3
        'ct.empat'         => 'ct.konsep',
        'ct.penerapan'     => 'ct.empat',
    ];

    // Syarat unlock tiap SUBBAB (dan kuis pertamanya)
    private static array $subbabRequirements = [
        'data' => [
            'materi' => ['pendahuluan'],
            'kuis'   => null,
        ],
        'algoritma' => [
            'materi' => ['data.konsep', 'data.penting', 'data.bias', 'data.dataset'],
            'kuis'   => 1,
        ],
        'ml' => [
            'materi' => ['algoritma.konsep', 'algoritma.ai'],
            'kuis'   => 2,
        ],
        'ct' => [
            'materi' => ['ml.konsep', 'ml.belajar', 'ml.jenis', 'ml.pohon'],
            'kuis'   => 3,
        ],
        'evaluasi' => [
            'materi' => ['ct.konsep', 'ct.empat', 'ct.penerapan'],
            'kuis'   => 4,
        ],
    ];

    // Cek apakah SUBBAB terbuka
    public static function isUnlocked(string $subbab): bool
    {
        if ($subbab === 'pendahuluan') return true;

        $userId = Auth::id();
        $req = self::$subbabRequirements[$subbab] ?? null;
        if (!$req) return false;

        $readCount = MateriProgress::where('user_id', $userId)
            ->whereIn('materi_key', $req['materi'])
            ->where('is_read', true)
            ->count();

        if ($readCount < count($req['materi'])) return false;

        if ($req['kuis'] !== null) {
            $kuisDone = QuizAttempt::where('user_id', $userId)
                ->where('quiz_id', $req['kuis'])
                ->exists();
            if (!$kuisDone) return false;
        }

        return true;
    }

    // Cek apakah HALAMAN MATERI terbuka
    public static function isMateriUnlocked(string $materiKey): bool
    {
        // Kalau tidak ada di daftar, selalu terbuka
        if (!array_key_exists($materiKey, self::$materiRequirements)) return true;

        $required = self::$materiRequirements[$materiKey];

        // Tidak ada syarat = selalu terbuka
        if ($required === null) return true;

        // Cek apakah materi sebelumnya sudah dibaca
        return MateriProgress::where('user_id', Auth::id())
            ->where('materi_key', $required)
            ->where('is_read', true)
            ->exists();
    }

    // Cek apakah KUIS terbuka
    public static function isKuisUnlocked(int $kuisId): bool
    {
        $userId = Auth::id();

        $materiHarus = [
            1 => ['data.konsep', 'data.penting', 'data.bias', 'data.dataset'],
            2 => ['algoritma.konsep', 'algoritma.ai'],
            3 => ['ml.konsep', 'ml.belajar', 'ml.jenis', 'ml.pohon'],
            4 => ['ct.konsep', 'ct.empat', 'ct.penerapan'],
            5 => ['ct.konsep', 'ct.empat', 'ct.penerapan'], // evaluasi sama dengan kuis 4
        ];

        $required = $materiHarus[$kuisId] ?? [];

        $readCount = MateriProgress::where('user_id', $userId)
            ->whereIn('materi_key', $required)
            ->where('is_read', true)
            ->count();

        return $readCount >= count($required);
    }
}