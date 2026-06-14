@extends('layouts.siswa')

@section('title', 'Dashboard Siswa')
@section('topbar', 'Dashboard Siswa')

@push('styles')
<style>
.dashboard-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
}
.card-welcome {
    grid-column: 1 / 3;
    background: #fff;
    border-radius: 15px;
    margin-left: 10px;
    padding: 30px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
}
.progress-card {
    grid-column: 3 / 4;
    background: #fff;
    border-radius: 15px;
    padding: 20px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    display: flex;
    justify-content: center;
    align-items: center;
}
.card {
    background: #fff;
    border-radius: 15px;
    padding: 20px;
    margin-left: 10px;
    box-shadow: 0 8px 15px rgba(0,0,0,0.08), 0 15px 30px rgba(0,0,0,0.12);
    transition: 0.3s ease;
}
.card:hover { transform: translateY(-4px); }
.card h4 { font-size: 14px; color: #666; margin-bottom: 10px; }
.card h1 { font-size: 32px; margin: 0; }
.card h1 span { font-size: 14px; color: #888; }
.row2 {
    grid-column: 1 / 4;
    display: grid;
    grid-template-columns: 1fr 1fr 1.6fr;
    gap: 25px;
}
.nilai-list div {
    display: flex;
    justify-content: space-between;
    font-size: 14px;
    margin-bottom: 6px;
}
.circleProgress { position: relative; width: 150px; height: 160px; }
.circleProgress svg { transform: rotate(-90deg); }
.circleProgress circle { fill: none; stroke-width: 12; }
.bg { stroke: rgba(0,0,0,0.08); }
.progress {
    stroke: #000B58;
    stroke-linecap: round;
    stroke-dasharray: 471;
    stroke-dashoffset: 471;
    transition: stroke-dashoffset 1.5s ease;
}
.circleText {
    position: absolute;
    top: 50%; left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}
.circleText span { font-size: 24px; font-weight: bold; }
.welcome-content { display: flex; justify-content: space-between; align-items: center; gap: 20px; }
.welcome-text { flex: 1; }
.welcome-text h2 { margin: 0 0 10px 0; }
.welcome-text p { color: #666; }
.welcome-image { flex: 1; text-align: right; margin-right: 20px; }
.welcome-image img { max-width: 150px; height: auto; padding-right: 20px; animation: float 3s ease-in-out infinite; }

/* Responsive dashboard */
@media(max-width:900px){
    .dashboard-container { grid-template-columns: 1fr; }
    .card-welcome { grid-column: 1; }
    .progress-card { grid-column: 1; }
    .row2 { grid-column: 1; grid-template-columns: 1fr; }
}
@keyframes float {
    0%   { transform: translateY(0px); }
    50%  { transform: translateY(-12px); }
    100% { transform: translateY(0px); }
}
</style>
@endpush

@section('content')
<div class="dashboard-container">

    {{-- BARIS 1 --}}
    <div class="card-welcome">
        <div class="welcome-content">
            <div class="welcome-text">
                <h2>Selamat Datang, {{ Auth::user()->username }}</h2>
                <p>Semangat belajar dan selesaikan semua materi!</p>
            </div>
            <div class="welcome-image">
                <img src="{{ asset('img/welcome.png') }}" alt="Ilustrasi">
            </div>
        </div>
    </div>

    <div class="progress-card">
        <div class="circleProgress">
            <svg width="160" height="160">
                <circle cx="80" cy="80" r="75" class="bg"></circle>
                <circle cx="80" cy="80" r="75" class="progress" id="progressCircle"></circle>
            </svg>
            <div class="circleText">
                <span id="progressText">0%</span>
                <small>Progress Belajar</small>
            </div>
        </div>
    </div>

    {{-- BARIS 2 --}}
    <div class="row2">
        <div class="card">
            <h4>Kuis & Evaluasi</h4>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-top:10px;">
                <div style="background:#f5f8ff;border-radius:10px;padding:10px 8px;text-align:center;">
                    <div style="font-size:10px;color:#888;font-weight:700;letter-spacing:0.5px;margin-bottom:8px;">TOTAL</div>
                    <div style="display:flex;justify-content:center;align-items:baseline;gap:4px;margin-bottom:4px;">
                        <span style="font-size:22px;font-weight:800;color:#000B58;">{{ $totalQuiz }}</span>
                        <span style="font-size:11px;color:#888;">Kuis</span>
                    </div>
                    <div style="display:flex;justify-content:center;align-items:baseline;gap:4px;">
                        <span style="font-size:22px;font-weight:800;color:#000B58;">{{ $totalEvaluasi }}</span>
                        <span style="font-size:11px;color:#888;">Evaluasi</span>
                    </div>
                </div>
                <div style="background:#f0faf5;border-radius:10px;padding:10px 8px;text-align:center;">
                    <div style="font-size:10px;color:#888;font-weight:700;letter-spacing:0.5px;margin-bottom:8px;">DIKERJAKAN</div>
                    <div style="display:flex;justify-content:center;align-items:baseline;gap:4px;margin-bottom:4px;">
                        <span style="font-size:22px;font-weight:800;color:#1e8e5a;">{{ $quizDikerjakan }}</span>
                        <span style="font-size:11px;color:#888;">Kuis</span>
                    </div>
                    <div style="display:flex;justify-content:center;align-items:baseline;gap:4px;">
                        <span style="font-size:22px;font-weight:800;color:#1e8e5a;">{{ $evaluasiDikerjakan }}</span>
                        <span style="font-size:11px;color:#888;">Evaluasi</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <h4>Perolehan Nilai (tertinggi)</h4>
            <div class="nilai-list">
                <div>Kuis 1 <span>{{ number_format($rataQuiz1 ?? 0, 2) }}</span></div>
                <div>Kuis 2 <span>{{ number_format($rataQuiz2 ?? 0, 2) }}</span></div>
                <div>Kuis 3 <span>{{ number_format($rataQuiz3 ?? 0, 2) }}</span></div>
                <div>Kuis 4 <span>{{ number_format($rataQuiz4 ?? 0, 2) }}</span></div>
                <div>Evaluasi <span>{{ number_format($rataEvaluasi ?? 0, 2) }}</span></div>
            </div>
        </div>

        <div class="card">
            <h4>Level Belajar</h4>
            @php
                $point      = auth()->user()->point;
                $xp         = $point?->total_xp ?? 0;
                $level      = $point?->level ?? 1;
                $svc        = new \App\Services\GamificationService();
                $xpProgress = $svc->getProgressToNext($xp, $level);
            @endphp
            <h1>Lv.{{ $level }} <span>{{ $svc->getLevelName($level) }}</span></h1>
            <div style="background:#e5e7eb;border-radius:999px;height:10px;margin:10px 0 6px;">
                <div style="width:{{ $xpProgress['pct'] }}%;background:#000B58;border-radius:999px;height:10px;transition:width .5s;"></div>
            </div>
            <div style="font-size:12px;color:#888;">
                @if($level < 3)
                    {{ $xp }} XP &mdash; {{ $xpProgress['sisa'] }} XP lagi ke {{ $svc->getLevelName($level + 1) }}
                @else
                    {{ $xp }} XP &mdash; Level maksimal!
                @endif
            </div>
            @php
                $allBadges      = \App\Models\Badge::whereNotNull('quiz_id')->get();
                $earnedBadgeIds = auth()->user()->badges->pluck('id')->toArray();
            @endphp
            <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:6px;margin-top:12px;">
                @foreach($allBadges as $badge)
                <div style="text-align:center;">
                    <img src="{{ asset('img/badges/' . $badge->image) }}"
                         style="width:56px;height:56px;display:block;margin:0 auto;
                                filter:{{ in_array($badge->id, $earnedBadgeIds) ? 'none' : 'grayscale(100%) opacity(0.3)' }};">
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function(){
    let progress = {{ round($progress) }};
    let circle = document.getElementById("progressCircle");
    let text   = document.getElementById("progressText");
    let radius = 75;
    let circumference = 2 * Math.PI * radius;

    circle.style.strokeDasharray  = circumference;
    circle.style.strokeDashoffset = circumference;

    let current = 0;
    let interval = setInterval(() => {
        if(current >= progress){
            clearInterval(interval);
        } else {
            current++;
            circle.style.strokeDashoffset = circumference - (current / 100) * circumference;
            text.textContent = current + "%";
        }
    }, 15);
});
</script>
@endpush