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

/* ── Card dasar ── */
.card-guru {
    background: #fff;
    border-radius: 15px;
    padding: 20px 25px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    border-left: 5px solid #000B58;
    /* Animasi masuk */
    opacity: 0;
    transform: translateY(22px);
    animation: fadeUp 0.55s ease forwards;
}
.card-guru:hover {
    transform: translateY(-4px);
    box-shadow: 0 14px 28px rgba(0,0,0,0.13);
    transition: transform 0.25s, box-shadow 0.25s;
}

/* Delay tiap kartu */
.card-guru:nth-child(1) { animation-delay: 0.05s; }
.card-guru:nth-child(2) { animation-delay: 0.15s; }
.card-guru:nth-child(3) { animation-delay: 0.25s; }
.row-guru2 .card-guru:nth-child(1) { animation-delay: 0.35s; }
.row-guru2 .card-guru:nth-child(2) { animation-delay: 0.45s; }
.row-guru2 .card-guru:nth-child(3) { animation-delay: 0.55s; }

@keyframes fadeUp {
    to { opacity: 1; transform: translateY(0); }
}

/* ── Label heading kartu ── */
.card-guru h4 {
    font-size: 13px;
    font-weight: 600;
    color: #666;
    margin: 0 0 12px 0;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* ── Angka besar dengan counter animasi ── */
.card-guru h1 {
    font-size: 36px;
    font-weight: 800;
    color: #111;
    margin: 0;
}
.card-guru h1 span { font-size: 14px; font-weight: 400; color: #888; }

/* ── Baris nilai ── */
.nilai-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 7px 0;
    border-bottom: 1px solid rgba(0,0,0,0.06);
    font-size: 13px;
}
.nilai-row:last-child { border-bottom: none; }
.nilai-row .count-up-decimal { font-weight: 700; color: #000B58; }
.card-guru h1 .count-up { font-size: 36px; font-weight: 800; color: #111; }

/* ── Row bawah ── */
.row-guru2 {
    grid-column: 1 / 4;
    display: flex;
    flex-wrap: nowrap;
    gap: 25px;
    align-items: flex-start; /* kartu TIDAK dipaksa sama tinggi */
}
.row-guru2 .card-guru {
    flex: 1 1 0;
    min-width: 0;          /* cegah overflow konten panjang */
    height: auto;          /* tinggi bebas mengikuti isi */
}

/* ── Progress bar level (animasi width) ── */
.level-bar-wrap {
    width: 100px;
    background: #e5e7eb;
    border-radius: 999px;
    height: 8px;
    overflow: hidden;
}
.level-bar-fill {
    height: 8px;
    border-radius: 999px;
    width: 0;                          /* mulai dari 0, JS yang gerakkan */
    transition: width 1.2s cubic-bezier(.4, 0, .2, 1);
}

/* ── Pulse dot (indikator live) ── */
.pulse-dot {
    display: inline-block;
    width: 8px; height: 8px;
    background: #1D9E75;
    border-radius: 50%;
    vertical-align: middle;
    animation: pulse 2s infinite;
}
@keyframes pulse { 0%,100%{opacity:1} 50%{opacity:.35} }

/* ── Mini grafik nilai ── */
.mini-chart-wrap {
    position: relative;
    height: 65px;
    margin-top: 12px;
}

/* ── Donut chart level ── */
.donut-wrap {
    position: relative;
    height: 130px;
    margin-top: 12px;
}

/* ── Badge bar ── */
.badge-bar-wrap {
    width: 80px;
    background: #e5e7eb;
    border-radius: 999px;
    height: 6px;
    overflow: hidden;
    margin-top: 3px;
}
.badge-bar-fill {
    height: 6px;
    border-radius: 999px;
    width: 0;
    transition: width 1.2s cubic-bezier(.4, 0, .2, 1);
}

@media (max-width: 900px) {
    .dashboard-guru { grid-template-columns: 1fr; }
    .row-guru2 { grid-column: 1; grid-template-columns: 1fr; }
}
</style>
@endpush

@section('content')
<div class="dashboard-guru">

    {{-- ══ Card 1: Jumlah Siswa ══ --}}
    <div class="card-guru">
        <h4>Jumlah Siswa</h4>
        <h1>
            <span class="count-up" data-target="{{ $totalSiswa }}" style="font-size:36px;font-weight:800;color:#111;">0</span>
            <span>Orang</span>
        </h1>
        <div style="margin-top:12px;font-size:12px;color:#888;">Terdaftar di sistem</div>
    </div>

    {{-- ══ Card 2: Total Kuis ══ --}}
    <div class="card-guru">
        <h4>Total Kuis</h4>
        <h1>4 <span>Kuis</span></h1>
        <div style="margin-top:4px;">
            <h1 style="font-size:36px;">1 <span>Evaluasi</span></h1>
        </div>
    </div>

    {{-- ══ Card 3: Partisipasi Siswa ══ --}}
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
                <span class="count-up" style="font-size:20px;font-weight:800;color:#000B58;"
                      data-target="{{ $sudahKuis }}">0</span>
            </div>
            <div style="display:flex;justify-content:space-between;align-items:center;
                        background:#f0faf5;border-radius:10px;padding:10px 14px;">
                <span style="font-size:13px;color:#555;font-weight:600;">Sudah kerjakan evaluasi</span>
                <span class="count-up" style="font-size:20px;font-weight:800;color:#1e8e5a;"
                      data-target="{{ $sudahEval }}">0</span>
            </div>
            <div style="margin-top:7px;font-size:11px;color:#aaa;">
                Data real-time &nbsp;<span class="pulse-dot"></span>
            </div>
        </div>
    </div>

    {{-- ══ Baris 2 ══ --}}
    <div class="row-guru2">

        {{-- Card: Rata-rata Nilai --}}
        <div class="card-guru">
            <h4>Rata-Rata Nilai</h4>
            <div style="margin-top:4px;">
                <div class="nilai-row">Kuis 1
                    <span class="count-up-decimal" data-target="{{ $rataQuiz1 }}">0</span>
                </div>
                <div class="nilai-row">Kuis 2
                    <span class="count-up-decimal" data-target="{{ $rataQuiz2 }}">0</span>
                </div>
                <div class="nilai-row">Kuis 3
                    <span class="count-up-decimal" data-target="{{ $rataQuiz3 }}">0</span>
                </div>
                <div class="nilai-row">Kuis 4
                    <span class="count-up-decimal" data-target="{{ $rataQuiz4 }}">0</span>
                </div>
                <div class="nilai-row">Evaluasi
                    <span class="count-up-decimal" data-target="{{ $rataEvaluasi ?? 0 }}">0</span>
                </div>
            </div>
            {{-- Mini grafik tren nilai --}}
            <div class="mini-chart-wrap">
                <canvas id="nilaiChart"
                    data-q1="{{ $rataQuiz1 }}"
                    data-q2="{{ $rataQuiz2 }}"
                    data-q3="{{ $rataQuiz3 }}"
                    data-q4="{{ $rataQuiz4 }}"
                    data-ev="{{ $rataEvaluasi ?? 0 }}"
                    role="img"
                    aria-label="Grafik tren rata-rata nilai kuis 1 hingga evaluasi"></canvas>
            </div>
        </div>

        {{-- Card: Distribusi Level Siswa --}}
        <div class="card-guru">
            <h4>Distribusi Level Siswa</h4>
            @php
            $allSiswa = \App\Models\User::where('usertype', 'user')->get();
            $lvl1 = $allSiswa->filter(fn($u) => ($u->point->level ?? 1) == 1)->count();
            $lvl2 = $allSiswa->filter(fn($u) => ($u->point->level ?? 1) == 2)->count();
            $lvl3 = $allSiswa->filter(fn($u) => ($u->point->level ?? 1) == 3)->count();
            @endphp
            <div style="margin-top:8px;display:flex;flex-direction:column;gap:10px;">

                <div style="display:flex;justify-content:space-between;align-items:center;">
                    <span style="font-size:13px;color:#555;">Pemula</span>
                    <div style="display:flex;align-items:center;gap:8px;">
                        <div class="level-bar-wrap">
                            <div class="level-bar-fill"
                                 data-width="{{ $totalSiswa > 0 ? round($lvl1/$totalSiswa*100) : 0 }}"
                                 style="background:#000B58;"></div>
                        </div>
                        <span style="font-size:13px;font-weight:700;color:#000B58;min-width:20px;">{{ $lvl1 }}</span>
                    </div>
                </div>

                <div style="display:flex;justify-content:space-between;align-items:center;">
                    <span style="font-size:13px;color:#555;">Menengah</span>
                    <div style="display:flex;align-items:center;gap:8px;">
                        <div class="level-bar-wrap">
                            <div class="level-bar-fill"
                                 data-width="{{ $totalSiswa > 0 ? round($lvl2/$totalSiswa*100) : 0 }}"
                                 style="background:#1D9E75;"></div>
                        </div>
                        <span style="font-size:13px;font-weight:700;color:#1D9E75;min-width:20px;">{{ $lvl2 }}</span>
                    </div>
                </div>

                <div style="display:flex;justify-content:space-between;align-items:center;">
                    <span style="font-size:13px;color:#555;">Mahir</span>
                    <div style="display:flex;align-items:center;gap:8px;">
                        <div class="level-bar-wrap">
                            <div class="level-bar-fill"
                                 data-width="{{ $totalSiswa > 0 ? round($lvl3/$totalSiswa*100) : 0 }}"
                                 style="background:#EF9F27;"></div>
                        </div>
                        <span style="font-size:13px;font-weight:700;color:#EF9F27;min-width:20px;">{{ $lvl3 }}</span>
                    </div>
                </div>

            </div>
            {{-- Donut chart --}}
            <div class="donut-wrap">
                <canvas id="levelChart"
                    data-lvl1="{{ $lvl1 }}"
                    data-lvl2="{{ $lvl2 }}"
                    data-lvl3="{{ $lvl3 }}"
                    role="img"
                    aria-label="Donut chart distribusi level siswa: Pemula {{ $lvl1 }}, Menengah {{ $lvl2 }}, Mahir {{ $lvl3 }}"></canvas>
            </div>
        </div>

        {{-- Card: Badge Terbagi --}}
        <div class="card-guru">
            <h4>Badge Terbagi</h4>
            @php
                $allBadges = \App\Models\Badge::whereNotNull('quiz_id')->orderBy('quiz_id')->get();
            @endphp
            <div style="margin-top:8px;display:flex;flex-direction:column;gap:12px;">
                @foreach($allBadges as $badge)
                @php
                    $jumlah = \App\Models\UserBadge::where('badge_id', $badge->id)->count();
                    $pct    = $totalSiswa > 0 ? round($jumlah / $totalSiswa * 100) : 0;
                @endphp
                <div style="display:flex;align-items:center;gap:10px;">
                    <img src="{{ asset('img/badges/' . $badge->image) }}"
                         style="width:30px;height:30px;flex-shrink:0;" alt="{{ $badge->name }}">
                    <div style="flex:1;min-width:0;">
                        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:4px;">
                            <span style="font-size:12px;color:#555;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;max-width:120px;">
                                {{ $badge->name }}
                            </span>
                            <span style="font-size:12px;font-weight:700;color:#000B58;margin-left:6px;white-space:nowrap;">
                                {{ $jumlah }} siswa
                            </span>
                        </div>
                        <div class="badge-bar-wrap" style="width:100%;">
                            <div class="badge-bar-fill" data-width="{{ $pct }}" style="background:#000B58;"></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>{{-- end row-guru2 --}}
</div>{{-- end dashboard-guru --}}
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {

    /* ── 1. Counter animasi (bilangan bulat) ── */
    document.querySelectorAll('.count-up').forEach(function (el) {
        var target = parseFloat(el.dataset.target) || 0;
        var val = 0, step = target / 60;
        var t = setInterval(function () {
            val = Math.min(val + step, target);
            el.textContent = Math.round(val);
            if (val >= target) clearInterval(t);
        }, 16);
    });

    /* ── 2. Counter animasi (desimal, 2 angka di belakang koma) ── */
    document.querySelectorAll('.count-up-decimal').forEach(function (el) {
        var target = parseFloat(el.dataset.target) || 0;
        var val = 0, step = target / 60;
        var t = setInterval(function () {
            val = Math.min(val + step, target);
            el.textContent = val.toFixed(2);
            if (val >= target) clearInterval(t);
        }, 16);
    });

    /* ── 3. Animasi progress bar (level & badge) ── */
    setTimeout(function () {
        document.querySelectorAll('.level-bar-fill, .badge-bar-fill').forEach(function (el) {
            el.style.width = (el.dataset.width || 0) + '%';
        });
    }, 400);

    /* ── 4. Mini grafik tren rata-rata nilai ── */
    var nc = document.getElementById('nilaiChart');
    if (nc) {
        new Chart(nc, {
            type: 'line',
            data: {
                labels: ['Kuis 1', 'Kuis 2', 'Kuis 3', 'Kuis 4', 'Evaluasi'],
                datasets: [{
                    data: [
                        parseFloat(nc.dataset.q1),
                        parseFloat(nc.dataset.q2),
                        parseFloat(nc.dataset.q3),
                        parseFloat(nc.dataset.q4),
                        parseFloat(nc.dataset.ev)
                    ],
                    borderColor: '#000B58',
                    backgroundColor: 'rgba(0,11,88,0.08)',
                    fill: true,
                    tension: 0.4,
                    pointRadius: 3,
                    pointBackgroundColor: '#000B58',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    x: { ticks: { font: { size: 10 }, color: '#aaa' }, grid: { color: 'rgba(0,0,0,0.05)' } },
                    y: { display: false, min: 0, max: 100 }
                },
                animation: { duration: 1400 }
            }
        });
    }

    /* ── 5. Donut chart distribusi level ── */
    var lc = document.getElementById('levelChart');
    if (lc) {
        new Chart(lc, {
            type: 'doughnut',
            data: {
                labels: ['Pemula', 'Menengah', 'Mahir'],
                datasets: [{
                    data: [
                        parseInt(lc.dataset.lvl1),
                        parseInt(lc.dataset.lvl2),
                        parseInt(lc.dataset.lvl3)
                    ],
                    backgroundColor: ['#000B58', '#1D9E75', '#EF9F27'],
                    borderWidth: 0,
                    hoverOffset: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: { font: { size: 11 }, color: '#888', boxWidth: 10, padding: 8 }
                    }
                },
                animation: { animateRotate: true, duration: 1200 }
            }
        });
    }

});
</script>
@endpush