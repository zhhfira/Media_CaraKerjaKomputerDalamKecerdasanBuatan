@extends('layouts.siswa')

@section('title', 'Machine Learning: Bagaimana Machine Learning Belajar Dari Kesalahan?')

@section('topbar', 'Proses Pembelajaran Mesin dalam Sistem Komputer')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Alata&family=Itim&family=Kumbh+Sans:wght,YOPQ@100..900,300&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

<style>
/* ===== GLOBAL TEXT ===== */
.dtv-panelCard {
    font-size: 13px;
    line-height: 1.5;
    padding: 14px;
}

/* ===== TITLE ===== */
.dtv-title {
    font-size: 16px;
    font-weight: 600;
    text-align: center;
}

.dtv-sub {
    font-size: 12px;
    color: #aaa;
    margin-top: 2px;
}

/* ===== LABEL ===== */
.dtv-label {
    font-size: 11px;
    color: #888;
    margin-bottom: 8px;
}

/* ===== PARAGRAPH ===== */
.dtv-panelCard p {
    font-size: 13px;
    margin-bottom: 6px;
}

/* ===== LIST ===== */
.dtv-panelCard ul,
.dtv-panelCard ol {
    padding-left: 18px;
    margin: 6px 0;
}

.dtv-panelCard li {
    font-size: 12.5px;
    margin-bottom: 4px;
}

/* ===== INFO BOX ===== */
.dtv-info {
    background: rgba(255,255,255,0.05);
    padding: 8px 10px;
    border-radius: 8px;
    margin: 8px 0;
    font-size: 12px;
    border-left: 3px solid #0d9488;
}
.babak {
    background: rgba(37, 99, 235, 0.08);
    padding: 8px 12px;
    border-radius: 8px;
    margin: 8px 0;
    border-left: 3px solid #2563eb;
}

/* judul */
.babak h4 {
    font-size: 18px;
    margin: 0;
    font-weight: 600;
    color: #000000;
}

/* deskripsi */
.babak p {
    font-size: 14px;
    margin: 2px 0 0 0;
    color: #242425;
}

/* ===== TABLE ===== */
.ml-table {
    width: 100%;
    border-collapse: collapse;
    margin: 10px 0;
    font-size: 12px;
}

/* paksa semua cell punya border */
.ml-table th,
.ml-table td {
    border: 1px solid #475569 !important;
    padding: 8px;
}

/* header biar beda */
.ml-table th {
    background: #1e293b;
    color: #e2e8f0;
    text-align: center;
}

/* zebra biar enak dibaca */
.ml-table tr:nth-child(even) {
    background: rgba(255,255,255,0.03);
}

.ml-note {
    background: rgba(59, 130, 246, 0.08);
    border-left: 4px solid #3b82f6;
    padding: 10px 12px;
    border-radius: 8px;
    margin: 10px 0;
}

.ml-note-title {
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 6px;
    color: #000000;
}

.ml-note ul {
    margin: 0;
    padding-left: 18px;
}

.ml-note li {
    font-size: 12.5px;
    margin-bottom: 4px;
    color: #000000;
}

/* ===== STATUS ===== */
.good { color: #4ade80; font-weight: 600; }
.bad { color: #ff6b6b; font-weight: 600; }

/* ===== BUTTON ===== */
.dtv-btn {
    padding: 6px 12px;
    font-size: 12px;
    border-radius: 6px;
    transition: 0.2s;
}

.dtv-btn:hover {
    transform: translateY(-1px);
    opacity: 0.9;
}

/* ===== ACTIONS ===== */
.dtv-actions {
    margin-top: 8px;
}

/* ===== SPACING FIX ===== */
.activity-frame {
    padding: 16px;
}

.dtv-main {
    gap: 10px;
}

.dtv-head {
    margin-bottom: 10px;
}

#error {
    font-size: 20px;
    font-weight: bold;
    color: #FFA239;
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
    margin-bottom: 5px;
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
    <h3 class="content-title">2. Proses Perbaikan Kesalahan dalam <i>Machine Learning</i></h3>
    <p class="style-materi">
        Proses pembelajaran pada machine learning dapat dianalogikan seperti seseorang yang belajar mengendarai sepeda. Pada awalnya, kesalahan sering terjadi, kemudian dilakukan perbaikan dan percobaan kembali hingga kemampuan tersebut dikuasai dengan baik. Komputer dalam machine learning juga belajar melalui proses serupa, yaitu mencoba menyelesaikan tugas, menghasilkan kesalahan, lalu memperbaiki hasilnya berdasarkan kesalahan tersebut. Melalui proses ini, sistem kecerdasan buatan dapat meningkatkan kemampuan dan akurasinya dari waktu ke waktu.
    </p>
    <p class="style-materi">
        Ketika model machine learning sedang dilatih, ia akan mencoba menebak jawaban dari 
        data latih. Tebakan pertama hampir selalu salah atau kurang tepat. Selisih antara jawaban yang 
        ditebak komputer dengan jawaban yang sebenarnya disebut <b>training error atau kesalahan 
        pelatihan</b>. Semakin kecil training error, semakin baik model memahami data yang dipelajarinya. 
    </p>
    
    <div class="border-blue">
    Cara Machine Learning Memperbaiki Kesalahan Prediksi</div>

    <p class="style-materi">
        Proses perbaikan ini terjadi melalui iterasi, yaitu pengulangan proses belajar berkali-kali. Setiap putaran, komputer:
        <br>
        1. Mencoba menebak jawaban dari data latih <br>
        2. Mengukur seberapa salah tebakannya <i>(training error)</i> <br>
        3. Menyesuaikan aturan internalnya agar tebakan berikutnya lebih tepat <br>
        4. Mengulangi proses ini ratusan hingga ribuan kali
    </p>
    <p style="font-size: 13px; line-height: 1.9;">
        <b>Bayangkan seperti ini:</b> Komputer dalam machine learning bekerja seperti siswa yang sedang berlatih mengerjakan soal. Setelah menjawab soal, hasil jawaban akan dibandingkan dengan kunci jawaban yang benar. Jika terdapat kesalahan, komputer akan mempelajari bagian yang salah tersebut, kemudian mencoba kembali pada data atau soal serupa. Proses ini dilakukan berulang kali hingga hasil prediksi menjadi semakin akurat.
    </p>
    <br>
    <h6 class="judul-tabel">
    Tabel 3. Simulasi Proses Belajar Kecerdasan Buatan </h6>
    <table class="tabel-ai">
    <thead>
        <tr>
            <th>Percobaan</th>
            <th>Nilai Siswa</th>
            <th>Tebakan AI</th>
            <th>Jawaban Sebenarnya</th>
            <th>Error</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Ke-1</td>
            <td>75</td>
            <td>Tidak Lulus</td>
            <td>Lulus</td>
            <td>❌ Salah</td>
        </tr>
        <tr>
            <td>Ke-2</td>
            <td>75</td>
            <td>Tidak Lulus</td>
            <td>Lulus</td>
            <td>❌ Masih salah</td>
        </tr>
        <tr>
            <td>Ke-3</td>
            <td>75</td>
            <td>Lulus</td>
            <td>Lulus</td>
            <td>✅ Benar</td>
        </tr>
    </tbody>
</table>
    <p class="style-materi">
    Dari percobaan ke-1 ke ke-3, AI menyesuaikan batas ambang kelulusannya berdasarkan kesalahan 
    sebelumnya. Inilah yang disebut <b>iterasi perbaikan model</b>. Kecerdasan buatan tidak belajar 
    selamanya. Proses pelatihan berhenti ketika salah satu kondisi ini terpenuhi: 
    <br>
    • <i>Training error</i> sudah sangat kecil, artinya model sudah cukup akurat. <br>
    • Jumlah iterasi sudah mencapai batas yang ditentukan. <br>
    • Performa tidak membaik lagi meskipun iterasi terus dilanjutkan.</p>

    <section class="activity-frame">
    <div class="dtv-head"> 
        <div> 
            <h3 class="dtv-title">Aktivitas Interaktif: Latih AI Dari Kesalahan 🤖</h3> 
        </div> 
    </div>

    <div class="dtv-main" style="grid-template-columns: 1fr;"> 
        <div class="dtv-panelCard"> 
            <div class="dtv-label">Simulasi Machine Learning</div> 
            <p>
                <strong style="font-size: 14px">Pernahkah kamu belajar dari kesalahan?</strong><br>
                Misalnya saat mengerjakan soal, kamu salah, lalu memperbaiki, lalu mencoba lagi? Komputer dalam <em>machine learning</em> belajar dengan cara yang sama.
            </p>
            <p>Pada aktivitas ini, kamu akan berperan sebagai <strong>pelatih AI</strong>.</p>
            <ul>
                <li>Melihat hasil tebakan AI</li>
                <li>Memperhatikan tingkat kesalahan (error)</li>
                <li>Memberi kesempatan AI untuk belajar lagi</li>
            </ul>
            <div class="dtv-info">
                👉 Setiap klik <strong>"Latih Lagi"</strong>, AI akan memperbaiki dirinya.
            </div>
            <p><strong style="font-size: 16px">🎯 Tujuan:</strong> membantu AI sampai error sangat kecil.</p>
            <div class="dtv-info">
                <strong style="font-size: 16px">📋 Petunjuk:</strong>
                <ol>
                    <li>Perhatikan nilai Error (%)</li>
                    <li>Klik "Latih Lagi"</li>
                    <li>Amati perubahan</li>
                    <li>Ulangi sampai error kecil</li>
                    <li>Klik "Selesai"</li>
                </ol>
            </div>
            <div class="dtv-info">
                📌 <strong style="font-size: 16px">Aturan:</strong> Lulus jika nilai ≥ 75
            </div>
            <div class="babak">
            <h4 id="title">Babak 1</h4>
            <p id="desc">AI baru mulai belajar...</p>
            </div>

            <p><strong style="font-size: 16px">Error: <span id="error">78%</span></strong></p>
            <table id="table" class="ml-table"></table>
            <div class="dtv-actions">
                <button class="dtv-btn" onclick="latih()">🔄 Latih Lagi</button>
                <button class="dtv-btn" onclick="selesai()">✅ Selesai</button>
                <button class="dtv-btn ghost" onclick="resetSimulasi()">🔁 Reset</button>
            </div>
        </div>
    </div>
    <div class="ml-note">
    <div class="ml-note-title">💡 Ingat:</div>
    <ul>
        <li>AI tidak langsung pintar</li>
        <li>AI belajar melalui pengulangan (iterasi)</li>
        <li>Kesalahan adalah bagian penting dari proses belajar</li>
        <li>Nilai error pada iterasi terakhir tidak selalu menjadi 0% karena dalam proses machine learning, AI masih dapat memiliki sedikit kesalahan dalam melakukan prediksi. Hal ini menunjukkan bahwa AI belajar secara bemelalui proses pelatihan berulang (iterasi).</li>
    </ul>
    </div>
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
let babak = 0;

const data = [
{
error: 78,
desc: "AI masih banyak salah",
rows: [
["82","Tidak Lulus","Lulus"],
["55","Lulus","Tidak Lulus"],
["75","Tidak Lulus","Lulus"],
["91","Lulus","Lulus"],
["48","Lulus","Tidak Lulus"]
]
},
{
error: 38,
desc: "AI mulai belajar",
rows: [
["82","Lulus","Lulus"],
["55","Tidak Lulus","Tidak Lulus"],
["75","Tidak Lulus","Lulus"],
["91","Lulus","Lulus"],
["48","Lulus","Tidak Lulus"]
]
},
{
error: 8,
desc: "AI hampir sempurna!",
rows: [
["82","Lulus","Lulus"],
["55","Tidak Lulus","Tidak Lulus"],
["75","Lulus","Lulus"],
["91","Lulus","Lulus"],
["48","Tidak Lulus","Tidak Lulus"]
]
}
];

function render() {
let d = data[babak];

document.getElementById("title").innerText = "Babak " + (babak+1);
document.getElementById("desc").innerText = d.desc;
document.getElementById("error").innerText = d.error + "%";

let table = document.getElementById("table");
table.innerHTML = `
<tr>
<th>Nilai</th>
<th>Tebakan</th>
<th>Benar</th>
<th>Status</th>
</tr>
`;

d.rows.forEach(r => {
let status = (r[1] === r[2]) 
  ? '<span class="good">✔ Benar</span>' 
  : '<span class="bad">✖ Salah</span>';

table.innerHTML += `
<tr>
<td>${r[0]}</td>
<td>${r[1]}</td>
<td>${r[2]}</td>
<td>${status}</td>
</tr>
`;
});
}

function latih() {
if (babak < data.length - 1) {
babak++;
render();
}
}

function selesai() {
alert("🎉 AI sudah belajar dengan baik!");
}

function resetSimulasi() {
babak = 0;
render();
}

render();
</script>
<script>
const MATERI_KEY = "ml.belajar"; 

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