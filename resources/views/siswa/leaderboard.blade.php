@extends('layouts.siswa')

@section('title', 'Leaderboard')
@section('topbar', 'Leaderboard')

@push('styles')
<style>
.leaderboard-wrap {
    max-width: 700px;
    margin: 0 auto;
    overflow-x: auto;
}
.leaderboard-wrap::-webkit-scrollbar{
    height: 6px;
}

.leaderboard-wrap::-webkit-scrollbar-thumb{
    background: #ccc;
    border-radius: 10px;
}
.leaderboard-title {
    font-size: 20px;
    font-weight: 800;
    margin-bottom: 20px;
    color: #000B58;
}

.leaderboard-table {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    min-width: 650px;
}

.leaderboard-table thead tr {
    background: #000B58;
    color: #fff;
    font-size: 13px;
    font-weight: 700;
}

.leaderboard-table th,
.leaderboard-table td {
    padding: 12px 16px;
    text-align: left;
    font-size: 13px;
}

.leaderboard-table tbody tr {
    border-bottom: 1px solid rgba(0,0,0,0.06);
    transition: background 0.2s;
}

.leaderboard-table tbody tr:hover { background: #f5f8ff; }

.leaderboard-table tbody tr.me {
    background: #e8f0fe;
    font-weight: 700;
}

.rank-badge {
    display: inline-block;
    width: 28px; height: 28px;
    border-radius: 50%;
    text-align: center;
    line-height: 28px;
    font-weight: 800;
    font-size: 13px;
}

.rank-1 { background: #FFD700; color: #7a5c00; }
.rank-2 { background: #C0C0C0; color: #444; }
.rank-3 { background: #cd7f32; color: #fff; }
.rank-other { background: #f0f0f0; color: #555; }

.level-pill {
    display: inline-block;
    padding: 3px 10px;
    border-radius: 999px;
    font-size: 11px;
    font-weight: 700;
    background: #000B58;
    color: #fff;
}

.xp-text { font-weight: 700; color: #000B58; }

</style>
@endpush

@section('content')
<div class="leaderboard-wrap">

    <div class="leaderboard-title">
        <i class="fa-solid fa-trophy" style="color:#000B58"></i>
        Papan Peringkat
    </div>

    <table class="leaderboard-table">
        <thead>
            <tr>
                <th style="width:60px">Rank</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Badge</th>
                <th>Level</th>
                <th>XP</th>
            </tr>
        </thead>
        <tbody>
            @forelse($rankings as $i => $r)
            <tr class="{{ $r->id == auth()->id() ? 'me' : '' }}">
                <td>
                    @php
                        $rank = $i + 1;
                        $rankClass = match($rank) {
                            1 => 'rank-1',
                            2 => 'rank-2',
                            3 => 'rank-3',
                            default => 'rank-other'
                        };
                    @endphp
                    <span class="rank-badge {{ $rankClass }}">{{ $rank }}</span>
                </td>
                <td>
                    {{ $r->username }}
                    @if($r->id == auth()->id())
                        <span style="font-size:11px;color:#1e8e5a;font-weight:700;">(Kamu)</span>
                    @endif
                </td>
                <td>{{ $r->kelas ?? '-' }}</td>
                <td>
                    @php
                        $earnedIds = \App\Models\UserBadge::where('user_id', $r->id)
                                        ->pluck('badge_id')->toArray();
                    @endphp
                    <div style="display:flex;gap:4px;align-items:center;">
                        @foreach($allBadges as $badge)
                        <img src="{{ asset('img/badges/' . $badge->image) }}"
                             title="{{ $badge->name }}"
                             style="width:35px;height:35px;
                                    filter:{{ in_array($badge->id, $earnedIds)
                                        ? 'none'
                                        : 'grayscale(100%) opacity(0.25)' }};">
                        @endforeach
                    </div>
                </td>
                <td>
                    <span class="level-pill">
                        Lv.{{ $r->level ?? 1 }}
                        {{ ['', 'Pemula', 'Menengah', 'Mahir'][$r->level ?? 1] }}
                    </span>
                </td>
                <td>
                    <span class="xp-text">{{ $r->total_xp ?? 0 }} XP</span>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align:center;color:#888;padding:30px;">
                    Belum ada data leaderboard.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection