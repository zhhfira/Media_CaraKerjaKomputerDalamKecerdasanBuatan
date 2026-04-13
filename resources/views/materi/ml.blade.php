@extends('layouts.siswa')

@section('title', 'Machine Learning: Konsep Machine Learning')

@section('topbar', 'Machine Learning: Komputer yang Belajar')

@section('content')
<div class="content-card">
    <!-- BLOK TUJUAN PEMBELAJARAN -->
    <section class="objective-box">
        <div class="objective-title">TUJUAN PEMBELAJARAN</div>
        <ul class="objective-list">
            <li>
                Mengenal konsep dasar <i>Machine Learning</i> sebagai cabang dari sistem kecerdasan buatan (AI).
            </li>
            <li>
                Menjelaskan jenis <i>Machine Learning</i>, yaitu <i>Supervised Learning</i> dan <i>Unsupervised Learning</i>, serta perbedaannya berdasarkan jenis data yang digunakan.
            </li>
            <li>
                Menentukan hasil keputusan berdasarkan jalur pertanyaan pada pohon keputusan dalam sistem kecerdasan buatan (AI).
            </li>
        </ul>
    </section>
    <hr>

    <!-- PARAGRAF PENGANTAR -->
    <p class="section-text">
        Pernahkah kamu menyadari bahwa komputer kini dapat mengenali wajah seseorang, memahami ucapan, bahkan memberikan rekomendasi lagu
        atau film sesuai selera? Kemampuan tersebut muncul karena adanya Machine Learning — teknologi yang memungkinkan komputer belajar
        dari data tanpa harus diprogram langkah demi Langkah. Pada bagian ini, kamu akan mempelajari bagaimana komputer dapat mengenali pola,
        menganalisis informasi, dan membuat keputusan berdasarkan pengalaman yang telah diperolehnya.
    </p>

    <!-- MATERI ML -->
    <section id="materi-isi" class="materi-isi">
        <h3>1. Konsep <i>Machine Learning</i></h3>
        <p class="style-materi">
            Kecerdasan Buatan menjadi semakin berkembang karena adanya <i>Machine Learning</i> (ML), yaitu cabang dari kecerdasan buatan yang memungkinkan komputer belajar dari data tanpa harus diprogram langkah demi langkah. Model ini disebut model <i>Machine Learning</i>, yaitu algoritma komputer yang dapat menyimpan pengetahuan dan memperbaruinya seiring proses pembelajaran dari data (Elwirehardja et al., 2023).
        </p>
        <p class="style-materi">
            Alih-alih diprogram secara eksplisit untuk setiap tugas, komputer dilatih menggunakan data agar mampu mengenali pola, mengelompokkan informasi, dan membuat prediksi. Dalam proses ini, komputer membangun sebuah model ML, yaitu model komputasi yang menyimpan "pengetahuan" dari data yang telah dipelajarinya.
        </p>
        <p class="style-materi">
            Data yang digunakan dalam proses <i>machine learning</i> umumnya dibagi menjadi dua jenis, yaitu <b>data latih</b> <i>(data training)</i> dan <b>data uji</b> <i>(data testing)</i>. Data latih digunakan untuk membangun atau melatih model agar mampu mempelajari pola dari data, sedangkan data uji digunakan untuk mengevaluasi seberapa baik model tersebut bekerja ketika diberikan data baru yang belum pernah dilihat sebelumnya.
            Proses kerja Machine Learning secara umum dapat digambarkan melalui alur mulai dari penggunaan data latih hingga menghasilkan prediksi, seperti yang ditunjukkan pada Gambar 7 berikut ini.
        </p>
        <figure class="img-figure">
            <img src="{{ asset('img/alurML.png') }}" alt="Gambar 7 Alur Kerja Machine Learning">
            <figcaption><i>Gambar 7 Alur Kerja Machine Learning</i></figcaption>
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
            Contoh Kasus: <b>"Si Komputer Tukang Tebak Hasil Belajarmu"</b>
        </div>
        <p style="font-size:13px; line-height:1.9;"><b>Ilustrasi:</b> Sekolah memiliki data nilai 1000 siswa, seperti nilai ulangan, tugas, dan kehadiran. Sebagian data sudah memiliki keterangan hasil akhir “Lulus” atau “Tidak Lulus”, sementara sebagian lainnya belum. Jika data sudah memiliki label tersebut, kecerdasan buatan akan belajar dari contoh itu untuk memahami pola dan memprediksi kelulusan siswa baru. Namun, jika data tidak memiliki label, kecerdasan buatan tidak bisa memprediksi langsung, melainkan akan mengelompokkan siswa berdasarkan kemiripan nilai, seperti kelompok nilai tinggi, sedang, dan rendah.</p>
        <figure class="img-figure">
            <img src="{{ asset('img/ilustrasi3.png') }}" alt="Gambar 8 Ilustrasi Supervised Learning vs Unsupervised Learning">
            <figcaption><i>Gambar 8 Ilustrasi Supervised Learning vs Unsupervised Learning</i></figcaption>
        </figure>

        <p style="font-size:13px; line-height:1.9;"><b>Penjelasan:</b> Kasus ini menunjukkan dua pendekatan dalam machine learning.
            Pada <i>supervised learning</i>, komputer belajar dari data yang sudah memiliki label (Lulus/Tidak Lulus). Kecerdasan buatan membandingkan pola nilai dan kehadiran dengan label tersebut, lalu membentuk aturan sendiri untuk melakukan prediksi.
            Sementara itu, pada <i>unsupervised learning</i>, komputer tidak diberi label atau jawaban benar. Kecerdasan buatan mencari pola dan kemiripan nilai antar siswa secara mandiri, kemudian mengelompokkan siswa ke dalam beberapa kelompok berdasarkan karakteristik yang mirip.
        </p>
    </section>
</div>

<div class="bottom-bar">
    <a href="{{ route('materi.ml2') }}" class="btn-next">
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
        Komputer dapat belajar dari contoh data untuk mengenali pola dan menghasilkan keputusan yang berbeda. Inilah cara kerja machine learning. Yuk, lihat penjelasannya lebih lanjut!
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