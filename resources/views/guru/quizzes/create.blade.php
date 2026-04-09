<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kuis</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        .form-wrap{
            max-width: 760px;
            margin: 0 auto;
        }

        .form-row{
            display:grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }
        @media(max-width: 860px){
            .form-row{ grid-template-columns:1fr; }
        }

        .field{
            margin-bottom: 12px;
        }

        label{
            display:block;
            font-weight: 800;
            margin-bottom: 6px;
            font-size: 14px;
        }

        .input{
            width:100%;
            padding: 12px 12px;
            border-radius: 12px;
            border: 1px solid rgba(0,0,0,.15);
            outline:none;
            font-weight: 700;
        }
        .input:focus{ border-color: rgba(27,115,232,.45); }

        .help{
            margin-top: 6px;
            font-size: 12px;
            color: rgba(0,0,0,.55);
            font-weight: 700;
        }

        .actions{
            display:flex;
            gap:10px;
            flex-wrap:wrap;
            margin-top: 14px;
            justify-content:flex-end;
        }

        .btn-mini{
            display:inline-flex;
            align-items:center;
            gap:8px;
            padding: 10px 14px;
            border-radius: 12px;
            font-weight: 900;
            font-size: 13px;
            border: none;
            cursor: pointer;
            text-decoration:none;
        }

        .btn-save{ background:#1e8e5a; color:#fff; }
        .btn-back{ background:#fff; border:1px solid rgba(0,0,0,.12); color:#111; }

        .alert-error{
            background: #ffecec;
            border: 1px solid #ffbcbc;
            color: #a61b1b;
            padding: 12px 14px;
            border-radius: 12px;
            margin-bottom: 14px;
            font-weight: 800;
        }

        .alert-error ul{ margin: 8px 0 0 18px; }
    </style>
</head>

<body>

<!-- SIDEBAR -->
<aside class="sidebar">
    <div class="sidebar-header">MENU</div>

    <ul class="menu">

        <li>
            <a class="menu-link {{ request()->routeIs('guru.dashboard') ? 'active' : '' }}"
               href="{{ route('guru.dashboard') }}">
                <i class="fa-solid fa-house"></i> Dashboard
            </a>
        </li>

        <li>
            <a class="menu-link {{ request()->routeIs('guru.quizzes.*') ? 'active' : '' }}"
               href="{{ route('guru.quizzes.index') }}">
                <i class="fa-solid fa-book-open"></i> Kelola Kuis
            </a>
        </li>

        <li>
            <a class="menu-link {{ request()->routeIs('guru.datasiswa') ? 'active' : '' }}"
               href="{{ route('guru.datasiswa') }}">
                <i class="fa-solid fa-users"></i> Data Siswa
            </a>
        </li>

        <li>
            <a class="menu-link {{ request()->routeIs('guru.nilaisiswa') ? 'active' : '' }}"
               href="{{ route('guru.nilaisiswa') }}">
                <i class="fa-solid fa-chart-column"></i> Nilai Siswa
            </a>
        </li>

    </ul>

    <div class="user-box">
        <div class="user-avatar">
            <i class="fa-solid fa-user"></i>
        </div>

        <div class="user-info">
            <span class="user-name">{{ Auth::user()->username }}</span>
        </div>

        <form action="{{ route('logout') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit" class="btn-logout" title="Logout">
                <i class="fa-solid fa-right-from-bracket"></i>
            </button>
        </form>
    </div>
</aside>

<!-- MAIN -->
<main class="main">
    <div class="topbar">Tambah Kuis</div>

    <div class="content-wrapper">
        <div class="content-card">
            <div class="form-wrap">

                @if ($errors->any())
                    <div class="alert-error">
                        Gagal menyimpan. Cek input ya:
                        <ul>
                            @foreach ($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('guru.quizzes.store') }}" method="POST">
                    @csrf

                    <div class="field">
                        <label>Judul Kuis</label>
                        <input class="input" type="text" name="title" value="{{ old('title') }}" placeholder="Contoh: Kuis Bab 1 - Data" required>
                        <div class="help">Judul ini tampil di halaman siswa.</div>
                    </div>

                    <div class="form-row">
                        <div class="field">
                            <label>Durasi (menit)</label>
                            <input class="input" type="number" name="duration_minutes" value="{{ old('duration_minutes', 30) }}" min="1" required>
                            <div class="help">Contoh: 30</div>
                        </div>

                        <div class="field">
                            <label>KKM (persen)</label>
                            <input class="input" type="number" name="kkm" value="{{ old('kkm', 70) }}" min="0" max="100" required>
                            <div class="help">Contoh: 70</div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="field">
                            <label>Poin per Soal</label>
                            <input class="input" type="number" name="points_per_question" value="{{ old('points_per_question', 10) }}" min="1" required>
                            <div class="help">Contoh: 10</div>
                        </div>

                        <div class="field">
                            <label>Status</label>
                            <select class="input" name="is_active" required>
                                <option value="1" {{ old('is_active', 1) == 1 ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ old('is_active', 1) == 0 ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                            <div class="help">Kalau Nonaktif, siswa tidak bisa akses kuis.</div>
                        </div>
                    </div>

                    <div class="actions">
                        <a href="{{ route('guru.quizzes.index') }}" class="btn-mini btn-back">
                            <i class="fa-solid fa-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn-mini btn-save">
                            <i class="fa-solid fa-floppy-disk"></i> Simpan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</main>

<script src="{{ asset('js/sidebar.js') }}"></script>
</body>
</html>
