@extends('layouts.guru')

@section('title', 'Edit Kuis')
@section('topbar', 'Edit Kuis')

@push('styles')
<style>
.form-wrap{ max-width:760px; margin:0 auto; }
.form-row{ display:grid; grid-template-columns:1fr 1fr; gap:12px; }
@media(max-width:860px){ .form-row{ grid-template-columns:1fr; } }
.field{ margin-bottom:12px; }
label{ display:block; font-weight:800; margin-bottom:6px; font-size:14px; }
.input{ width:100%; padding:12px; border-radius:12px; border:1px solid rgba(0,0,0,.15); outline:none; font-weight:700; }
.input:focus{ border-color:rgba(27,115,232,.45); }
.help{ margin-top:6px; font-size:12px; color:rgba(0,0,0,.55); font-weight:700; }
.actions{ display:flex; gap:10px; flex-wrap:wrap; margin-top:14px; justify-content:flex-end; }
.btn-mini{ display:inline-flex; align-items:center; gap:8px; padding:10px 14px; border-radius:12px; font-weight:600; font-size:13px; border:none; cursor:pointer; text-decoration:none; }
.btn-save{ background:#1e8e5a; color:#fff; }
.btn-back{ background:#fff; border:1px solid rgba(0,0,0,.12); color:#111; }
.alert-success{ background:#e9f9ef; border:1px solid #bfeccc; color:#146c43; padding:12px 14px; border-radius:12px; margin-bottom:14px; font-weight:800; }
.alert-error{ background:#ffecec; border:1px solid #ffbcbc; color:#a61b1b; padding:12px 14px; border-radius:12px; margin-bottom:14px; font-weight:800; }
.alert-error ul{ margin:8px 0 0 18px; }
</style>
@endpush

@section('content')
<div class="content-card">
    <div class="form-wrap">

        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert-error">
                Gagal menyimpan. Cek input ya:
                <ul>
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('guru.quizzes.update', $quiz->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="field">
                <label>Judul Kuis</label>
                <input class="input" type="text" name="title"
                       value="{{ old('title', $quiz->title) }}"
                       placeholder="Contoh: Kuis Bab 1 - Data" required>
            </div>

            <div class="form-row">
                <div class="field">
                    <label>Durasi (menit)</label>
                    <input class="input" type="number" name="duration_minutes"
                           value="{{ old('duration_minutes', $quiz->duration_minutes) }}"
                           min="1" required>
                    <div class="help">Contoh: 30</div>
                </div>
                <div class="field">
                    <label>KKM</label>
                    <input class="input" type="number" name="kkm"
                           value="{{ old('kkm', $quiz->kkm) }}"
                           min="0" max="100" required>
                    <div class="help">Contoh: 70</div>
                </div>
            </div>

            <div class="actions">
                <a href="{{ route('guru.quizzes.index') }}" class="btn-mini btn-back">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn-mini btn-save">
                    <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                </button>
            </div>
        </form>

    </div>
</div>
@endsection