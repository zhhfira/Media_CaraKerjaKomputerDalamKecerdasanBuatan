@extends('layouts.siswa')

@section('title', 'Berpikir Komputasional: Pengenalan Computational Thinking')

@section('topbar', 'Penerapan Computational Thinking dalam Pemecahan Masalah')
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
            <li>
                Menjelaskan konsep <i>computational thinking</i> dalam pemecahan masalah.
            </li>
            <li>
                Menganalisis komponen utama computational thinking (dekomposisi, pengenalan pola, abstraksi, dan algoritma).
            </li>
            <li>
                Menerapkan <i>computational thinking</i> dalam menyelesaikan permasalahan sehari-hari secara sistematis.
            </li>
        </ul>
    </section>

    <hr>
        <div class="video-wrapper">
        <video controls>
            <source src="{{ asset('video/ct.mp4') }}" type="video/mp4">
        </video>
    </div>
    <hr>

    <!-- PARAGRAF PENGANTAR -->
    <p class="section-text">
    Komputer memproses informasi melalui serangkaian langkah yang teratur. Untuk menangani tugas yang kompleks, masalah biasanya diuraikan menjadi bagian-bagian yang lebih kecil agar lebih mudah diproses. Buatlah dugaan mengenai manfaat pendekatan tersebut bagi komputer, kemudian klik tombol "Coba Duga Dulu".
    </p>

    <!-- ============ COBA DUGA DULU ============ -->
    <section class="predict-card">
    <div class="predict-title">Coba Duga Dulu!</div>

    <div class="predict-text">
    Komputer dapat menyelesaikan masalah yang kompleks dengan lebih efektif jika masalah tersebut dipecah menjadi bagian-bagian yang lebih kecil dan diproses secara bertahap.
    <br><br>  
    <b>Setuju atau Tidak Setuju?</b>
    </div>

    <div class="predict-buttons">
        <button class="predict-btn yes" id="btnSetuju">Setuju</button>
        <button class="predict-btn no" id="btnTidak">Tidak Setuju</button>
    </div>

    <div class="predict-feedback" id="predictFeedback"></div>
    </section>

    <!-- MATERI CT -->
    <section id="materi-isi" class="materi-isi hidden">
        <h3 class="content-title">1. Pengenalan <i>Computational Thinking</i></h3>
        <p class="style-materi">
            <i>Computational Thinking</i> (CT) atau berpikir komputasional merupakan cara berpikir yang digunakan untuk menyelesaikan masalah secara logis, terstruktur, dan efisien yang menyerupai cara kerja sistem komputasi (Wing, 2010). <i>Computational thinking</i> tidak hanya berfokus pada penggunaan teknologi, tetapi lebih pada bagaimana seseorang memahami permasalahan, mengolah informasi, dan menyusun langkah penyelesaian secara sistematis. Melalui <i>computational thinking,</i> permasalahan yang awalnya terlihat kompleks dapat dipecah menjadi bagian-bagian yang lebih kecil dan mudah dipahami.
        </p>
        <p class="style-materi">
            Pendekatan berpikir komputasional ini memiliki keterkaitan yang erat dengan cara kerja kecerdasan buatan <i>(Artificial Intelligence)</i> dalam memecahkan masalah. Kecerdasan buatan tidak mengambil keputusan secara intuitif seperti manusia, melainkan bekerja berdasarkan data dan algoritma. Dalam prosesnya, kecerdasan buatan menerapkan prinsip-prinsip <i>computational thinking</i>, seperti memecah masalah besar menjadi beberapa tahap (dekomposisi), mengenali pola dari kumpulan data, melakukan abstraksi untuk mengambil informasi penting, serta menyusun algoritma sebagai dasar pengambilan keputusan. Dengan kata lain, kecerdasan buatan bekerja melalui tahapan berpikir komputasional yang dirancang oleh manusia.
        </p>
        <figure class="img-figure">
            <img src="{{ asset('img/prinsip-ct.png') }}" alt="Gambar 13 Prinsip/Komponen Computational Thinking">
            <figcaption><i>Gambar 13. Prinsip/Komponen Computational Thinking</i></figcaption>
        </figure>
        <p class="style-materi">
            Selain digunakan dalam bidang ilmu komputer, computational thinking juga dapat diterapkan dalam berbagai aktivitas kehidupan sehari-hari. Misalnya, ketika seseorang menyusun jadwal belajar, menentukan rute perjalanan tercepat, atau mengikuti langkah-langkah dalam memasak, secara tidak langsung ia sedang menerapkan pola berpikir komputasional. Oleh karena itu, computational thinking tidak hanya bermanfaat untuk memahami teknologi dan kecerdasan buatan, tetapi juga membantu seseorang dalam mengambil keputusan dan menyelesaikan masalah secara lebih efektif dalam berbagai situasi.        </p>

        <div class="case-title">
            Contoh Kasus: <b>"Bekerja Ala Robot: Misi Penyelamatan Sandwich"</b>
        </div>
        <p style="font-size:13px; line-height:1.9;"><b>Ilustrasi:</b> Berikan instruksi ke robot untuk membuat sandwich. Tapi... kamu hanya bisa memberi perintah satu per satu. Jika kamu bilang "oleskan selai" tanpa bilang "ambil roti dulu", robot bisa bingung!</p>
        <figure class="img-figure">
            <img src="{{ asset('img/ilustrasi4.png') }}" alt="Gambar 14 Ilustrasi Berpikir Ala Robot">
            <figcaption><i>Gambar 14. Ilustrasi Berpikir Ala Robot</i></figcaption>
        </figure>

        <p style="font-size:13px; line-height:1.9;"><b>Penjelasan:</b> Komputer atau robot tidak dapat menafsirkan perintah secara bebas seperti manusia. Robot hanya dapat bekerja jika menerima instruksi yang jelas, logis, dan tersusun dengan benar. Untuk itu, kamu perlu menerapkan <i>Computational Thinking</i> (CT), yaitu cara berpikir sistematis dalam memecahkan masalah. Dalam aktivitas ini, kamu memecah tugas besar membuat sandwich menjadi langkah-langkah kecil seperti mengambil roti, mengoleskan selai, dan menyusun bahan secara berurutan (dekomposisi), mengenali urutan langkah yang selalu sama (pengenalan pola), memilih langkah yang benar-benar diperlukan (abstraksi), serta menyusun perintah secara runtut dan efisien (algoritma). Aktivitas ini menunjukkan bahwa komputer hanya dapat menyelesaikan tugas dengan baik jika manusia mampu berpikir komputasional dan memberikan instruksi yang terstruktur.</p>
    </section>
</div>

<div class="bottom-bar">
    <a href="{{ route('materi.ct2') }}" class="btn-next">
        Materi Selanjutnya
        <i class="fa-solid fa-arrow-right"></i>
    </a>
</div>
@endsection
@push('scripts')
<script>
const MATERI_KEY = "ct.konsep"; 

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
Pemecahan masalah menjadi bagian-bagian kecil membantu komputer mengolah informasi dengan lebih efisien. Prinsip ini digunakan dalam computational thinking dan menjadi dasar berbagai sistem kecerdasan buatan. Yuk, lihat penjelasannya lebih lanjut!`;    tampilkanMateri();
  });

  btnTidak?.addEventListener("click", () => {
    fbPred.classList.add("show");
    fbPred.innerHTML = `
      ❌ <b>Tidak Setuju.</b><br>
Masalah yang rumit dan kompleks akan lebih mudah diselesaikan jika dipecah menjadi bagian kecil dan disusun dengan langkah yang teratur. Yuk, lihat penjelasannya pada materi kali ini.`;    tampilkanMateri();
  });
</script>
@endpush