@extends('layouts.siswa')

@section('title', 'Algoritma: Pengenalan Algoritma')

@section('topbar', 'Peran Algoritma dalam Sistem Komputer')

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
.content-title {
    display: block;
    font-size: 18px;
    font-weight: 700;
    color: #1a1a2e;
    background: linear-gradient(135deg, rgba(0, 180, 255, 0.15), rgba(0, 100, 200, 0.1));
    border-left: 4px solid #0099cc;
    padding: 8px 16px 8px 14px;
    border-radius: 5px 8px 8px 5px;
    margin-bottom: 30px;
    margin-top: 30px;
}
</style>
@endpush

@section('content')
<div class="content-card">
    <!-- BLOK TUJUAN PEMBELAJARAN -->
    <section class="objective-box">
        <div class="objective-title">TUJUAN PEMBELAJARAN</div>
        <ul class="objective-list">
            <li>Menjelaskan konsep algoritma sebagai langkah-langkah logis dalam penyelesaian masalah.</li>
            <li>Menganalisis peran algoritma dalam proses kerja kecerdasan buatan.</li>
            <li>Menganalisis cara kerja algoritma dalam menghasilkan keputusan pada sistem kecerdasan buatan.</li>
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
    Dalam kehidupan sehari-hari, banyak kegiatan dilakukan dengan mengikuti urutan langkah tertentu agar tujuan dapat tercapai dengan benar. Sebelum mempelajari materi lebih lanjut, buatlah dugaan mengenai pentingnya urutan langkah bagi komputer dalam mengolah data dan menghasilkan keputusan, kemudian klik tombol "Coba Duga Dulu".
    </p>

    <!-- ============ COBA DUGA DULU ============ -->
    <section class="predict-card">
    <div class="predict-title">Coba Duga Dulu!</div>

    <div class="predict-text">
    Komputer membutuhkan urutan langkah yang jelas agar dapat memproses data dan menghasilkan keputusan yang tepat.
    <br><br>
    <b>Setuju atau Tidak Setuju?</b>
    </div>

    <div class="predict-buttons">
        <button class="predict-btn yes" id="btnSetuju">Setuju</button>
        <button class="predict-btn no" id="btnTidak">Tidak Setuju</button>
    </div>

    <div class="predict-feedback" id="predictFeedback"></div>
    </section>

    <section id="materi-isi" class="materi-isi hidden">
        <h3 class="content-title">1. Pengenalan Algoritma</h3>
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
        <p class="style-materi">
            Peran algoritma yaitu membantu komputer menentukan apa yang harus dilakukan berdasarkan aturan dan data yang diberikan. Tanpa algoritma, komputer tidak dapat memproses informasi atau menyelesaikan tugas secara sistematis. Dalam kecerdasan buatan, algoritma digunakan untuk mengenali pola, membuat prediksi, memberikan rekomendasi, dan membantu sistem mengambil keputusan secara otomatis.
        </p>
        <div class="case-title">
            Contoh Kasus: <b>"Cara Komputer Menentukan Rekomendasi Video"</b>
        </div>
        <p style="font-size:13px; line-height:1.9;"><b>Ilustrasi: </b>Bayangkan kamu sedang menonton video resep Soto Banjar di sebuah aplikasi video menggunakan ponsel. Setelah video selesai, aplikasi mulai menampilkan rekomendasi kuliner khas Kalimantan Selatan lainnya seperti ketupat kandangan, bingka Banjar, dan iwak haruan di layar ponselmu. Aplikasi tersebut seolah-olah mengetahui makanan yang kamu sukai. Bagaimana aplikasi dapat mengetahui hal tersebut?</p>
        <figure class="img-figure">
            <img src="{{ asset('img/ilustrasi2.png') }}" alt="Gambar 6 Ilustrasi Komputer Menebak Selera Pengguna">
            <figcaption><i>Gambar 8. Ilustrasi Aplikasi Merekomendasikan Kuliner Banjar</i></figcaption>
        </figure>

        <p style="font-size:13px; line-height:1.9;"><b>Penjelasan:</b> Aplikasi tidak menampilkan rekomendasi makanan secara acak, melainkan menggunakan algoritma untuk mengolah data pengguna, seperti video yang ditonton, tombol yang diklik, dan jenis konten yang sering dicari. Dari data tersebut, komputer mengenali pola minat pengguna, misalnya terhadap kuliner khas Kalimantan Selatan, lalu merekomendasikan konten serupa. Hal ini menunjukkan bahwa algoritma membantu komputer memahami minat pengguna dan memberikan rekomendasi berdasarkan data yang tersedia.</p></section>
</div>

<div class="bottom-bar">
    <a href="{{ route('materi.algoritma2') }}" class="btn-next">
        Materi Selanjutnya
        <i class="fa-solid fa-arrow-right"></i>
    </a>
</div>
@endsection

@push('scripts')
<script>
const MATERI_KEY = "algoritma.konsep"; 

let sudahTercatat = false;

window.addEventListener('scroll', function () {
    if (sudahTercatat) return;

    const scrollBottom = window.scrollY + window.innerHeight;
    const pageHeight = document.documentElement.scrollHeight;

    if (scrollBottom >= pageHeight - 100) {
        sudahTercatat = true;
        fetch("{{ route('materi.progress.read') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ materi_key: MATERI_KEY })
        });
    }
});
</script>
<script>
  const btnSetuju = document.getElementById("btnSetuju");
  const btnTidak  = document.getElementById("btnTidak");
  const fbPred    = document.getElementById("predictFeedback");
  const materi    = document.getElementById("materi-isi");

  function tampilkanMateri(){
    if (!materi) return;
    materi.classList.remove("hidden");
  }

  btnSetuju?.addEventListener("click", () => {
    fbPred.classList.add("show");
    fbPred.innerHTML = `
      ✅ <b>Setuju!</b><br>
    Komputer bekerja berdasarkan algoritma, yaitu urutan langkah yang jelas dan logis agar data dapat diproses dan menghasilkan keputusan yang tepat. Yuk, lihat penjelasannya lebih lanjut!    `;
    tampilkanMateri();
  });

  btnTidak?.addEventListener("click", () => {
    fbPred.classList.add("show");
    fbPred.innerHTML = `
      ❌ <b>Tidak Setuju.</b><br>
    Dalam AI, komputer tidak bisa mengambil keputusan tanpa data dan urutan langkah yang jelas. Yuk, lihat penjelasannya pada materi kali ini.    `;
    tampilkanMateri();
  });
</script>
@endpush