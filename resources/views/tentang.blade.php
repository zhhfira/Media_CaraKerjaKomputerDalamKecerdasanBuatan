<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tentang Pengembang - CompuThink</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alata&family=Itim&family=Kumbh+Sans:wght,YOPQ@100..900,300&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">


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
      font-family:"Poppins",sans-serif;
    }

    body {
      background: var(--bg-soft);
      color: var(--text-dark);
    }

    /* ===== NAVBAR (PERSIS DENGAN BERANDA) ===== */
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

    .btn-primary:hover {
      background: #000B58;
    }

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

    .btn-simple:hover {
      background: rgba(255, 255, 255, 0.15);
    }

    .btn-simple.active {
      background: #fff;
      color: #000;
    }

    /* ===== CARD TENTANG ===== */
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
    }

    .judul {
      margin-top: 14px;
      font-size: 15px;
      font-weight: 600;
      text-align: center;
    }

    .card-body {
      padding: 30px;
      line-height: 1.7;
    }

    h3 {
      margin-bottom: 16px;
      color: #000B58;
      font-size: 15px
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    td {
      padding: 8px 6px;
      vertical-align: top;
      font-size: 13px;
    }

    td:first-child {
      width: 220px;
      font-weight: 600;
      color: #333;
    }

    p {
        font-size: 13px;

    }

    a {
      color: #000B58;
      text-decoration: none;
      font-weight: 500;
    }

    a:hover {
      text-decoration: underline;
    }

    tr:not(:last-child) td {
      border-bottom: 1px solid #f2f2f2;
    }
/* BURGER */
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

@media (max-width: 600px){

    /* HEADER */
    header{
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        padding: 14px 16px;
        position: relative;
    }

    .logo{ font-size: 20px; }

    .burger{ display: flex; }

    .nav-buttons{
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

    .nav-buttons.open{ display: flex; }

    .btn{
        width: 100%;
        text-align: center;
        padding: 10px 14px;
        font-size: 13px;
        margin-left: 0 !important;
    }

    .btn-simple{
        color: var(--primary) !important;
        border: none;
        border-bottom: 1px solid rgba(0,0,0,0.06);
        border-radius: 0;
        padding: 12px 0;
    }

    .btn-primary,
    .btn-outline{
        margin-top: 6px;
        border-radius: 10px;
    }

    /* CARD */
    .card{
        margin: 16px 12px;
        border-radius: 10px;
    }

    .card-header{ padding: 18px 16px; }
    .card-body{ padding: 18px 16px; }
    .judul{ font-size: 13px; }
    h3{ font-size: 14px; }
    p{ font-size: 12px; }

    /* TABLE → stack */
    table, tr, td{ display: block; width: 100%; }
    tr{ margin-bottom: 10px; }
    td{ padding: 4px 0; font-size: 12px; }
    td:first-child{ width: 100%; font-weight: 600; }

    /* Sembunyikan kolom titik dua */
    td:nth-child(2){ display: none; }
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
        <a href="" class="btn btn-simple">Petunjuk Pengerjaan</a>
        <a href="{{ route('tentang') }}" class="btn btn-simple">Tentang</a>
        <a href="{{ route('login.lihat') }}" class="btn btn-primary">Masuk</a>
        <a href="{{ route('register.lihat') }}" class="btn btn-outline">Daftar</a>
    </div>
</header>

  <!-- ===== KONTEN TENTANG ===== -->
  <div class="card">
    <div class="card-header">
      <p>
        Media pembelajaran ini dibuat untuk memenuhi persyaratan dalam menyelesaikan
        program Strata-1 Pendidikan Komputer dengan judul:
      </p>

      <div class="judul">
        Pengembangan Media Pembelajaran Interaktif Berbasis Web
        pada Materi Bagaimana Komputer Berpikir
      </div>
    </div>

    <div class="card-body">
      <h3>Identitas Pengembang</h3>

      <table>
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td>Nur Alifya Zhafira Putri</td>
        </tr>
        <tr>
          <td>Dosen Pembimbing 1</td>
          <td>:</td>
          <td>Dr. Harja Santana Purba, M. Kom</td>
        </tr>
        <tr>
          <td>Dosen Pembimbing 2</td>
          <td>:</td>
          <td>Delsika Pramata Sari, S.Pd., M.Pd.</td>
        </tr>
        <tr>
          <td>Program Studi</td>
          <td>:</td>
          <td>Pendidikan Komputer</td>
        </tr>
        <tr>
          <td>Fakultas</td>
          <td>:</td>
          <td>Fakultas Keguruan dan Ilmu Pendidikan</td>
        </tr>
        <tr>
          <td>Universitas</td>
          <td>:</td>
          <td>Universitas Lambung Mangkurat</td>
        </tr>
        <tr>
          <td>Email</td>
          <td>:</td>
          <td>
            <a href="mailto:nuralifyazhafiraputri@gmail.com">
              nuralifyazhafiraputri@gmail.com
            </a>
          </td>
        </tr>
      </table>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <h3>Daftar Pustaka dan Atribusi</h3>
      <p>Ilustrasi pada media pembelajaran diadaptasi dari storyset.com/work.</p>
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
