@extends('layouts.siswa')

@section('title', 'Berpikir Komputasional: Konsep Computational Thinking')

@section('topbar', 'Computational Thinking: Berpikir Ala Komputer')

@section('content')
<div class="content-card">
    <!-- BLOK TUJUAN PEMBELAJARAN -->
    <section class="objective-box">
        <div class="objective-title">TUJUAN PEMBELAJARAN</div>
        <ul class="objective-list">
            <li>
                Mengenal konsep dasar <i>Computational Thinking</i> sebagai cara berpikir logis dan sistematis dalam menyelesaikan masalah.
            </li>
            <li>
                Menjelaskan empat komponen utama <i>Computational Thinking.</i>
            </li>
            <li>
                Menerapkan prinsip <i>Computational Thinking</i> dalam menyusun langkah-langkah logis untuk pemecahan masalah pada sistem kecerdasan buatan (AI).
            </li>
        </ul>
    </section>
    <hr>

    <!-- PARAGRAF PENGANTAR -->
    <p class="section-text">
        Pernahkah kamu bertanya-tanya bagaimana Google Maps bisa menentukan rute tercepat? Pernahkah kamu menghadapi masalah yang rumit dan tidak tahu harus memulai dari mana? Ternyata, ada cara berpikir yang dapat membantu menyelesaikan masalah secara logis dan terstruktur, seperti halnya komputer memproses informasi. Semua itu menggunakan cara berpikir yang disebut <i>Computational Thinking</i>. Melalui bagian ini, kamu akan mengenal <i>Computational Thinking</i>, yaitu kemampuan berpikir sistematis yang membantu seseorang memecahkan permasalahan dengan langkah yang efisien dan dapat diterapkan dalam berbagai situasi.
    </p>

    <!-- MATERI CT -->
    <section id="materi-isi" class="materi-isi">
        <h3>1. Konsep <i>Computational Thinking</i></h3>
        <p class="style-materi">
            <i>Computational Thinking</i> (CT) atau berpikir komputasional merupakan cara berpikir yang digunakan untuk menyelesaikan masalah secara logis, terstruktur, dan efisien, menyerupai cara kerja sistem komputasi. <i>Computational thinking</i> tidak hanya berfokus pada penggunaan teknologi, tetapi lebih pada bagaimana seseorang memahami permasalahan, mengolah informasi, dan menyusun langkah penyelesaian secara sistematis. Melalui <i>computational thinking,</i> permasalahan yang awalnya terlihat kompleks dapat dipecah menjadi bagian-bagian yang lebih kecil dan mudah dipahami.
        </p>
        <p class="style-materi">
            Pendekatan berpikir komputasional ini memiliki keterkaitan yang erat dengan cara kerja kecerdasan buatan <i>(Artificial Intelligence)</i> dalam memecahkan masalah. Kecerdasan buatan tidak mengambil keputusan secara intuitif seperti manusia, melainkan bekerja berdasarkan data dan algoritma. Dalam prosesnya, kecerdasan buatan menerapkan prinsip-prinsip <i>computational thinking</i>, seperti memecah masalah besar menjadi beberapa tahap (dekomposisi), mengenali pola dari kumpulan data, melakukan abstraksi untuk mengambil informasi penting, serta menyusun algoritma sebagai dasar pengambilan keputusan. Dengan kata lain, kecerdasan buatan "berpikir" melalui tahapan berpikir komputasional yang dirancang oleh manusia.
        </p>
        <figure class="img-figure">
            <img src="{{ asset('img/prinsip-ct.png') }}" alt="Gambar 11 Prinsip/Komponen Computational Thinking">
            <figcaption><i>Gambar 11 Prinsip/Komponen Computational Thinking</i></figcaption>
        </figure>
        <p class="style-materi">
            Sebagai contoh, ketika kecerdasan buatan digunakan untuk mengenali gambar atau memberikan rekomendasi, sistem tidak langsung menghasilkan keputusan. Kecerdasan buatan terlebih dahulu memproses data, mengidentifikasi pola tertentu, dan menjalankan algoritma yang telah disusun sebelumnya. Proses ini menunjukkan bahwa keberhasilan kecerdasan buatan dalam memecahkan masalah sangat bergantung pada kualitas penerapan <i>computational thinking,</i> baik dalam perancangan algoritma maupun dalam pengolahan data yang digunakan.
        </p>

        <div class="case-title">
            Contoh Kasus: <b>"Berpikir Ala Robot: Misi Penyelamatan Sandwich"</b>
        </div>
        <p style="font-size:13px; line-height:1.9;"><b>Ilustrasi:</b> Berikan instruksi ke robot untuk membuat sandwich. Tapi... kamu hanya bisa memberi perintah satu per satu. Jika kamu bilang "oleskan selai" tanpa bilang "ambil roti dulu", robot bisa bingung!</p>
        <figure class="img-figure">
            <img src="{{ asset('img/ilustrasi4.png') }}" alt="Gambar 12 Ilustrasi Berpikir Ala Robot">
            <figcaption><i>Gambar 12 Ilustrasi Berpikir Ala Robot</i></figcaption>
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