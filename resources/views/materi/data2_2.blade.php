@extends('layouts.siswa')

@section('title', 'Data: Bias Dalam Data ')

@section('topbar', 'Peran Data dalam Sistem Komputer')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Alata&family=Itim&family=Kumbh+Sans:wght,YOPQ@100..900,300&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

<style>
.judul {
    text-align: center;
    font-size: 15px;
    font-weight: bold;
    margin-bottom: 20px;
}

/* Bagian gambar */
.container-gambar {
    display: flex;
    justify-content: center;
    border-top: 1px solid #999;
    border-bottom: 1px solid #999;
}

.box-gambar {
    width: 50%;
    padding: 10px;
    text-align: center;
    border-right: 1px solid #999;
}

.box-gambar:last-child {
    border-right: none;
}

.box-gambar img {
    width: 100%;
    border-radius: 10px;
}

.container-teks {
    display: flex;
    margin-top: 10px;
    border-bottom: 1px solid #999;
    margin-bottom: 10px;
}

.box-teks {
    width: 50%;
    padding: 12px;
    border-right: 1px solid #999;
    line-height: 1.7;
    text-align: justify;
}

.box-teks:last-child {
    border-right: none;
}

.box-teks h3 {
    margin-bottom: 10px;
}
.judul-tabel {
    margin-bottom: 14px;
    font-size: 13px;
    font-weight: bold;
}

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
    <h3 class="content-title">3. Bias Dalam Data </h3>
    <p class="style-materi">
        Bias adalah kondisi ketika seseorang atau suatu sistem cenderung lebih memihak pada satu sisi sehingga informasi yang diberikan menjadi kurang objektif. Dalam pengukuran atau perhitungan, bias berarti kesalahan yang berulang sehingga hasil yang diperoleh selalu lebih tinggi atau lebih rendah dari nilai sebenarnya. <br>
    <i><b>"Apakah AI selalu adil?"</b></i>
    <br>
        Bayangkan sebuah perusahaan menggunakan sistem komputer untuk menyeleksi pelamar kerja secara otomatis. Setiap CV yang dikirim akan dianalisis oleh komputer untuk menentukan apakah pelamar dapat lolos ke tahap berikutnya. Sekilas proses tersebut terlihat adil dan objektif. Namun, bagaimana jika sistem justru lebih sering memilih kandidat laki-laki dibanding perempuan, bukan karena kemampuan, melainkan karena pola dari data sebelumnya memang didominasi oleh kandidat tertentu? Kondisi seperti ini disebut bias dalam kecerdasan buatan, yaitu ketika sistem menghasilkan keputusan yang kurang adil akibat belajar dari data yang tidak seimbang.
    </p>

    <div class="border-blue">
    Apa Itu Bias dalam AI?</div>

    <p class="style-materi">
        Ingat prinsip Garbage In, Garbage Out? Bias adalah salah satu bentuk nyatanya. Bias dalam 
        AI terjadi ketika sistem kecerdasan buatan menghasilkan keputusan yang berat sebelah atau tidak 
        adil terhadap kelompok tertentu. Penyebabnya bukan karena komputer "jahat" atau sengaja 
        berlaku tidak adil. Komputer tidak punya perasaan. Masalahnya ada pada data yang digunakan 
        untuk melatih AI tersebut. Jika data yang dipakai melatih AI lebih banyak berasal dari satu 
        kelompok saja, maka AI akan "terbiasa" dengan kelompok itu dan kurang mengenal kelompok 
        lainnya. Akibatnya, keputusan yang dihasilkan bisa merugikan kelompok yang kurang terwakili 
        dalam data. 
    </p>

    <h2 class="judul">Contoh Nyata Bias dalam AI</h2>
    <div class="container-gambar">
        <div class="box-gambar">
            <figure class="img-figure">
            <img src="{{ asset('img/biasdata1.png') }}" alt="Gambar 6. Ilustrasi Bias Data Rekrutmen Kerja">
            <figcaption><i>Gambar 5. Ilustrasi Bias Data Rekrutmen Kerja</i></figcaption>
            </figure>
        </div>
            <div class="box-gambar">
            <figure class="img-figure">
            <img src="{{ asset('img/biasdata2.png') }}" alt="Gambar 7. Ilustrasi Bias Data Pengenalan Wajah">
            <figcaption><i>Gambar 6. Ilustrasi Bias Data Pengenalan Wajah</i></figcaption>
            </figure>
        </div>
    </div>
    <div class="container-teks">
        <div class="box-teks">
            <h4>Contoh 1 – Sistem Rekrutmen Kerja</h4>
            <p>
                Sebuah perusahaan teknologi membuat AI untuk 
                menyaring lamaran kerja. AI ini dilatih 
                menggunakan data karyawan lama yang mayoritas 
                laki-laki. Akibatnya, AI "belajar" bahwa kandidat 
                laki-laki lebih cocok untuk posisi tersebut. Ketika 
                ada pelamar perempuan dengan kualifikasi yang 
                sama, AI cenderung memberi nilai lebih rendah, 
                hanya karena polanya tidak cocok dengan data 
                yang dipelajari. 
            </p>
        </div>
        <div class="box-teks">
            <h4>Contoh 2 – Pengenalan Wajah</h4>
            <p>
                AI pengenalan wajah dilatih dengan ribuan foto 
                wajah. Jika sebagian besar foto dalam dataset 
                berasal dari orang berkulit terang, AI akan lebih 
                mudah mengenali wajah berkulit terang dan lebih 
                sering salah mengenali wajah berkulit gelap. 
                Padahal orangnya nyata, hanya saja datanya tidak 
                mewakili semua kelompok secara seimbang.             
            </p>
        </div>
    </div>
    <p class="style-materi">
        Bias dalam kecerdasan buatan dapat terjadi ketika data yang digunakan tidak mewakili 
        kondisi yang sebenarnya, sehingga menghasilkan keputusan yang tidak adil atau kurang akurat. 
        Oleh karena itu, diperlukan upaya untuk mengurangi bias agar sistem kecerdasan buatan dapat 
        bekerja secara lebih objektif dan dapat dipercaya. Berikut beberapa cara yang dapat dilakukan 
        untuk mengurangi bias dalam pengembangan dan penggunaan kecerdasan buatan: 
    </p>
    <br>
    <h6 class="judul-tabel">
    Tabel 2. Mengurangi Bias dalam Penggunaan Kecerdasan Buatan
    </h6>

    <table class="tabel-ai">
        <thead>
            <tr>
                <th>Cara</th>
                <th>Penjelasan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Gunakan data yang beragam</td>
                <td>Pastikan dataset mewakili semua kelompok, bukan hanya satu kelompok saja </td>
            </tr>
            <tr>
                <td>Periksa data sebelum digunakan</td>
                <td>Cek apakah ada ketidakseimbangan jumlah data antar kelompok</td>
            </tr>
            <tr>
                <td>Libatkan manusia dalam keputus</td>
                <td>Jangan serahkan semua keputusan penting ke AI tanpa pengawasan manusia</td>
            </tr>  
            <tr>
                <td>Buat AI yang transparan</td>
                <td>AI harus bisa "menjelaskan" mengapa ia mengambil keputusan tertentu</td>
            </tr>
        </tbody>
    </table>
</div>
<div class="bottom-bar">
    <a href="{{ route('materi.data3') }}" class="btn-next">
        Materi Selanjutnya
        <i class="fa-solid fa-arrow-right"></i>
    </a>
</div>
@endsection

@push('scripts')
<script>
const MATERI_KEY = "data.bias"; 

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