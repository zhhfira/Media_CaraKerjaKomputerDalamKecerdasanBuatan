@extends('layouts.siswa')

@section('title', 'Algoritma: Konsep Algoritma')

@section('topbar', 'Algoritma: Resep Rahasia Kecerdasan Buatan')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Alata&family=Itim&family=Kumbh+Sans:wght,YOPQ@100..900,300&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

<style>
/* FRAME KUNING MELENGKUNG */
.activity-frame{
    margin-top: 20px;
    padding: 32px 24px 20px;
    border: 4px solid #f4c21b;
    border-radius: 32px;
    background: #ffffff;
    position: relative;
}

/* LABEL DI ATAS KOTAK */
.activity-label{
    position: absolute;
    top: -18px;
    left: 40px;
    background: #ffd9b3;
    padding: 6px 18px;
    border-radius: 999px;
    font-size: 14px;
    font-weight: 500;
}

/* TABEL */
.data-guess-table{
    width: 100%;
    border-collapse: collapse;
    font-size: 14px;
}

.data-guess-table th,
.data-guess-table td{
    border: 1px solid #555;
    padding: 8px 10px;
    vertical-align: top;
}

.data-guess-table th{
    background: #f7f7f7;
    text-align: center;
    font-weight: 700;
}

.choices-cell{
    white-space: normal;
}

/* PILIHAN JAWABAN (RADIO STYLED) */
.choice-pill{
    display: inline-flex;
    align-items: center;
    margin-right: 10px;
    margin-top: 4px;
    font-size: 13px;
    cursor: pointer;
}

.choice-pill input{
    display:none;
}

.choice-circle{
    width: 16px;
    height: 16px;
    border-radius: 50%;
    border: 2px solid #44546a;
    margin-right: 4px;
    box-sizing: border-box;
    position: relative;
}

.choice-pill input:checked + .choice-circle::after{
    content: "";
    position: absolute;
    inset: 2px;
    border-radius: 50%;
    background: #44546a;
}

/* FEEDBACK PER BARIS */
.row-feedback{
    margin-top: 4px;
    font-size: 12px;
}

.row-feedback.correct{
    color:#1b8a3c;
}

.row-feedback.wrong{
    color:#c62828;
}

/* TOMBOL CEK & RINGKASAN */
.check-wrapper{
    margin-top: 10px;
    text-align: right;
}

.btn-check-answer{
    background:#1a73e8;
    color:#fff;
    border:none;
    padding:8px 18px;
    border-radius:6px;
    font-size:14px;
    font-weight:600;
    cursor:pointer;
}

.btn-check-answer:hover{
    background:#185abc;
}

.quiz-summary{
    margin-top: 8px;
    font-size: 14px;
    font-weight: 600;
}
</style>
@endpush

@section('content')
<div class="content-card">
    <!-- BLOK TUJUAN PEMBELAJARAN -->
    <section class="objective-box">
        <div class="objective-title">TUJUAN PEMBELAJARAN</div>
        <ul class="objective-list">
            <li>
                Mengenal konsep algoritma sebagai langkah-langkah logis untuk menyelesaikan masalah.
            </li>
            <li>
                Menganalisis bagaimana algoritma bekerja dalam sistem kecerdasan buatan (AI) untuk membantu komputer mengambil keputusan secara logis.
            </li>
        </ul>
    </section>
    <hr>

    <div class="video-wrapper">
        <video controls>
            <source src="{{ asset('video/algo.mp4') }}" type="video/mp4">
        </video>
    </div>
    <hr>

    <!-- PARAGRAF PENGANTAR -->
    <p class="section-text">
        Bayangkan kamu sedang menuliskan resep membuat mie instan. Langkah apa yang harus dilakukan terlebih dahulu agar hasilnya sesuai?
        Sama halnya dengan komputer, ia juga membutuhkan serangkaian langkah logis yang disebut algoritma untuk dapat menyelesaikan suatu
        permasalahan. Melalui bagian ini, kamu akan memahami bagaimana algoritma menjadi dasar dari cara kerja komputer dalam berpikir secara runtut, sistematis, dan efisien.
    </p>

    <section id="materi-isi" class="materi-isi">
        <h3>1. Konsep Algortima</h3>
        <p class="style-materi">
            Pengertian algoritma sangat berkaitan dengan logika, yaitu kemampuan seseorang untuk berpikir secara rasional dalam menghadapi
            suatu permasalahan guna menemukan kebenaran yang dapat dibuktikan dan diterima oleh akal. Logika sering dihubungkan dengan
            kecerdasan; seseorang yang mampu berpikir logis biasanya dianggap sebagai individu yang cerdas. Oleh karena itu, logika
            menjadi hal yang sangat penting dalam proses penyelesaian masalah (Barakbah <i>et al.</i>, 2013). Algoritma merupakan jantung dari
            ilmu komputer atau ilmu informatika (Jamaluddin, 2021).
        </p>
        <p class="style-materi">
            Dalam kehidupan keseharian kita sebagai manusia, juga memiliki proses algoritma. Karena itu, ketika sebuah mesin bekerja menggunakan algoritma, mesin tersebut sebenarnya mengikuti
            bentuk kecerdasan yang sudah ditanamkan oleh manusia ke dalam langkah-langkah kerjanya (Santoso, 2023).
        </p>
        <p class="style-materi">
            <b>Algoritma</b> dapat diartikan ilmu yang mempelajari cara penyelesaian suatu masalah berdasarkan urutan langkah-langkah terbatas
            yang disusun secara sistematis dan menggunakan bahasa yang logis dengan tujuan tertentu. Tujuan mempelajari algoritma adalah
            untuk membiasakan diri membuat perencanaan ketika menghadapi suatu permasalahan.
        </p>

        <div class="case-title">
            Contoh Kasus: <b>"Si Komputer Tukang Tebak Video Favoritmu"</b>
        </div>
        <p style="font-size:13px; line-height:1.9;"><b>Ilustrasi: </b>Bayangkan kamu baru selesai menonton video tentang kucing lucu di YouTube. Tiba-tiba, YouTube menyarankan video kucing lainnya yang lebih lucu. Kok bisa?</p>
        <figure class="img-figure">
            <img src="{{ asset('img/ilustrasi2.png') }}" alt="Gambar 6 Ilustrasi Komputer Menebak Selera Pengguna">
            <figcaption><i>Gambar 6 Ilustrasi Komputer Menebak Selera Pengguna</i></figcaption>
        </figure>

        <p style="font-size:13px; line-height:1.9;"><b>Penjelasan:</b> Sebenarnya komputer tidak secara kebetulan merekomendasikan video yang kamu sukai, melainkan bekerja menggunakan algoritma. Algoritma berperan sebagai langkah-langkah logis yang mengatur cara komputer mengolah data, seperti jenis video yang kamu tonton, durasi menonton, dan kebiasaanmu memilih video tertentu. Dari data tersebut, algoritma mencari pola, misalnya kesamaan tema atau jenis konten yang sering kamu tonton, lalu menggunakan pola itu untuk memperkirakan video apa yang kemungkinan besar akan kamu sukai selanjutnya. Hal ini menunjukkan bahwa dalam sistem kecerdasan buatan, algoritma menjadi "otak logis" yang membantu komputer mengambil keputusan berdasarkan data, bukan berdasarkan tebakan atau perasaan.
        </p>
    </section>
</div>

<div class="bottom-bar">
    <a href="{{ route('materi.algoritma2') }}" class="btn-next">
        Materi Selanjutnya
        <i class="fa-solid fa-arrow-right"></i>
    </a>
</div>
@endsection

@push('scripts')
@endpush