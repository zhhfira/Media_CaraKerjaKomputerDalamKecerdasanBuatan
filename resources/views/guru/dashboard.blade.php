@extends('layouts.guru')

@section('title', 'Dashboard Guru')
@section('topbar', 'Dashboard Guru')

@push('styles')
<style>
.dashboard-guru {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
}
.card-guru {
    background: #fff;
    border-radius: 15px;
    padding: 20px 25px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    border-left: 5px solid #000B58;
    transition: 0.3s ease;
}
.card-guru:hover { transform: translateY(-4px); box-shadow: 0 12px 25px rgba(0,0,0,0.12); }
.card-guru h4 { font-size:13px; font-weight:600; color:#666; margin:0 0 12px 0; text-transform:uppercase; letter-spacing:0.5px; }
.card-guru h1 { font-size:36px; font-weight:800; color:#111; margin:0; }
.card-guru h1 span { font-size:14px; font-weight:400; color:#888; }
.nilai-row { display:flex; justify-content:space-between; align-items:center; padding:7px 0; border-bottom:1px solid rgba(0,0,0,0.06); font-size:13px; }
.nilai-row:last-child { border-bottom:none; }
.nilai-row span { font-weight:700; color:#000B58; }
.row-guru2 { grid-column:1/4; display:grid; grid-template-columns:repeat(3,1fr); gap:25px; }

@media(max-width:900px){
    .dashboard-guru { grid-template-columns:1fr; }
    .row-guru2 { grid-column:1; grid-template-columns:1fr; }
}
</style>
@endpush

@section('content')
<div class="dashboard-guru">

    {{-- Card: Jumlah Siswa --}}
    <div class="card-guru">
        <h4>Jumlah Siswa</h4>
        <h1>{{ $totalSiswa }} <span>Orang</span></h1>
        <div style="margin-top:12px;font-size:12px;color:#888;">Terdaftar di sistem</div>
    </div>

    {{-- Card: Total Kuis --}}
    <div class="card-guru">
        <h4>Total Kuis</h4>
        <h1>4 <span>Kuis</span></h1>
        <div style="margin-top:4px;">
            <h1 style="font-size:36px;">1 <span>Evaluasi</span></h1>
        </div>
    </div>

    {{-- Card: Partisipasi Siswa --}}
    <div class="card-guru">
        <h4>Partisipasi Siswa</h4>
        @php
            $sudahKuis = \App\Models\QuizAttempt::whereIn('quiz_id',[1,2,3,4])
                            ->distinct('user_id')->count('user_id');
            $sudahEval = \App\Models\QuizAttempt::where('quiz_id', 5)
                            ->distinct('user_id')->count('user_id');
        @endphp
        <div style="margin-top:8px;">
            <div style="display:flex;justify-content:space-between;align-items:center;
                        background:#f5f8ff;border-radius:10px;padding:10px 14px;margin-bottom:8px;">
                <span style="font-size:13px;color:#555;font-weight:600;">Sudah kerjakan kuis</span>
                <span style="font-size:20px;font-weight:800;color:#000B58;">{{ $sudahKuis }}</span>
            </div>
            <div style="display:flex;justify-content:space-between;align-items:center;
                        background:#f0faf5;border-radius:10px;padding:10px 14px;">
                <span style="font-size:13px;color:#555;font-weight:600;">Sudah kerjakan evaluasi</span>
                <span style="font-size:20px;font-weight:800;color:#1e8e5a;">{{ $sudahEval }}</span>
            </div>
        </div>
    </div>

    {{-- Baris 2 --}}
    <div class="row-guru2">

        {{-- Card: Rata-rata Nilai --}}
        <div class="card-guru">
            <h4>Rata-Rata Nilai</h4>
            <div style="margin-top:4px;">
                <div class="nilai-row">Kuis 1 <span>{{ number_format($rataQuiz1, 2) }}</span></div>
                <div class="nilai-row">Kuis 2 <span>{{ number_format($rataQuiz2, 2) }}</span></div>
                <div class="nilai-row">Kuis 3 <span>{{ number_format($rataQuiz3, 2) }}</span></div>
                <div class="nilai-row">Kuis 4 <span>{{ number_format($rataQuiz4, 2) }}</span></div>
                <div class="nilai-row">Evaluasi <span>{{ number_format($rataEvaluasi ?? 0, 2) }}</span></div>
            </div>
        </div>

        {{-- Card: Distribusi Level Siswa --}}
        <div class="card-guru">
            <h4>Distribusi Level Siswa</h4>
            @php
                $lvl1 = \App\Models\UserPoint::where('level', 1)->count();
                $lvl2 = \App\Models\UserPoint::where('level', 2)->count();
                $lvl3 = \App\Models\UserPoint::where('level', 3)->count();
            @endphp
            <div style="margin-top:8px;display:flex;flex-direction:column;gap:8px;">
                <div style="display:flex;justify-content:space-between;align-items:center;">
                    <span style="font-size:13px;color:#555;">Pemula</span>
                    <div style="display:flex;align-items:center;gap:8px;">
                        <div style="width:100px;background:#e5e7eb;border-radius:999px;height:8px;">
                            <div style="width:{{ $totalSiswa > 0 ? round($lvl1/$totalSiswa*100) : 0 }}%;background:#000B58;border-radius:999px;height:8px;"></div>
                        </div>
                        <span style="font-size:13px;font-weight:700;color:#000B58;min-width:20px;">{{ $lvl1 }}</span>
                    </div>
                </div>
                <div style="display:flex;justify-content:space-between;align-items:center;">
                    <span style="font-size:13px;color:#555;">Menengah</span>
                    <div style="display:flex;align-items:center;gap:8px;">
                        <div style="width:100px;background:#e5e7eb;border-radius:999px;height:8px;">
                            <div style="width:{{ $totalSiswa > 0 ? round($lvl2/$totalSiswa*100) : 0 }}%;background:#1D9E75;border-radius:999px;height:8px;"></div>
                        </div>
                        <span style="font-size:13px;font-weight:700;color:#1D9E75;min-width:20px;">{{ $lvl2 }}</span>
                    </div>
                </div>
                <div style="display:flex;justify-content:space-between;align-items:center;">
                    <span style="font-size:13px;color:#555;">Mahir</span>
                    <div style="display:flex;align-items:center;gap:8px;">
                        <div style="width:100px;background:#e5e7eb;border-radius:999px;height:8px;">
                            <div style="width:{{ $totalSiswa > 0 ? round($lvl3/$totalSiswa*100) : 0 }}%;background:#EF9F27;border-radius:999px;height:8px;"></div>
                        </div>
                        <span style="font-size:13px;font-weight:700;color:#EF9F27;min-width:20px;">{{ $lvl3 }}</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card: Badge Terbagi --}}
        <div class="card-guru">
            <h4>Badge Terbagi</h4>
            @php
                $allBadges = \App\Models\Badge::whereNotNull('quiz_id')->orderBy('quiz_id')->get();
            @endphp
            <div style="margin-top:8px;display:flex;flex-direction:column;gap:8px;">
                @foreach($allBadges as $badge)
                @php
                    $jumlah = \App\Models\UserBadge::where('badge_id', $badge->id)->count();
                @endphp
                <div style="display:flex;justify-content:space-between;align-items:center;">
                    <div style="display:flex;align-items:center;gap:8px;">
                        <img src="{{ asset('img/badges/' . $badge->image) }}" style="width:28px;height:28px;">
                        <span style="font-size:12px;color:#555;">{{ $badge->name }}</span>
                    </div>
                    <span style="font-size:13px;font-weight:700;color:#000B58;">{{ $jumlah }} siswa</span>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
@endsection