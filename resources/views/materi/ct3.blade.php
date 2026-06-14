@extends('layouts.siswa')

@section('title', 'Berpikir Komputasional: Penerapan Computational Thinking Dalam Kehidupan Nyata')

@section('topbar', 'Penerapan Computational Thinking dalam Pemecahan Masalah')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Alata&family=Itim&family=Kumbh+Sans:wght,YOPQ@100..900,300&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

<style>

.tabel-ai {
    width: 100%;
    border-collapse: collapse;
    font-size: 13px;
    background: #ffffff;
}

.tabel-ai th {
    background: #222;
    color: #fff;
    text-align: center;
    border: 1px solid #444;
    padding: 8px;
}

.tabel-ai td {
    border: 1px solid #555;
    padding: 8px;
    vertical-align: top;
}

.tabel-ai tbody tr:nth-child(odd) {
    background: #f9f9f9;
}

.tabel-ai td:first-child {
    font-weight: bold;
    width: 20%;
}
.kode-ai {
    font-family: Consolas, monospace;
    font-size: 14px;
    line-height: 1.5;
    white-space: pre-wrap;
}
.shape {
    margin: auto;
}

/* Oval */
.terminal {
    width: 180px;
    height: 70px;
    background: #3f6fd1;
    border-radius: 50%;
}

/* Persegi panjang */
.proses {
    width: 180px;
    height: 70px;
    background: #3f6fd1;
}

/* Belah ketupat */
.keputusan {
    width: 90px;
    height: 90px;
    background: #3f6fd1;
    transform: rotate(45deg);
    margin-top: 15px;
    margin-bottom: 15px;
}

/* Panah */
.panah {
    font-size: 60px;
    text-align: center;
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

    <h3 class="content-title">3. Penerapan Computational Thinking Dalam Kehidupan Nyata </i></h3>

    <p class="style-materi">
        Pada aktivitas sebelumnya berarti kamu sudah mengenal 4 komponen <i>computational 
        thinking</i> — Dekomposisi, Pengenalan Pola, Abstraksi, dan Algoritma. Tapi sebenarnya, kamu 
        sudah sering melakukan <i>computational thinking</i> tanpa sadar! Setiap kali kamu memecah tugas 
        besar menjadi langkah-langkah kecil, mengenali pola dari pengalaman lalu, atau membuat 
        rencana sebelum bertindak. Sekarang saatnya kita latihan menerapkannya secara sadar dan 
        terstruktur.
    </p>
    <p class="style-materi">
        Banyak yang mengira <i>computational thinking</i>  hanya digunakan oleh <i>programmer</i>. Padahal 
        <i>computational thinking</i>  adalah cara berpikir yang bisa diterapkan siapa saja, untuk masalah apa 
        saja — mulai dari merencanakan perjalanan, mengatur jadwal belajar, hingga memutuskan menu 
        makan siang. Yang membedakan orang yang berpikir secara <i>computational thinking</i>  dengan yang 
        tidak adalah kemampuan mereka memecah masalah secara terstruktur dan tidak panik ketika 
        menghadapi masalah yang rumit. 
    </p>
    <br>
    <h3>Studi Kasus — Merencanakan Belajar untuk Ujian </h3>
    <p>Bayangkan kamu punya ujian 5 mata pelajaran dalam 2 minggu. Bagaimana <i>computational 
    thinking</i> membantumu? </p>
    <br>
    <h6 style="margin-bottom:14px;font-size:13px;">Tabel 4. Penerapan CT untuk Merencanakan Belajar</h6>
    <table class="tabel-ai">
        <thead>
            <tr>
                <th>Komponen CT</th>
                <th>Penerapan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Dekomposisi</td>
                <td>
                    Pecah "belajar untuk ujian" menjadi:
                    buat jadwal → tentukan prioritas →
                    belajar per mata pelajaran →
                    latihan soal → evaluasi
                </td>
            </tr>
            <tr>
                <td>Pengenalan Pola</td>
                <td>
                    Kamu tahu dari pengalaman bahwa
                    Matematika butuh waktu lebih lama,
                    sementara Bahasa Indonesia bisa
                    lebih singkat
                </td>
            </tr>
            <tr>
                <td>Abstraksi</td>
                <td>
                    Fokus pada topik yang sering keluar
                    di ujian, abaikan detail yang tidak penting
                </td>
            </tr>
            <tr>
                <td>Algoritma</td>
                <td>
                    Buat jadwal harian yang jelas:
                    Senin → Matematika 2 jam
                    Selasa → IPA 1,5 jam <br>dst.
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <div class="border-blue">
    Logika IF-THEN-ELSE dalam Sistem Komputer</div>

    <p class="style-materi">
    Salah satu cara paling sederhana menerapkan <i>computational thinking</i> adalah dengan 
    logika <i><b>IF-THEN-ELSE</b></i>(Jika-Maka-Jika Tidak). Komputer menggunakan logika ini untuk mengambil 
    keputusan. Begitupun dengan manusia dapat menggunakan logika ini untuk menyelesaikan 
    masalah. 
    </p>
    <p>Contoh dalam kehidupan sehari-hari: </p><br>
    <pre class="kode-ai">
        JIKA nilai ujian ≥ 75
            MAKA → Lulus
            JIKA TIDAK → Ikut remedial

        JIKA hujan
            MAKA → Bawa payung
            JIKA TIDAK → Tidak perlu bawa payung

        JIKA saldo cukup
            MAKA → Beli makan siang di kantin
            JIKA TIDAK → Bawa bekal dari rumah
    </pre><br>

    <div class="border-blue">
    <i>Flowchart </i>sebagai Visualisasi Algoritma</div>

    <p class="style-materi">
    <i>Flowchart</i> adalah cara menggambarkan algoritma dalam bentuk diagram. Dengan <i>flowchart</i>, langkah-langkah penyelesaian masalah menjadi lebih mudah dipahami dan dikomunikasikan. </p>
    <p>Berikut simbol-simbol dasar <i>flowchart</i>: </p><br>

    <h6 style="margin-bottom:14px;font-size:13px;">Tabel 5. Simbol-simbol <i>Flowchart</i></h6>

    <table class="tabel-ai">
    <thead>
        <tr>
            <th>Simbol</th>
            <th>Bentuk</th>
            <th>Fungsi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Terminal</td>
            <td>
                <div class="shape terminal"></div>
            </td>
            <td>Titik awal dan akhir</td>
        </tr>
        <tr>
            <td>Proses</td>
            <td>
                <div class="shape proses"></div>
            </td>
            <td>Langkah atau tindakan</td>
        </tr>
        <tr>
            <td>Keputusan</td>
            <td>
                <div class="shape keputusan"></div>
            </td>
            <td>Pertanyaan Ya/Tidak</td>
        </tr>
        <tr>
            <td>Panah</td>
            <td>
                <div class="panah">⟶</div>
            </td>
            <td>Arah alur</td>
        </tr>
    </tbody>
</table>
<br>
<p>Contoh <i>flowchart</i> sederhana dalam kehidupan sehari-hari: <b><i>Apakah saya perlu belajar malam ini?</i></b></p>
    <figure class="img-figure">
    <img src="{{ asset('img/flowchart.png') }}" alt="Gambar 15. Contoh Flowchart">
    <figcaption><i>Gambar 15. Contoh Flowchart</i></figcaption>
    </figure>
<p class="style-materi">
    Berdasarkan contoh tersebut, <i>flowchart</i> membantu menggambarkan urutan langkah 
    dan proses pengambilan keputusan secara jelas dan terstruktur. Dalam <i>Computational 
    Thinking</i> (CT), <i>flowchart</i> digunakan untuk menyusun algoritma, memahami alur 
    penyelesaian masalah, serta mempermudah seseorang dalam menganalisis langkah-langkah 
    yang harus dilakukan untuk mencapai tujuan tertentu.
</p>
</div>
<div class="bottom-bar">
    <a href="{{ route('quiz.show',  ['quiz' => 4]) }}" class="btn-next">
        Uji Pemahamanmu!
        <i class="fa-solid fa-arrow-right"></i>
    </a>
</div>
@endsection

@push('scripts')
<script>
const MATERI_KEY = "ct.penerapan"; 

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
@endpush
