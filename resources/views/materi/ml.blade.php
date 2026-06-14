@extends('layouts.siswa')

@section('title', 'Machine Learning: Pengenalan Machine Learning')

@section('topbar', 'Proses Pembelajaran Mesin dalam Sistem Komputer')

@push('styles')
<style>
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
            <li>Menjelaskan konsep <i>machine learning</i> sebagai metode pembelajaran berbasis data.</li>
            <li>Menganalisis proses pembelajaran mesin dari data dan kesalahan <i>(error-based learning)</i>.</li>
            <li>Mengevaluasi perbedaan <i>supervised learning</i> dan <i>unsupervised learning</i> berdasarkan karakteristik dan penerapannya.</li>
            <li>Menganalisis cara kerja model sederhana seperti pohon keputusan <i>(decision tree)</i> dalam menghasilkan prediksi.</li>
        </ul>
    </section>

    <hr>
        <div class="video-wrapper">
        <video controls>
            <source src="{{ asset('video/ml.mp4') }}" type="video/mp4">
        </video>
    </div>
    <hr>

    <!-- PARAGRAF PENGANTAR -->
    <p class="section-text">
    Data tidak hanya digunakan untuk menyimpan informasi, tetapi juga dapat menjadi sumber pembelajaran bagi komputer. Sebelum mempelajari konsep machine learning, buatlah dugaan mengenai bagaimana contoh data dapat membantu komputer menghasilkan keputusan yang berbeda, kemudian klik tombol "Coba Duga Dulu".
    </p>

    <!-- ============ COBA DUGA DULU ============ -->
    <section class="predict-card">
    <div class="predict-title">Coba Duga Dulu!</div>

    <div class="predict-text">
    Komputer dapat belajar membuat keputusan yang berbeda berdasarkan contoh data yang diberikan.
    <br>
    <b>Setuju atau Tidak Setuju?</b>
    </div>

    <div class="predict-buttons">
        <button class="predict-btn yes" id="btnSetuju">Setuju</button>
        <button class="predict-btn no" id="btnTidak">Tidak Setuju</button>
    </div>

    <div class="predict-feedback" id="predictFeedback"></div>
    </section>

    <!-- MATERI ML -->
    <section id="materi-isi" class="materi-isi hidden">
        <h3 class="content-title">1. Pengenalan <i>Machine Learning</i></h3>
        <p class="style-materi">
            Kecerdasan Buatan menjadi semakin berkembang karena adanya <i>Machine Learning</i> (ML), yaitu cabang dari kecerdasan buatan yang memungkinkan komputer belajar dari data tanpa harus diprogram langkah demi langkah. Model ini disebut model <i>Machine Learning</i>, yaitu algoritma komputer yang dapat menyimpan pengetahuan dan memperbaruinya seiring proses pembelajaran dari data (Elwirehardja et al., 2023).
        </p>
        <p class="style-materi">
            Alih-alih diprogram secara eksplisit untuk setiap tugas, komputer dilatih menggunakan data agar mampu mengenali pola, mengelompokkan informasi, dan membuat prediksi. Dalam proses ini, komputer membangun sebuah model ML, yaitu model komputasi yang menyimpan "pengetahuan" dari data yang telah dipelajarinya.
        </p>
        <p class="style-materi">
            Data yang digunakan dalam proses <i>machine learning</i> umumnya dibagi menjadi dua jenis, yaitu <b>data latih</b> <i>(data training)</i> dan <b>data uji</b> <i>(data testing)</i>. Data latih digunakan untuk membangun atau melatih model agar mampu mempelajari pola dari data, sedangkan data uji digunakan untuk mengevaluasi seberapa baik model tersebut bekerja ketika diberikan data baru yang belum pernah dilihat sebelumnya.
            Proses kerja Machine Learning secara umum dapat digambarkan melalui alur mulai dari penggunaan data latih hingga menghasilkan prediksi, seperti yang ditunjukkan pada Gambar 9 berikut ini.
        </p>
        <figure class="img-figure">
            <img src="{{ asset('img/alurML.png') }}" alt="Gambar 9 Alur Kerja Machine Learning">
            <figcaption><i>Gambar 9. Alur Kerja Machine Learning</i></figcaption>
        </figure>
        <p class="style-materi">
            Alurnya dimulai dari data latih, yaitu kumpulan contoh (misalnya gambar buah) yang sudah diketahui jawabannya.
            Kemudian kecerdasan buatan belajar dari data tersebut dengan mencari pola, seperti warna, bentuk, dan ciri khas lainnya.
            Dari proses itu terbentuk model kecerdasan buatan, yaitu “otak” yang sudah menyimpan pola hasil pembelajaran.
            Saat diberi data baru (data uji), model akan membandingkan dengan pola yang dipelajari lalu memberikan prediksi hasilnya.
        </p>
        <p class="style-materi">
            Beberapa contoh penerapan <i>machine learning</i> yang mudah dijumpai antara lain:
        </p>
        <ul>
            <li>
                Sistem rekomendasi: Platform seperti <i>YouTube, Netflix,</i> dan <i>Spotify</i> menggunakan <i>machine learning</i> untuk memahami kebiasaan pengguna dan merekomendasikan video, film, atau lagu yang sesuai dengan minat mereka.
            </li>
            <li>
                Pengenalan suara: Asisten virtual seperti <i>Siri, Google Assistant,</i> dan <i>Alexa</i> mampu mengenali serta memahami perintah suara berkat teknologi <i>machine learning</i>.
            </li>
            <li>
                Pencarian di internet: Mesin pencari seperti Google menggunakan ML untuk menafsirkan maksud pencarian pengguna dan menampilkan hasil yang paling relevan.
            </li>
        </ul>
        <p class="style-materi">
            Dalam <i>machine learning</i>, algoritma dapat dikelompokkan berdasarkan jenis masukan (input) dan keluaran (output) yang diharapkan dari model. Setiap algoritma memiliki cara berbeda dalam belajar dari data dan menghasilkan pengetahuan baru. Secara umum, terdapat dua jenis utama algoritma dalam <i>machine learning</i>, yaitu <i>Supervised Learning</i> dan <i>Unsupervised Learning.</i>
        </p>

        <div class="case-title">
            Contoh Kasus: <b>"Penerapan Machine Learning dalam Prediksi Hasil Belajar"</b>
        </div>
        <p style="font-size:13px; line-height:1.9;"><b>Ilustrasi:</b> Sekolah memiliki data nilai 1000 siswa, seperti nilai ulangan, tugas, dan kehadiran. Sebagian data sudah memiliki keterangan hasil akhir “Lulus” atau “Tidak Lulus”, sementara sebagian lainnya belum. Jika data sudah memiliki label tersebut, kecerdasan buatan akan belajar dari contoh itu untuk memahami pola dan memprediksi kelulusan siswa baru. Namun, jika data tidak memiliki label, kecerdasan buatan tidak bisa memprediksi langsung, melainkan akan mengelompokkan siswa berdasarkan kemiripan nilai, seperti kelompok nilai tinggi, sedang, dan rendah.</p>
        <figure class="img-figure">
            <img src="{{ asset('img/ilustrasi3.png') }}" alt="Gambar 10 Ilustrasi Supervised Learning vs Unsupervised Learning">
            <figcaption><i>Gambar 10. Ilustrasi Supervised Learning vs Unsupervised Learning</i></figcaption>
        </figure>

        <p style="font-size:13px; line-height:1.9;"><b>Penjelasan:</b> Kasus ini menunjukkan dua pendekatan dalam machine learning.
            Pada <i>supervised learning</i>, komputer belajar dari data yang sudah memiliki label (Lulus/Tidak Lulus). Kecerdasan buatan membandingkan pola nilai dan kehadiran dengan label tersebut, lalu membentuk aturan sendiri untuk melakukan prediksi.
            Sementara itu, pada <i>unsupervised learning</i>, komputer tidak diberi label atau jawaban benar. Kecerdasan buatan mencari pola dan kemiripan nilai antar siswa secara mandiri, kemudian mengelompokkan siswa ke dalam beberapa kelompok berdasarkan karakteristik yang mirip.
        </p>
    </section>
</div>

<div class="bottom-bar">
    <a href="{{ route('materi.ml1_2') }}" class="btn-next">
        Materi Selanjutnya
        <i class="fa-solid fa-arrow-right"></i>
    </a>
</div>
@endsection

@push('scripts')
<script>
const kunci  = "a";
const opsi   = document.querySelectorAll('input[name="q1"]');
const qmOverlay = document.getElementById("quizModal-overlay");
const qmTitle   = document.getElementById("quizModal-title");
const qmText    = document.getElementById("quizModal-text");
const qmClose   = document.getElementById("quizModal-close");

if (qmOverlay && qmClose) {
    function openQuizModal(title, text){
        qmTitle.textContent = title;
        qmText.textContent  = text;
        qmOverlay.classList.add("show");
    }

    function closeQuizModal(){
        qmOverlay.classList.remove("show");
    }

    qmClose.addEventListener("click", closeQuizModal);
    qmOverlay.addEventListener("click", (e) => {
        if(e.target === qmOverlay) closeQuizModal();
    });

    opsi.forEach(radio => {
        radio.addEventListener("change", () => {
            if (radio.value === kunci) {
                openQuizModal(
                    "Pilihan ini menarik",
                    "Kita akan melihat bersama apakah cara ini benar-benar sesuai dengan cara komputer bekerja pada materi kali ini."
                );
            } else {
                openQuizModal(
                    "Pendapat awal yang bagus",
                    "Pendapat ini akan kita bandingkan dengan penjelasan pada materi berikut."
                );
            }
        });
    });
}
</script>
<script>
const MATERI_KEY = "ml.konsep"; 

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
    if (!fbPred) return;
    fbPred.classList.add("show");
    fbPred.innerHTML = `
        ✅ <b>Setuju!</b><br>
        Komputer dapat belajar dari contoh data untuk mengenali pola dan menghasilkan keputusan yang berbeda. Inilah cara kerja <i>machine learning</i>. Yuk, lihat penjelasannya lebih lanjut!
    `;
    tampilkanMateri();
});

btnTidak?.addEventListener("click", () => {
    if (!fbPred) return;
    fbPred.classList.add("show");
    fbPred.innerHTML = `
        ❌ <b>Tidak Setuju.</b><br>
        Dalam AI, komputer belajar dari contoh data untuk menentukan keputusan. Tanpa data, komputer tidak dapat belajar. Yuk, lihat penjelasannya pada materi kali ini.
    `;
    tampilkanMateri();
});
</script>
@endpush