<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Petunjuk Penggunaan - Inside AI</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <style>
    :root {
      --primary: #000B58;
      --primary-light: #003161;
      --text-dark: #1F2D3D;
      --text-muted: #6B7280;
      --bg-soft: #F8FAFC;
      --white: #fff;
      --radius-lg: 20px;
      --shadow-soft: 0 8px 28px rgba(0,0,0,0.06);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background: var(--bg-soft);
      color: var(--text-dark);
    }

    /* ===== NAVBAR ===== */
    header {
      position: sticky;
      top: 0;
      z-index: 1000;
      width: 100%;
      padding: 20px 6%;
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: var(--white);
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .logo {
      font-size: 25px;
      font-weight: bold;
      color: var(--primary);
    }

    .nav-buttons {
      display: flex;
      gap: 12px;
    }

    .btn {
      padding: 10px 22px;
      border-radius: 10px;
      border: 2px solid var(--primary);
      font-size: 13px;
      font-weight: 600;
      cursor: pointer;
      transition: 0.2s ease;
      text-decoration: none;
      display: inline-block;
    }

    .btn-primary {
      background: var(--primary);
      color: #fff;
    }

    .btn-primary:hover { background: #000B58; }

    .btn-outline {
      background: transparent;
      color: var(--primary);
    }

    .btn-outline:hover {
      background: #636789;
      color: whitesmoke;
    }

    .btn-simple {
      background: transparent;
      border: none;
      color: #000B58;
      cursor: pointer;
      margin-left: -30px;
    }

    .btn-simple:hover { background: rgba(255,255,255,0.15); }
    .btn-simple.active { background: #fff; color: #000; }

    /* ===== BURGER ===== */
    .burger {
      display: none;
      background: var(--primary);
      border: none;
      border-radius: 8px;
      color: white;
      width: 40px;
      height: 40px;
      font-size: 18px;
      cursor: pointer;
      align-items: center;
      justify-content: center;
    }

    /* ===== CARD ===== */
    .card {
      max-width: 850px;
      margin: 40px auto;
      background: #ffffff;
      border-radius: 12px;
      box-shadow: 0 6px 18px rgba(0,0,0,0.08);
      overflow: hidden;
    }

    .card-header {
      background: #000B58;
      color: #ffffff;
      padding: 26px 30px;
    }

    .card-header p {
      margin: 0;
      opacity: 0.95;
      font-size: 14px;
      line-height: 1.6;
    }

    .card-body {
      padding: 30px;
      line-height: 1.7;
    }

    h3 {
      margin-bottom: 20px;
      color: #000B58;
      font-size: 15px;
    }

    p {
      font-size: 13px;
    }

    a {
      color: #000B58;
      text-decoration: none;
      font-weight: 500;
    }

    a:hover { text-decoration: underline; }

    /* ===== PETUNJUK ITEMS ===== */
    .petunjuk-list {
      display: flex;
      flex-direction: column;
      gap: 0;
    }

    .petunjuk-item {
      display: flex;
      gap: 16px;
      align-items: flex-start;
      padding: 16px 0;
      border-bottom: 1px solid #f2f2f2;
    }

    .petunjuk-item:last-child {
      border-bottom: none;
      padding-bottom: 0;
    }

    .petunjuk-item:first-child {
      padding-top: 0;
    }

    .petunjuk-number {
      flex-shrink: 0;
      width: 32px;
      height: 32px;
      background: #000B58;
      color: #fff;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 13px;
      font-weight: 700;
      margin-top: 1px;
    }

    .petunjuk-content {
      flex: 1;
    }

    .petunjuk-title {
      font-size: 13px;
      font-weight: 700;
      color: #000B58;
      margin-bottom: 4px;
    }

    .petunjuk-desc {
      font-size: 13px;
      color: #4B5563;
      line-height: 1.7;
    }

    .petunjuk-desc b {
      color: #000B58;
      font-weight: 600;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 600px) {
      header {
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        padding: 14px 16px;
        position: relative;
      }

      .logo { font-size: 20px; }
      .burger { display: flex; }

      .nav-buttons {
        display: none;
        flex-direction: column;
        gap: 0;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: white;
        padding: 8px 16px 16px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        z-index: 999;
      }

      .nav-buttons.open { display: flex; }

      .btn {
        width: 100%;
        text-align: center;
        padding: 10px 14px;
        font-size: 13px;
        margin-left: 0 !important;
      }

      .btn-simple {
        color: var(--primary) !important;
        border: none;
        border-bottom: 1px solid rgba(0,0,0,0.06);
        border-radius: 0;
        padding: 12px 0;
      }

      .btn-primary,
      .btn-outline {
        margin-top: 6px;
        border-radius: 10px;
      }

      .card {
        margin: 16px 12px;
        border-radius: 10px;
      }

      .card-header { padding: 18px 16px; }
      .card-body { padding: 18px 16px; }
      h3 { font-size: 14px; }

      .petunjuk-number {
        width: 28px;
        height: 28px;
        font-size: 12px;
        border-radius: 6px;
      }

      .petunjuk-title { font-size: 12px; }
      .petunjuk-desc { font-size: 12px; }
    }
        .gambar-petunjuk {
        width: 100%;
        border-radius: 12px;
        margin-bottom: 24px;
        box-shadow: 0 6px 18px rgba(0,0,0,0.18);
        border: 2px solid rgba(255,255,255,0.1);
    }
  </style>
</head>

<body>

  <!-- ===== NAVBAR ===== -->
  <header>
    <div class="logo">Inside AI</div>

    <button class="burger" id="burgerBtn" aria-label="Menu">
      <i class="fa-solid fa-bars"></i>
    </button>

    <div class="nav-buttons" id="navButtons">
      <a href="{{ route('landing') }}" class="btn btn-simple">Beranda</a>
      <a href="{{ route('petunjuk') }}" class="btn btn-simple">Petunjuk Penggunaan</a>
      <a href="{{ route('tentang') }}" class="btn btn-simple">Tentang</a>
      <a href="{{ route('login.lihat') }}" class="btn btn-primary">Masuk</a>
      <a href="{{ route('register.lihat') }}" class="btn btn-outline">Daftar</a>
    </div>
  </header>

  <!-- ===== KONTEN PETUNJUK ===== -->
  <div class="card">
    <div class="card-header">
      <p>
        Halaman ini menjelaskan cara menggunakan media pembelajaran
        <strong>Inside AI</strong> secara lengkap, mulai dari navigasi
        hingga fitur-fitur yang tersedia.
      </p>
    </div>

    <div class="card-body">
      <h3>Petunjuk Penggunaan Aplikasi</h3>

      <h2 style="text-align: center">Halaman Beranda</h2>
      <img src="{{ asset('img/petunjuk1.png') }}" alt="Halaman Beranda" class="gambar-petunjuk">

      <div class="petunjuk-list">

        <div class="petunjuk-item">
          <div class="petunjuk-number">1</div>
          <div class="petunjuk-content">
            <div class="petunjuk-title">Menu Navigasi</div>
            <div class="petunjuk-desc">
              Tersedia menu <b>Beranda</b>, <b>Petunjuk Penggunaan</b>, dan
              <b>Tentang</b> yang digunakan pengguna untuk berpindah halaman
              dan memperoleh informasi mengenai media pembelajaran.
            </div>
          </div>
        </div>

        <div class="petunjuk-item">
          <div class="petunjuk-number">2</div>
          <div class="petunjuk-content">
            <div class="petunjuk-title">Tombol Masuk dan Daftar</div>
            <div class="petunjuk-desc">
              Tombol <b>"Masuk"</b> digunakan pengguna yang sudah memiliki akun
              untuk login ke sistem, sedangkan tombol <b>"Daftar"</b> digunakan
              pengguna baru untuk membuat akun terlebih dahulu.
            </div>
          </div>
        </div>


        <div class="petunjuk-item">
          <div class="petunjuk-number">3</div>
          <div class="petunjuk-content">
            <div class="petunjuk-title">Tombol Mulai Belajar</div>
            <div class="petunjuk-desc">
              Tombol <b>"Mulai Belajar"</b> digunakan untuk mengakses materi
              pembelajaran interaktif yang tersedia pada media pembelajaran.
            </div>
          </div>
        </div>

        <div class="petunjuk-item">
          <div class="petunjuk-number">4</div>
          <div class="petunjuk-content">
            <div class="petunjuk-title">Tombol Halaman Guru</div>
            <div class="petunjuk-desc">
              Tombol <b>"Halaman Guru"</b> digunakan untuk menuju halaman guru
              yang berfungsi memantau aktivitas dan perkembangan belajar siswa.
            </div>
          </div>
        </div>

        <div class="petunjuk-item">
          <div class="petunjuk-number">5</div>
          <div class="petunjuk-content">
            <div class="petunjuk-title">Fitur Media Pembelajaran</div>
            <div class="petunjuk-desc">
              Bagian ini menjelaskan fitur-fitur yang tersedia seperti
              <b>Materi Interaktif</b>, <b>Kuis &amp; Evaluasi</b>, dan
              <b>Dashboard Guru</b>.
            </div>
          </div>
        </div>

        <div class="petunjuk-item">
          <div class="petunjuk-number">6</div>
          <div class="petunjuk-content">
            <div class="petunjuk-title">Materi Pembelajaran</div>
            <div class="petunjuk-desc">
              Bagian materi pembelajaran menampilkan topik-topik yang dapat
              dipelajari siswa, meliputi materi Data, Algoritma, Machine Learning,
              dan Computational Thinking.
            </div>
          </div>
        </div>

        <h2 style="text-align: center">Halaman Materi</h2>
        <img src="{{ asset('img/petunjuk2.png') }}" alt="Halaman Materi" class="gambar-petunjuk">

      <div class="petunjuk-list">

        <div class="petunjuk-item">
          <div class="petunjuk-number">1</div>
          <div class="petunjuk-content">
            <div class="petunjuk-title">Sidebar Menu</div>
            <div class="petunjuk-desc">
              Sidebar berisi daftar menu dan subbab materi pembelajaran yang dapat dipilih siswa.
              Pengguna dapat menekan salah satu materi untuk membuka dan mempelajari isi materi
              yang diinginkan.
            </div>
          </div>
        </div>

        <div class="petunjuk-item">
          <div class="petunjuk-number">2</div>
          <div class="petunjuk-content">
            <div class="petunjuk-title">Tombol "Materi Selanjutnya"</div>
            <div class="petunjuk-desc">
              Tombol ini digunakan untuk berpindah dari halaman materi yang sedang dibuka ke
              halaman materi berikutnya secara berurutan.
            </div>
          </div>
        </div>

        <div class="petunjuk-item">
          <div class="petunjuk-number">3</div>
          <div class="petunjuk-content">
            <div class="petunjuk-title">Informasi Pengguna</div>
            <div class="petunjuk-desc">
              Bagian kiri bawah menampilkan informasi akun pengguna yang sedang masuk ke dalam sistem.
            </div>
          </div>
        </div>

        <div class="petunjuk-item">
          <div class="petunjuk-number">4</div>
          <div class="petunjuk-content">
            <div class="petunjuk-title">Tombol Logout</div>
            <div class="petunjuk-desc">
              Ikon logout pada bagian informasi pengguna digunakan untuk keluar dari akun dan
              mengakhiri sesi penggunaan media pembelajaran.
            </div>
          </div>
        </div>

      </div>

      </div>
    </div>
  </div>

  <script>
    const burgerBtn  = document.getElementById('burgerBtn');
    const navButtons = document.getElementById('navButtons');

    burgerBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      navButtons.classList.toggle('open');
    });

    document.addEventListener('click', () => {
      navButtons.classList.remove('open');
    });

    navButtons.addEventListener('click', (e) => {
      e.stopPropagation();
    });
  </script>

</body>
</html>