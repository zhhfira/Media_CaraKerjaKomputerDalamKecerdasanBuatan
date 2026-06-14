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
            <a class="menu-link {{ request()->routeIs('guru.datasiswa') ? 'active' : '' }}"
               href="{{ route('guru.datasiswa') }}">
                <i class="fa-solid fa-users"></i> Data Siswa
            </a>
        </li>

        <li>
            <a class="menu-link {{ request()->routeIs('guru.nilaisiswa') ? 'active' : '' }}"
               href="{{ route('guru.nilaisiswa') }}">
                <i class="fa-solid fa-chart-column"></i> Data Nilai
            </a>
        </li>

        <li>
            <a class="menu-link {{ request()->routeIs('guru.progresSiswa') || request()->routeIs('guru.progresSiswa.detail') ? 'active' : '' }}"
               href="{{ route('guru.progresSiswa') }}">
                <i class="fa-solid fa-chart-line"></i> Progres Siswa
            </a>
        </li>
        
        <li>
            <a class="menu-link {{ request()->routeIs('guru.quizzes.*') ? 'active' : '' }}"
               href="{{ route('guru.quizzes.index') }}">
                <i class="fa-solid fa-clipboard-list"></i> Kelola Kuis & Evaluasi
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