@php
    use App\Helpers\UnlockHelper;
    $unlockData      = UnlockHelper::isUnlocked('data');
    $unlockAlgoritma = UnlockHelper::isUnlocked('algoritma');
    $unlockMl        = UnlockHelper::isUnlocked('ml');
    $unlockCt        = UnlockHelper::isUnlocked('ct');
    $unlockEvaluasi  = UnlockHelper::isUnlocked('evaluasi');

    // Per halaman materi
    $unlockDataKonsep    = UnlockHelper::isMateriUnlocked('data.konsep');
    $unlockDataPenting   = UnlockHelper::isMateriUnlocked('data.penting');
    $unlockDataBias      = UnlockHelper::isMateriUnlocked('data.bias');
    $unlockDataDataset   = UnlockHelper::isMateriUnlocked('data.dataset');
    $unlockKuis1         = UnlockHelper::isKuisUnlocked(1);

    $unlockAlgoKonsep    = UnlockHelper::isMateriUnlocked('algoritma.konsep');
    $unlockAlgoAi        = UnlockHelper::isMateriUnlocked('algoritma.ai');
    $unlockKuis2         = UnlockHelper::isKuisUnlocked(2);

    $unlockMlKonsep      = UnlockHelper::isMateriUnlocked('ml.konsep');
    $unlockMlBelajar     = UnlockHelper::isMateriUnlocked('ml.belajar');
    $unlockMlJenis       = UnlockHelper::isMateriUnlocked('ml.jenis');
    $unlockMlPohon       = UnlockHelper::isMateriUnlocked('ml.pohon');
    $unlockKuis3         = UnlockHelper::isKuisUnlocked(3);

    $unlockCtKonsep      = UnlockHelper::isMateriUnlocked('ct.konsep');
    $unlockCtEmpat       = UnlockHelper::isMateriUnlocked('ct.empat');
    $unlockCtPenerapan   = UnlockHelper::isMateriUnlocked('ct.penerapan');
    $unlockKuis4         = UnlockHelper::isKuisUnlocked(4);
@endphp

<aside class="sidebar">
    <div class="sidebar-header">MENU</div>
    <ul class="menu">

        <li>
            <a class="menu-link {{ request()->routeIs('siswa.dashboard') ? 'active' : '' }}"
               href="{{ route('siswa.dashboard') }}">
                <i class="fa-solid fa-house"></i> Dashboard
            </a>
        </li>

        <li>
            <a class="menu-link {{ request()->routeIs('siswa.leaderboard') ? 'active' : '' }}"
               href="{{ route('siswa.leaderboard') }}">
                <i class="fa-solid fa-trophy"></i> Leaderboard
            </a>
        </li>

        <hr style="border:none;height:2px;background:#fff;border-radius:10px;margin:15px 0;">

        {{-- PENDAHULUAN (selalu terbuka) --}}
        <li>
            <a class="menu-link {{ request()->routeIs('materi.pendahuluan') ? 'active' : '' }}"
               href="{{ route('materi.pendahuluan') }}">
                <i class="fa-solid fa-book-open"></i> Pendahuluan
            </a>
        </li>

        {{-- DATA --}}
        @if($unlockData)
        <li class="menu-item {{ request()->routeIs('materi.data*') ? 'open' : '' }}">
            <div class="menu-link dropdown-toggle">
                <i class="fa-solid fa-database"></i> Data
                <span class="chevron"><i class="fa-solid fa-chevron-down"></i></span>
            </div>
            <ul class="submenu">
                {{-- Konsep Data --}}
                @if($unlockDataKonsep)
                    <li><a href="{{ route('materi.data') }}" class="{{ request()->routeIs('materi.data') ? 'active' : '' }}">Konsep Data</a></li>
                @else
                    <li><span style="opacity:0.5;cursor:not-allowed;padding:6px 15px;display:block;">Konsep Data <i class="fa-solid fa-lock fa-xs"></i></span></li>
                @endif

                {{-- Pentingnya Data --}}
                @if($unlockDataPenting)
                    <li><a href="{{ route('materi.data2') }}" class="{{ request()->routeIs('materi.data2') ? 'active' : '' }}">Pentingnya Data</a></li>
                @else
                    <li><span style="opacity:0.5;cursor:not-allowed;padding:6px 15px;display:block;">Pentingnya Data <i class="fa-solid fa-lock fa-xs"></i></span></li>
                @endif

                {{-- Bias Dalam Data --}}
                @if($unlockDataBias)
                    <li><a href="{{ route('materi.data2_2') }}" class="{{ request()->routeIs('materi.data2_2') ? 'active' : '' }}">Bias Dalam Data</a></li>
                @else
                    <li><span style="opacity:0.5;cursor:not-allowed;padding:6px 15px;display:block;">Bias Dalam Data <i class="fa-solid fa-lock fa-xs"></i></span></li>
                @endif

                {{-- Dataset dan Labeling --}}
                @if($unlockDataDataset)
                    <li><a href="{{ route('materi.data3') }}" class="{{ request()->routeIs('materi.data3') ? 'active' : '' }}">Dataset dan Labeling</a></li>
                @else
                    <li><span style="opacity:0.5;cursor:not-allowed;padding:6px 15px;display:block;">Dataset dan Labeling <i class="fa-solid fa-lock fa-xs"></i></span></li>
                @endif

                {{-- Kuis 1 --}}
                @if($unlockKuis1)
                    <li><a href="{{ route('quiz.show', 1) }}">Kuis 1</a></li>
                @else
                    <li><span style="opacity:0.5;cursor:not-allowed;padding:6px 15px;display:block;">Kuis 1 <i class="fa-solid fa-lock fa-xs"></i></span></li>
                @endif
            </ul>
        </li>
        @else
        <li class="menu-item">
            <div class="menu-link" style="opacity:0.5;cursor:not-allowed;">
                <i class="fa-solid fa-database"></i> Data
                <i class="fa-solid fa-lock" style="margin-left:auto;"></i>
            </div>
        </li>
        @endif

        {{-- ALGORITMA --}}
        @if($unlockAlgoritma)
        <li class="menu-item {{ request()->routeIs('materi.algoritma*') ? 'open' : '' }}">
            <div class="menu-link dropdown-toggle">
                <i class="fa-solid fa-code"></i> Algoritma
                <span class="chevron"><i class="fa-solid fa-chevron-down"></i></span>
            </div>
            <ul class="submenu">
                @if($unlockAlgoKonsep)
                    <li><a href="{{ route('materi.algoritma') }}" class="{{ request()->routeIs('materi.algoritma') ? 'active' : '' }}">Pengenalan Algoritma</a></li>
                @else
                    <li><span style="opacity:0.5;cursor:not-allowed;padding:6px 15px;display:block;">Pengenalan Algoritma <i class="fa-solid fa-lock fa-xs"></i></span></li>
                @endif

                @if($unlockAlgoAi)
                    <li><a href="{{ route('materi.algoritma2') }}" class="{{ request()->routeIs('materi.algoritma2') ? 'active' : '' }}">Cara Kerja Algoritma pada Sistem Komputer</a></li>
                @else
                    <li><span style="opacity:0.5;cursor:not-allowed;padding:6px 15px;display:block;">Cara Kerja Algoritma pada Sistem Komputer<i class="fa-solid fa-lock fa-xs"></i></span></li>
                @endif

                @if($unlockKuis2)
                    <li><a href="{{ route('quiz.show', 2) }}">Kuis 2</a></li>
                @else
                    <li><span style="opacity:0.5;cursor:not-allowed;padding:6px 15px;display:block;">Kuis 2 <i class="fa-solid fa-lock fa-xs"></i></span></li>
                @endif
            </ul>
        </li>
        @else
        <li class="menu-item">
            <div class="menu-link" style="opacity:0.5;cursor:not-allowed;">
                <i class="fa-solid fa-code"></i> Algoritma
                <i class="fa-solid fa-lock" style="margin-left:auto;"></i>
            </div>
        </li>
        @endif

                {{-- MACHINE LEARNING --}}
        @if($unlockMl)
        <li class="menu-item {{ request()->routeIs('materi.ml*') ? 'open' : '' }}">
            <div class="menu-link dropdown-toggle">
                <i class="fa-solid fa-robot"></i> Machine Learning
                <span class="chevron"><i class="fa-solid fa-chevron-down"></i></span>
            </div>
            <ul class="submenu">
                @if($unlockMlKonsep)
                    <li><a href="{{ route('materi.ml') }}" class="{{ request()->routeIs('materi.ml') ? 'active' : '' }}">Pengenalan Machine Learning</a></li>
                @else
                    <li><span style="opacity:0.5;cursor:not-allowed;padding:6px 15px;display:block;">Pengenalan Machine Learning <i class="fa-solid fa-lock fa-xs"></i></span></li>
                @endif

                @if($unlockMlBelajar)
                    <li><a href="{{ route('materi.ml1_2') }}" class="{{ request()->routeIs('materi.ml1_2') ? 'active' : '' }}">Proses Perbaikan Kesalahan dalam Machine Learning</a></li>
                @else
                    <li><span style="opacity:0.5;cursor:not-allowed;padding:6px 15px;display:block;">Proses Perbaikan Kesalahan dalam Machine Learning<i class="fa-solid fa-lock fa-xs"></i></span></li>
                @endif

                @if($unlockMlJenis)
                    <li><a href="{{ route('materi.ml2') }}" class="{{ request()->routeIs('materi.ml2') ? 'active' : '' }}">Jenis Machine Learning</a></li>
                @else
                    <li><span style="opacity:0.5;cursor:not-allowed;padding:6px 15px;display:block;">Jenis Machine Learning <i class="fa-solid fa-lock fa-xs"></i></span></li>
                @endif

                @if($unlockMlPohon)
                    <li><a href="{{ route('materi.ml3') }}" class="{{ request()->routeIs('materi.ml3') ? 'active' : '' }}">Model Pohon Keputusan dalam Machine Learning</a></li>
                @else
                    <li><span style="opacity:0.5;cursor:not-allowed;padding:6px 15px;display:block;">Model Pohon Keputusan dalam Machine Learning<i class="fa-solid fa-lock fa-xs"></i></span></li>
                @endif

                @if($unlockKuis3)
                    <li><a href="{{ route('quiz.show', 3) }}">Kuis 3</a></li>
                @else
                    <li><span style="opacity:0.5;cursor:not-allowed;padding:6px 15px;display:block;">Kuis 3 <i class="fa-solid fa-lock fa-xs"></i></span></li>
                @endif
            </ul>
        </li>
        @else
        <li class="menu-item">
            <div class="menu-link" style="opacity:0.5;cursor:not-allowed;">
                <i class="fa-solid fa-robot"></i> Machine Learning
                <i class="fa-solid fa-lock" style="margin-left:auto;"></i>
            </div>
        </li>
        @endif

        {{-- COMPUTATIONAL THINKING --}}
        @if($unlockCt)
        <li class="menu-item {{ request()->routeIs('materi.ct*') ? 'open' : '' }}">
            <div class="menu-link dropdown-toggle">
                <i class="fa-solid fa-brain"></i> Berpikir Komputasional
                <span class="chevron"><i class="fa-solid fa-chevron-down"></i></span>
            </div>
            <ul class="submenu">
                @if($unlockCtKonsep)
                    <li><a href="{{ route('materi.ct') }}" class="{{ request()->routeIs('materi.ct') ? 'active' : '' }}">Pengenalan Computational Thinking</a></li>
                @else
                    <li><span style="opacity:0.5;cursor:not-allowed;padding:6px 15px;display:block;">Pengenalan Computational Thinking <i class="fa-solid fa-lock fa-xs"></i></span></li>
                @endif

                @if($unlockCtEmpat)
                    <li><a href="{{ route('materi.ct2') }}" class="{{ request()->routeIs('materi.ct2') ? 'active' : '' }}">Empat Komponen Computational Thinking</a></li>
                @else
                    <li><span style="opacity:0.5;cursor:not-allowed;padding:6px 15px;display:block;">Empat Komponen Computational Thinking <i class="fa-solid fa-lock fa-xs"></i></span></li>
                @endif

                @if($unlockCtPenerapan)
                    <li><a href="{{ route('materi.ct3') }}" class="{{ request()->routeIs('materi.ct3') ? 'active' : '' }}">Penerapan Computational Thinking Dalam Kehidupan Nyata</a></li>
                @else
                    <li><span style="opacity:0.5;cursor:not-allowed;padding:6px 15px;display:block;">Penerapan Computational Thinking Dalam Kehidupan Nyata <i class="fa-solid fa-lock fa-xs"></i></span></li>
                @endif

                @if($unlockKuis4)
                    <li><a href="{{ route('quiz.show', 4) }}">Kuis 4</a></li>
                @else
                    <li><span style="opacity:0.5;cursor:not-allowed;padding:6px 15px;display:block;">Kuis 4 <i class="fa-solid fa-lock fa-xs"></i></span></li>
                @endif
            </ul>
        </li>
        @else
        <li class="menu-item">
            <div class="menu-link" style="opacity:0.5;cursor:not-allowed;">
                <i class="fa-solid fa-brain"></i> Berpikir Komputasional
                <i class="fa-solid fa-lock" style="margin-left:auto;"></i>
            </div>
        </li>
        @endif

        <hr style="border:none;height:2px;background:#fff;border-radius:10px;margin:15px 0;">

        {{-- EVALUASI --}}
        @if($unlockEvaluasi)
        <li>
            <a class="menu-link" href="{{ route('quiz.show', 5) }}">
                <i class="fa-solid fa-clipboard-check"></i> Evaluasi
            </a>
        </li>
        @else
        <li>
            <div class="menu-link" style="opacity:0.5;cursor:not-allowed;">
                <i class="fa-solid fa-clipboard-check"></i> Evaluasi
                <i class="fa-solid fa-lock" style="margin-left:auto;"></i>
            </div>
        </li>
        @endif

    </ul>

    <div class="user-box">
        <div class="user-avatar">
            @if(Auth::user()->avatar)
                <img src="{{ asset('avatars/' . Auth::user()->avatar) }}"
                     alt="avatar"
                     style="width:40px;height:40px;border-radius:50%;object-fit:cover;">
            @else
                <i class="fa-solid fa-user"></i>
            @endif
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