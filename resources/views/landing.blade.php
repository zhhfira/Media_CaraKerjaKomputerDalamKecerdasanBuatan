<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Inside AI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alata&family=Itim&family=Kumbh+Sans:wght@300;400;500;600;700;800;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Rubik:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #000B58;
            --primary-light: #003161;
            --text-dark: #1F2D3D;
            --text-muted: #aeb0b5;
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
        #finisher-background {
            position: fixed;
            inset: 0;
            z-index: 0;
            pointer-events: none;
        }
        body {
            position: relative;
            z-index: 1;
            background: radial-gradient(circle at center, #0a192f, #050d1a 70%);
        }

        /* NAVBAR */
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
            color: white;
        }
        .btn-primary:hover {
            background: #000B58;
        }

        .btn-outline {
            background: transparent;
            color: whitesmoke;
        }
        .btn-outline:hover {
            background: #b8bbd2;
            color: whitesmoke;
        }
        .btn-simple{
            background: transparent;
            border: none;
            color: #000B58;
            cursor: pointer;
            margin-left: -30px;
        }
        /* HERO */
        .hero {
            padding: 70px 6%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 50px;
        }

        .hero-text {
            flex: 1;
        }

        .hero-subtitle {
            color: var(--text-muted);
            font-size: 15px;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        .hero-title {
            color: whitesmoke;
            font-size: 30px;
            font-weight: 800;
            line-height: 1.15;
            margin-bottom: 16px;
        }

        .hero-desc {
            color: var(--text-muted);
            line-height: 1.7;
            font-size: 15px;
            margin-bottom: 28px;
            max-width: 550px;
        }

        .hero-buttons {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }

        .hero-image img {
            max-width: 300px;
            width: 100%;
        }

        img{
            max-width: 100%;
            height: auto;
        }
        
        .features {
            padding: 40px 6% 80px;
        }

        .features-title {
            text-align: center;
            font-size: 20px;
            font-weight: 800;
            color: whitesmoke;
            margin-bottom: 40px;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit,minmax(260px,1fr));
            gap: 24px;
            justify-content: center;
        }

        .feature-card {
            background: #dce5f0;
            padding: 30px 26px;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-soft);
            text-align: center;
            transition: 0.2s ease;
        }

        .feature-card-materi {
            background: #dce5f0;
            padding: 30px 26px;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-soft);
            text-align: center;
            transition: 0.2s ease;
        }

        .feature-card-materi:last-child{
            grid-column: 2 / 3; /* ⬅ pindah ke tengah */
        }

        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.10);
        }

        .feature-card img {
            max-width: 100px;
            margin-bottom: 16px;
        }

        .feature-title {
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .feature-desc {
            font-size: 12px;
            color: rgb(31, 30, 30);
            line-height: 1.6;
        }

        /* FOOTER */
        footer {
            text-align: center;
            padding: 20px 0 30px;
            font-size: 13px;
            color: var(--text-muted);
            font-weight: 600;
        }

/* BURGER BUTTON */
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

@media (max-width: 600px) {

    /* HEADER */
    header {
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        padding: 14px 16px;
        position: relative;
    }

    .logo { font-size: 20px; }

    /* Tampilkan burger */
    .burger {
        display: flex;
    }

    /* Nav tersembunyi by default */
    .nav-buttons {
        display: none;
        flex-direction: column;
        gap: 8px;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: white;
        padding: 16px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        z-index: 999;
    }

    /* Saat aktif / terbuka */
    .nav-buttons.open {
        display: flex;
    }

    .btn {
        width: 100%;
        text-align: center;
        padding: 10px 14px;
        font-size: 13px;
        margin-left: 0 !important;
    }

    .btn-simple {
        color: var(--primary) !important;
        border-bottom: 1px solid rgba(0,0,0,0.06);
        border-radius: 0;
        padding: 10px 0;
    }

    /* HERO */
    .hero {
        flex-direction: column;
        padding: 30px 16px;
        gap: 20px;
        text-align: center;
    }
    .hero-title { font-size: 20px; }
    .hero-desc { font-size: 13px; }
    .hero-buttons { justify-content: center; }
    .hero-image img { max-width: 200px; }

    /* FEATURES */
    .features { padding: 24px 16px; }
    .features-title { font-size: 16px; margin-bottom: 20px; }
    .feature-grid { grid-template-columns: 1fr !important; }
    .feature-card-materi:last-child { grid-column: auto !important; }
    .feature-card, .feature-card-materi { padding: 18px 16px; }
    .feature-title { font-size: 14px; }
    .feature-desc { font-size: 12px; }
}
                                        
@media (min-width: 601px) and (max-width: 1024px){

    header{
        padding: 16px 4%;
    }

    .hero{
        flex-direction: column;
        text-align: center;
        padding: 50px 4%;
    }

    .hero-title{
        font-size: 26px;
    }

    .hero-image img{
        max-width: 260px;
    }

    .features{
        padding: 40px 4%;
    }
}
@media (min-width: 1200px){

    .hero{
        padding: 90px 10%;
    }

    .features{
        padding: 60px 10%;
    }

    .hero-title{
        font-size: 36px;
    }

    .feature-card{
        padding: 34px;
    }
}
    </style>
</head>
<body>
<div id="finisher-background"></div>

<header>
    <div class="logo">Inside AI</div>

    <!-- Tombol burger (hanya muncul di HP) -->
    <button class="burger" id="burgerBtn" aria-label="Menu">
        <i class="fa-solid fa-bars"></i>
    </button>

    <!-- Nav links -->
    <div class="nav-buttons" id="navButtons">
        <a href="{{ route('landing') }}" class="btn btn-simple">Beranda</a>
        <a href="" class="btn btn-simple">Petunjuk Pengerjaan</a>
        <a href="{{ route('tentang') }}" class="btn btn-simple">Tentang</a>
        <a href="{{ route('login.lihat') }}" class="btn btn-primary">Masuk</a>
        <a href="{{ route('register.lihat') }}" class="btn btn-outline" style="color:black">Daftar</a>
    </div>
</header>

<section class="hero">
    <div class="hero-text">
        <p class="hero-subtitle">Media Pembelajaran Interaktif</p>

        <h1 class="hero-title">Cara Kerja Komputer dalam Kecerdasan Buatan</h1>

        <p class="hero-desc">
            Pelajari bagaimana komputer bekerja dalam sistem kecerdasan buatan (AI), mulai dari menerima dan memproses data, menjalankan algoritma, hingga menghasilkan keputusan atau prediksi melalui penerapan cara berpikir komputasional yang sistematis dan terstruktur.        
        </p>

        <div class="hero-buttons">
            <a href="{{ route('login.lihat') }}" class="btn btn-primary">Mulai Belajar</a>
            <a href="{{ route('login.lihat') }}" class="btn btn-outline">Halaman Guru</a>
        </div>
    </div>

    <div class="hero-image">
        <img src="{{ asset('img/beranda1.png') }}" alt="Gambar Ilustrasi">
    </div>
</section>
<section class="features">
    <h2 class="features-title">Fitur Media Pembelajaran</h2>
        <div class="feature-grid">
        <div class="feature-card">
        <img src="{{ asset('img/beranda2.png') }}" alt="Gambar Ilustrasi">
            <h3 class="feature-title">Materi Interaktif</h3>
            <p class="feature-desc">Materi diuraikan dengan cara yang sederhana, interaktif, dan mudah dimengerti.</p>
        </div>

        <div class="feature-card">
        <img src="{{ asset('img/beranda3.png') }}" alt="Gambar Ilustrasi">
            <h3 class="feature-title">Kuis & Evaluasi</h3>
            <p class="feature-desc">Pada akhir materi terdapat kuis untuk menilai sejauh mana siswa memahami isi pembelajaran.</p>
        </div>

        <div class="feature-card">
        <img src="{{ asset('img/beranda4.png') }}" alt="Gambar Ilustrasi">
            <h3 class="feature-title">Dashboard Guru</h3>
            <p class="feature-desc">Guru dapat memantau perkembangan belajar siswa.</p>
        </div>
</section>
<section class="features">
    <h2 class="features-title">Materi Pembelajaran</h2>
    <div class="feature-grid">
        <div class="feature-card-materi">
            <h3 class="feature-title">Data: Bahan Bakar Utama Kecerdasan Buatan</h3>
            <ul style="font-size: 12px; text-align:left;padding-left: 20px;">
                <li>Konsep Data</li>
                <li>Pentingnya Data</li>
                <li>Dataset dan Labeling</li>
            </ul>
        </div>

        <div class="feature-card-materi">
            <h3 class="feature-title">Algoritma: Resep Rahasia AI</h3>
            <ul style="font-size: 12px; text-align:left;padding-left: 20px;">
                <li>Konsep Algoritma</li>
                <li>Bagaimana Algoritma Bekerja dalam Kecerdasan Buatan?</li>
            </ul>
        </div>

        <div class="feature-card-materi">
            <h3 class="feature-title"><i>Machine Learning</i>: Komputer yang Belajar</h3>
            <ul style="font-size: 12px; text-align:left;padding-left: 20px;">
                <li>Konsep <i>Machine Learning</i></li>
                <li>Jenis <i>Machine Learning</i></li>
                <li>Pohon Keputusan: Cara Komputer Menebak Jawaban</li>
            </ul>
        </div>

        <div class="feature-card-materi">
            <h3 class="feature-title"><i>Computational Thinking:</i> Berpikir Ala Komputer</h3>
            <ul style="font-size: 12px; text-align:left;padding-left: 20px;">
                <li>Konsep <i>Computational Thinking</i></li>
                <li>Empat Komponen Utama <i>Computational Thinking</i></li>
            </ul>
        </div>
    </div>
</section>
<footer>
    Inside AI © 2026 PilkomMedia
</footer>
<script src="https://cdn.jsdelivr.net/npm/tsparticles@2/tsparticles.bundle.min.js"></script>

<script>
tsParticles.load("finisher-background", {
    background: {
        color: { value: "transparent" }
    },
    particles: {
        number: {
            value: 80
        },
        color: {
            value: ["#00f2ff", "#00c3ff", "#8affff"]
        },
        shape: {
            type: "circle"
        },
        opacity: {
            value: { min: 0.3, max: 0.8 },
            animation: {
                enable: true,
                speed: 0.8,
                minimumValue: 0.3,
                sync: false
            }
        },
        size: {
            value: { min: 1, max: 4 }
        },
        move: {
            enable: true,
            speed: 0.6,
            direction: "none",
            random: true,
            straight: false,
            outModes: {
                default: "out"
            }
        },
        links: {
            enable: false  
        }
    },
    detectRetina: true
});
</script>
<script>
    const burgerBtn  = document.getElementById('burgerBtn');
    const navButtons = document.getElementById('navButtons');

    burgerBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        navButtons.classList.toggle('open');
    });

    /* Klik di luar → tutup menu */
    document.addEventListener('click', () => {
        navButtons.classList.remove('open');
    });

    /* Cegah klik dalam nav menutup dirinya sendiri */
    navButtons.addEventListener('click', (e) => {
        e.stopPropagation();
    });
</script>
</body>
</html>
