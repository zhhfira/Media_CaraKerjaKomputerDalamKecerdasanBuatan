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

        <li>
            <a class="menu-link {{ request()->routeIs('materi.pendahuluan') ? 'active' : '' }}"
               href="{{ route('materi.pendahuluan') }}">
                <i class="fa-solid fa-book-open"></i> Pendahuluan
            </a>
        </li>

        {{-- DATA --}}
        <li class="menu-item {{ request()->routeIs('materi.data*') ? 'open' : '' }}">
            <div class="menu-link dropdown-toggle">
                <i class="fa-solid fa-database"></i> Data
                <span class="chevron"><i class="fa-solid fa-chevron-down"></i></span>
            </div>
            <ul class="submenu">
                <li><a href="{{ route('materi.data') }}"  class="{{ request()->routeIs('materi.data') ? 'active' : '' }}">Konsep Data</a></li>
                <li><a href="{{ route('materi.data2') }}" class="{{ request()->routeIs('materi.data2') ? 'active' : '' }}">Pentingnya Data</a></li>
                <li><a href="{{ route('materi.data3') }}" class="{{ request()->routeIs('materi.data3') ? 'active' : '' }}">Dataset dan Labeling</a></li>
                <li><a href="{{ route('quiz.show', 1) }}">Kuis 1</a></li>
            </ul>
        </li>

        {{-- ALGORITMA --}}
        <li class="menu-item {{ request()->routeIs('materi.algoritma*') ? 'open' : '' }}">
            <div class="menu-link dropdown-toggle">
                <i class="fa-solid fa-code"></i> Algoritma
                <span class="chevron"><i class="fa-solid fa-chevron-down"></i></span>
            </div>
            <ul class="submenu">
                <li><a href="{{ route('materi.algoritma') }}"  class="{{ request()->routeIs('materi.algoritma') ? 'active' : '' }}">Konsep Algoritma</a></li>
                <li><a href="{{ route('materi.algoritma2') }}" class="{{ request()->routeIs('materi.algoritma2') ? 'active' : '' }}">Algoritma dalam AI</a></li>
                <li><a href="{{ route('quiz.show', 2) }}">Kuis 2</a></li>
            </ul>
        </li>

        {{-- MACHINE LEARNING --}}
        <li class="menu-item {{ request()->routeIs('materi.ml*') ? 'open' : '' }}">
            <div class="menu-link dropdown-toggle">
                <i class="fa-solid fa-robot"></i> Machine Learning
                <span class="chevron"><i class="fa-solid fa-chevron-down"></i></span>
            </div>
            <ul class="submenu">
                <li><a href="{{ route('materi.ml') }}"  class="{{ request()->routeIs('materi.ml') ? 'active' : '' }}">Konsep Machine Learning</a></li>
                <li><a href="{{ route('materi.ml2') }}" class="{{ request()->routeIs('materi.ml2') ? 'active' : '' }}">Jenis Machine Learning</a></li>
                <li><a href="{{ route('materi.ml3') }}" class="{{ request()->routeIs('materi.ml3') ? 'active' : '' }}">Pohon Keputusan</a></li>
                <li><a href="{{ route('quiz.show', 3) }}">Kuis 3</a></li>
            </ul>
        </li>

        {{-- COMPUTATIONAL THINKING --}}
        <li class="menu-item {{ request()->routeIs('materi.ct*') ? 'open' : '' }}">
            <div class="menu-link dropdown-toggle">
                <i class="fa-solid fa-brain"></i> Berpikir Komputasional
                <span class="chevron"><i class="fa-solid fa-chevron-down"></i></span>
            </div>
            <ul class="submenu">
                <li><a href="{{ route('materi.ct') }}"  class="{{ request()->routeIs('materi.ct') ? 'active' : '' }}">Konsep Berpikir Komputasional</a></li>
                <li><a href="{{ route('materi.ct2') }}" class="{{ request()->routeIs('materi.ct2') ? 'active' : '' }}">Empat Komponen Berpikir Komputasional</a></li>
                <li><a href="{{ route('quiz.show', 4) }}">Kuis 4</a></li>
            </ul>
        </li>

        <hr style="border:none;height:2px;background:#fff;border-radius:10px;margin:15px 0;">

        <li>
            <a class="menu-link" href="{{ route('quiz.show', 5) }}">
                <i class="fa-solid fa-clipboard-check"></i> Evaluasi
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