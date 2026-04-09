@extends('layouts.guru')

@section('title', 'Kelola Kuis')
@section('topbar', 'Kelola Kuis & Evaluasi')

@push('styles')
<style>
.table-wrap{ width:100%; overflow:auto; border-radius:14px; border:1px solid rgba(0,0,0,.08); background:#fff; }
table{ width:100%; border-collapse:collapse; min-width:700px; }
th, td{ padding:12px 14px; border-bottom:1px solid rgba(0,0,0,.06); text-align:left; font-size:14px; }
th{ background:rgba(0,0,0,.03); font-weight:600; }
.badge{ display:inline-block; padding:6px 10px; border-radius:999px; font-weight:800; font-size:12px; background:#f2f2f2; }
.btn-mini{ display:inline-flex; align-items:center; gap:8px; padding:8px 12px; border-radius:10px; font-weight:500; font-size:13px; border:none; cursor:pointer; text-decoration:none; }
.btn-add{ background:#1e8e5a; color:#fff; }
.btn-edit{ background:#1b73e8; color:#fff; }
.btn-delete{ background:#e23d3d; color:#fff; }
.btn-questions{ background:#b36a00; color:#fff; }
.top-actions{ display:flex; justify-content:space-between; align-items:center; gap:12px; flex-wrap:wrap; margin-bottom:14px; }
.success-icon{ width:70px; height:70px; margin:0 auto 25px; border-radius:50%; background:#1e8e5a; position:relative; }
.success-icon::after{ content:''; position:absolute; left:22px; top:18px; width:18px; height:30px; border:4px solid #fff; border-top:none; border-left:none; transform:rotate(45deg); }
.popup{ position:fixed; inset:0; background:rgba(0,0,0,.5); display:flex; justify-content:center; align-items:center; z-index:9999; }
.popup-box{ background:#fff; width:450px; max-width:90%; padding:45px 35px; border-radius:20px; text-align:center; }
.popup-box p{ font-size:18px; margin-bottom:25px; }
.ok-btn{ padding:10px 35px; border:none; border-radius:10px; background:#1e8e5a; color:#fff; font-weight:600; cursor:pointer; }
</style>
@endpush

@section('content')
<div class="content-card">

    {{-- Popup sukses --}}
    @if(session('success'))
    <div class="popup">
        <div class="popup-box">
            <div class="success-icon"></div>
            <p>{{ session('success') }}</p>
            <button class="ok-btn" onclick="this.closest('.popup').style.display='none'">
                Tutup
            </button>
        </div>
    </div>
    @endif

    <div class="top-actions">
        <div style="font-weight:900;font-size:20px;">Daftar Kuis</div>
        {{-- <a href="{{ route('guru.quizzes.create') }}" class="btn-mini btn-add">
            <i class="fa-solid fa-plus"></i> Tambah Kuis
        </a> --}}
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th style="width:60px;">No</th>
                    <th>Judul</th>
                    <th style="width:120px;">Durasi</th>
                    <th style="width:90px;">KKM</th>
                    <th style="width:130px;">Poin/Soal</th>
                    <th style="width:280px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($quizzes as $i => $quiz)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td style="font-weight:600;">{{ $quiz->title }}</td>
                        <td><span class="badge">{{ $quiz->duration_minutes }} menit</span></td>
                        <td><span class="badge">{{ $quiz->kkm }}</span></td>
                        <td><span class="badge">{{ $quiz->points_per_question }}</span></td>
                        <td style="display:flex;gap:8px;flex-wrap:wrap;">
                            <a href="{{ route('guru.questions.index', $quiz->id) }}" class="btn-mini btn-questions">
                                <i class="fa-solid fa-list-check"></i> Kelola Soal
                            </a>
                            <a href="{{ route('guru.quizzes.edit', $quiz->id) }}" class="btn-mini btn-edit">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </a>
                            <form action="{{ route('guru.quizzes.destroy', $quiz->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin hapus kuis ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-mini btn-delete">
                                    <i class="fa-solid fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align:center;padding:18px;color:#666;font-weight:700;">
                            Belum ada kuis.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection