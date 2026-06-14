@extends('layouts.siswa')

@section('title', 'Data: Pentingnya Data')

@section('topbar', 'Peran Data dalam Sistem Komputer')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Alata&family=Itim&family=Kumbh+Sans:wght,YOPQ@100..900,300&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

<style>
    .title{
      text-align:center;
      font-weight: 800;
      padding: 10px 14px;
      border-radius: 12px;
      background: linear-gradient(90deg, #006A67, #8eafae);
      display: inline-block;
      margin: 0 auto 10px;
      color: whitesmoke
    }

    .subtitle{
      margin: 6px 0 16px;
      color: var(--muted);
      line-height: 1.6;
      text-align: center;
    }

    .btn-row{
      display:flex;
      gap: 12px;
      justify-content:center;
      flex-wrap: wrap;
      margin: 12px 0 18px;
    }

    .pill-btn{
    border: none;
    cursor: pointer;
    border-radius: 999px;
    padding: 10px 16px;
    font-weight: 800;

    background: #18c7c1ee;
    color: #ECFEFF;

    box-shadow: 0 8px 16px rgba(0,106,103,0.35);
    transition: transform .12s ease, filter .12s ease;

    display:flex;
    align-items:center;
    gap: 10px;
    }

    .pill-btn:hover{
    transform: translateY(-1px);
    filter: brightness(1.05);
    }

    .pill-btn:active{
    transform: translateY(0);
    }

    .pill-btn.secondary{
    background: #9FE4D6;
    color: #064E4B;
    box-shadow: 0 8px 16px rgba(159,228,214,0.6);
    }

    .hint{
      text-align:center;
      color: var(--muted);
      font-size: 12px;
      margin-top: -6px;
    }

    .panel{
      display:none;
      margin-top: 14px;
      border: 1px solid var(--line);
      border-radius: 14px;
      padding: 14px;
      background: #fff;
      animation: fadeIn .18s ease;
    }
    .panel.active{ display:block; }

    @keyframes fadeIn{
      from{ opacity:0; transform: translateY(4px); }
      to{ opacity:1; transform: translateY(0); }
    }

    .panel h3{
      margin: 2px 0 10px;
      font-size: 14px;
    }

    .badge{
      display:inline-block;
      font-size: 12px;
      font-weight: 800;
      padding: 6px 10px;
      border-radius: 999px;
      margin-left: 8px;
      vertical-align: middle;
    }

    .badge.ok{
        background: #e6f4ea;
        color: #1b5e20;
        border: 1px solid #1b5e20;
    }

    .badge.bad{
        background: #fdecea;
        color: #8b1e1e;
        border: 1px solid #8b1e1e;
    }

    .content-card,
    .activity-frame {
    overflow-x: hidden;
    box-sizing: border-box;
    max-width: 100%;
    }

    /* Tabel responsif */
    table {
    border-collapse: collapse;
    margin-top: 10px;
    overflow: hidden;
    border-radius: 12px;
    width: 100%;
    table-layout: fixed; 
    }

    th, td {
    border: 1px solid var(--line);
    padding: 10px;
    font-size: 12px;
    text-align: center;
    word-break: break-word; 
    }

    th{
      background: #f8fafc;
      font-weight: 800;
    }
    .note{
      margin-top: 12px;
      padding: 12px 12px;
      border-left: 5px solid var(--accent);
      background: hsl(210, 47%, 85%);
      border-radius: 10px;
      color: #000000;
      line-height: 1.65;
      font-size: 12px;
    }

    .actions{
      display:flex;
      justify-content:flex-end;
      margin-top: 10px;
    }
    .link-btn{
      border: 1px solid var(--line);
      background:#fff;
      padding: 8px 12px;
      border-radius: 10px;
      cursor:pointer;
      font-weight:700;
    }

    .konten-ai {
        display: flex;
        gap: 15px;
        align-items: flex-start;
        margin: 20px 0;
    }

    .gambar-ai {
        flex: 0 1 270px;
    }

    .gambar-ai img {
        width: 100%;
        height: auto;
        border-radius: 12px;
    }
    .caption {
        font-size: 10px;
        text-align: center;
        margin-top: 6px;
        font-style: italic;
        color: #747474;
    }
    .teks-ai {
        flex: 1;
        text-align: justify;
        font-size: 13px;
        line-height: 1.9;
    }

    .teks-ai p {
        text-indent: 40px;
    }
    .chart-grid{
    display: grid;
    grid-template-columns: 1.2fr .8fr;
    gap: 14px;
    }
    .table-wrapper{
    width: 100%;
    overflow-x: auto;
    }

    @media (max-width:600px){

    .chart-grid{
        grid-template-columns: 1fr; 
    }

    .konten-ai{
        flex-direction: column;
    }

    .gambar-ai{
        flex: 1;
        flex: 0 1 200px;
    }

    .btn-row{
        flex-wrap: wrap;
        justify-content: center;
    }

    .pill-btn{
        font-size: 12px;
        padding: 8px 10px;
        white-space: normal; /* ⬅ penting */
    }

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
    <h3 class="content-title">2. Pentingnya Data</h3>
    <p class="style-materi">
        Data merupakan fondasi utama dalam kecerdasan buatan. Tanpa data yang cukup dan berkualitas, model kecerdasan buatan tidak dapat belajar dan
        menghasilkan prediksi yang akurat. Jenis data yang digunakan dapat berupa angka, teks, gambar, suara, dan lainnya — tergantung pada masalah yang ingin diselesaikan oleh sistem kecerdasan buatan (Bintoro <i>et al.</i>, 2024).
    </p>

    <div class="konten-ai">
        <div class="gambar-ai">
            <img src="{{ asset('img/garbageout-in.png') }}" alt="Gambar 4 Garbage In, Garbage Out">
            <p class="caption">Gambar 4 Ilustrasi prinsip Garbage In, Garbage Out, yaitu kualitas hasil kecerdasan buatan sangat dipengaruhi oleh kualitas data yang digunakan.</p>
        </div>
        <div class="teks-ai">
            <p>Dalam dunia kecerdasan buatan, terdapat pepatah terkenal <b><i>"Garbage In, Garbage Out"</i></b>. Artinya, kualitas hasil yang dihasilkan kecerdasan buatan sangat bergantung pada kualitas data
            yang digunakan. Jika data yang masuk buruk—tidak akurat, tidak lengkap, bias, atau berantakan—maka hasil kecerdasan buatan pun akan keliru.
            Kualitas dan kuantitas data juga memengaruhi kinerja model <i>machine learning</i>, dan pengelolaannya sering menghadapi tantangan.
            <b>Pertama</b>, data yang tidak seimbang atau jumlahnya tidak memadai dapat membuat model mempelajari pola yang salah dan menjadi
            bias, sehingga prediksi terhadap kelas tertentu menjadi tidak akurat. <b>Kedua</b>, data yang kotor atau tidak lengkap, seperti yang
            mengandung <i>noise</i> atau nilai hilang, dapat menurunkan performa model. Meskipun pembersihan data penting, proses ini memakan waktu
            dan tidak selalu menyelesaikan semua masalah. <b>Ketiga</b>, penggunaan data yang tidak relevan dapat menambah noise dan menghambat model dalam mengenali pola yang benar, sehingga kualitas hasil menjadi kurang optimal.</p>
        </div>
    </div>

    <p class="style-materi">
        Permasalahan-permasalahan tersebut merupakan contoh nyata dari penerapan prinsip <i>Garbage In, Garbage Out</i> dalam pengembangan kecerdasan buatan. Ketika data yang digunakan tidak memenuhi standar kualitas, model akan belajar dari informasi yang keliru atau tidak representatif, sehingga hasil prediksi yang dihasilkan juga cenderung salah atau menyesatkan.
    </p>

    <section class="activity-frame" aria-label="Eksperimen Kualitas Data">
        <div style="text-align:center;">
            <div class="title">Eksperimen Kualitas Data</div>
        </div>

        <p class="subtitle">
            Bayangkan kamu sedang melatih kecerdasan buatan untuk mengenali cuaca.
            Coba lihat apa yang terjadi jika kamu menggunakan data yang berbeda!
        </p>

        <div class="btn-row">
            <button id="btnLengkap" class="pill-btn" type="button">
                Gunakan Data yang Lengkap
            </button>
            <button id="btnTidakLengkap" class="pill-btn secondary" type="button">
                Gunakan Data Tidak Lengkap
            </button>
        </div>
        <div class="hint">Klik salah satu tombol untuk menampilkan tabel & penjelasan. <br>Perhatikan perbedaan antara data lengkap dan data tidak lengkap pada tabel berikut. Amati bagaimana kualitas data memengaruhi hasil pembelajaran kecerdasan buatan.</div>

        <!-- PANEL: Data Lengkap -->
        <div id="panelLengkap" class="panel" role="region" aria-live="polite">
            <h3>
                Data Lengkap (kecerdasan buatan mudah belajar)
                <span class="badge ok">Kualitas Bagus</span>
            </h3>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Hari</th>
                            <th>Suhu (°C)</th>
                            <th>Kelembapan (%)</th>
                            <th>Kecepatan Angin (km/jam)</th>
                            <th>Cuaca</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>Senin</td><td>30</td><td>85</td><td>10</td><td>Hujan</td></tr>
                        <tr><td>Selasa</td><td>32</td><td>70</td><td>8</td><td>Cerah</td></tr>
                        <tr><td>Rabu</td><td>28</td><td>90</td><td>12</td><td>Hujan</td></tr>
                        <tr><td>Kamis</td><td>34</td><td>60</td><td>9</td><td>Cerah</td></tr>
                        <tr><td>Jumat</td><td>31</td><td>80</td><td>10</td><td>Berawan</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="note">
                "Datanya lengkap dan konsisten, jadi kecerdasan buatan bisa belajar pola hubungan antara suhu,
                kelembapan, dan cuaca dengan akurat."
            </div>

            <div class="actions">
                <button class="link-btn" type="button" data-close="panelLengkap">Tutup</button>
            </div>
        </div>

        <!-- PANEL: Data Tidak Lengkap -->
        <div id="panelTidakLengkap" class="panel" role="region" aria-live="polite">
            <h3>
                Data Tidak Lengkap (kecerdasan buatan bingung belajar)
                <span class="badge bad">Kualitas Buruk</span>
            </h3>
            <div class="table-wrapper">

                <table>
                    <thead>
                        <tr>
                            <th>Hari</th>
                            <th>Suhu (°C)</th>
                            <th>Kelembapan (%)</th>
                            <th>Kecepatan Angin (km/jam)</th>
                            <th>Cuaca</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>Senin</td><td>?</td><td>85</td><td>10</td><td>Hujan</td></tr>
                        <tr><td>Selasa</td><td>32</td><td>-</td><td>8</td><td>?</td></tr>
                        <tr><td>Rabu</td><td>28</td><td>90</td><td>-</td><td>Hujan</td></tr>
                        <tr><td>Kamis</td><td>999</td><td>60</td><td>9</td><td>Cerah</td></tr>
                        <tr><td>Jumat</td><td>31</td><td>80</td><td>10</td><td>-</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="note">
                "Beberapa data hilang (ditandai simbol ?, -, dan kosong) dan ada kesalahan seperti
                suhu 999°C. Akibatnya, kecerdasan buatan kesulitan memahami pola dan hasil prediksinya bisa keliru."
            </div>

            <div class="actions">
                <button class="link-btn" type="button" data-close="panelTidakLengkap">Tutup</button>
            </div>
        </div>
    </section>

    <p class="style-materi">Untuk memahami pentingnya kelengkapan data dalam kecerdasan buatan, amati perbandingan grafik data lengkap dan grafik dengan sebagian data yang hilang <i>(missing data)</i>. Melalui kedua grafik tersebut, dapat terlihat bahwa pola lebih mudah dikenali ketika data lengkap, sedangkan data yang tidak lengkap membuat pola lebih sulit dikenali sehingga hasil prediksi menjadi kurang stabil. Aktivitas ini menunjukkan bahwa kualitas dan kelengkapan data sangat memengaruhi proses pembelajaran dan prediksi kecerdasan buatan.</p>

    <section class="activity-frame">
        <h3>Aktivitas Interaktif 📊</h3>
        <h3>Konsep Data: Lengkap vs Tidak Lengkap</h3>
        <p class="subtitle">
            Tujuan Aktivitas: Peserta didik memahami pengaruh kelengkapan data terhadap kemampuan kecerdasan buatan dalam mengenali pola dan menghasilkan prediksi.
        </p>
        <p style="font-weight:700; margin-bottom:6px;">
            📝 Langkah Aktivitas
        </p>

        <ol style="padding-left:18px; margin:0 0 14px; line-height:1.6;">
            <li>
                <b>Perhatikan grafik data</b><br>
                Grafik menampilkan contoh data yang digunakan komputer sebagai bahan belajar.
            </li>
            <li>
                <b>Geser slider "persentase data hilang"</b><br>
                Atur jumlah data yang hilang, misalnya 0%, 20%, 40%, atau 60%.
            </li>
            <li>
                <b>Amati perubahan hasil</b><br>
                Perhatikan perubahan bentuk grafik, jumlah data yang tersedia, dan perkiraan akurasi.
            </li>
            <li>
                <b>Baca penjelasan di bawah grafik</b><br>
                Penjelasan membantu memahami dampak data lengkap dan data tidak lengkap.
            </li>
        </ol>

        <div class="panel active">
            <div class="chart-grid">
                <!-- KIRI: GRAFIK -->
                <div class="card">
                    <div class="row" style="margin-bottom:10px;">
                        <span class="badge ok">📊 Visualisasi Data</span>
                        <span class="badge bad" id="missingPill">Missing: 0%</span>
                    </div>

                    <canvas id="dataChart" style="max-height:340px;"></canvas>

                    <div class="note" id="feedbackBox">
                        Atur persentase data hilang untuk melihat dampaknya.
                    </div>
                </div>

                <!-- KANAN: KONTROL -->
                <div class="card">
                    <div style="display:grid; gap:10px;">

                        <div>
                            <div class="row">
                                <label>Persentase data hilang</label>
                                <span class="badge ok"><span id="missingLabel">0</span>%</span>
                            </div>
                            <input id="missingRange" type="range" min="0" max="70" value="0">
                            <div class="hint">Coba: 0%, 20%, 40%, 60%</div>
                        </div>

                        <div class="row">
                            <input id="showMissingToggle" type="checkbox" checked>
                            <label style="font-weight:700;">Tampilkan data hilang sebagai kosong</label>
                        </div>

                        <div class="btn-row">
                            <button class="pill-btn" id="regenBtn">🔄 Data Baru</button>
                            <button class="pill-btn secondary" id="resetBtn">♻ Reset</button>
                        </div>
                        <div class="table-wrapper">

                            <table>
                                <tr>
                                    <th>Jumlah Data</th>
                                    <th>Data Tersedia</th>
                                </tr>
                                <tr>
                                    <td><span id="nLabel">40</span></td>
                                    <td><span id="availableLabel">40</span></td>
                                </tr>
                                <tr>
                                    <th>Akurasi (Simulasi)</th>
                                    <th>Prediksi Rata-rata</th>
                                </tr>
                                <tr>
                                    <td><span id="accLabel">100</span>%</td>
                                    <td><span id="predLabel">-</span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <p class="style-materi">Melalui simulasi ini, kamu dapat memahami bahwa komputer tidak benar-benar berpikir seperti manusia, melainkan belajar dari data yang tersedia. Ketika data yang digunakan masih lengkap, komputer memiliki cukup contoh untuk mengenali pola sehingga hasil prediksi yang dihasilkan cenderung lebih stabil. Sebaliknya, ketika sebagian data hilang, jumlah informasi yang dapat dipelajari komputer menjadi berkurang, pola semakin sulit dikenali, dan hasil prediksi menjadi kurang akurat serta tidak konsisten. Oleh karena itu, simulasi ini menunjukkan bahwa kualitas dan kelengkapan data sangat menentukan kemampuan komputer dalam menghasilkan keputusan, sesuai dengan prinsip <i>Garbage In, Garbage Out</i>, yaitu hasil yang buruk dapat muncul apabila data yang digunakan tidak lengkap atau tidak berkualitas.</p>
</div>

<div class="bottom-bar">
    <a href="{{ route('materi.data2_2') }}" class="btn-next">
        Materi Selanjutnya
        <i class="fa-solid fa-arrow-right"></i>
    </a>
</div>
@endsection

@push('scripts')
<script>
    const btnLengkap = document.getElementById('btnLengkap');
    const btnTidakLengkap = document.getElementById('btnTidakLengkap');

    const panelLengkap = document.getElementById('panelLengkap');
    const panelTidakLengkap = document.getElementById('panelTidakLengkap');

    function showPanel(which) {
        panelLengkap.classList.remove('active');
        panelTidakLengkap.classList.remove('active');

        if (which === 'lengkap') panelLengkap.classList.add('active');
        if (which === 'tidak') panelTidakLengkap.classList.add('active');

        const target = which === 'lengkap' ? panelLengkap : panelTidakLengkap;
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    btnLengkap.addEventListener('click', () => showPanel('lengkap'));
    btnTidakLengkap.addEventListener('click', () => showPanel('tidak'));

    document.addEventListener('click', (e) => {
        const closeId = e.target?.getAttribute?.('data-close');
        if (!closeId) return;
        document.getElementById(closeId)?.classList.remove('active');
    });
</script>
<script>
const MATERI_KEY = "data.penting";

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
const N = 40;

function rand(min, max){
    return Math.random() * (max - min) + min;
}

function clamp(n, a, b){
    return Math.max(a, Math.min(b, n));
}

function generateBaseData(){
    const arr = [];
    for (let i = 0; i < N; i++){
        const base = 72 + (i % 10) * 1.2;
        const noise = rand(-8, 8);
        arr.push(clamp(Math.round(base + noise), 0, 100));
    }
    return arr;
}

function applyMissing(data, missingPercent){
    const out = data.slice();
    const missingCount = Math.round((missingPercent / 100) * out.length);

    const idx = [...Array(out.length).keys()].sort(() => Math.random() - 0.5);
    for (let i = 0; i < missingCount; i++){
        out[idx[i]] = null;
    }
    return out;
}

function meanAvailable(arr){
    const available = arr.filter(v => v !== null);
    if (!available.length) return null;
    return available.reduce((a, b) => a + b, 0) / available.length;
}

function simulatedAccuracy(missingPercent, availableCount){
    let score = 100 - missingPercent * 0.9;

    if (availableCount < 10) score -= 15;
    if (availableCount < 5) score -= 25;

    score += rand(-2, 2);
    return clamp(Math.round(score), 0, 100);
}

function makeFeedback(missingPercent, availableCount){
    if (missingPercent === 0){
        return "✅ Data lengkap: komputer memiliki cukup banyak contoh data untuk belajar. " +
               "Pola dapat dikenali dengan lebih stabil sehingga hasil prediksi dan keputusan " +
               "yang dihasilkan menjadi lebih konsisten dan dapat dipercaya.";
    }

    if (availableCount === 0){
        return "❌ Semua data hilang: komputer tidak memiliki satu pun contoh untuk dipelajari. " +
               "Dalam kondisi ini, sistem tidak dapat mengenali pola maupun menghasilkan " +
               "prediksi yang masuk akal.";
    }

    if (missingPercent <= 20){
        return "👍 Sebagian kecil data hilang: komputer masih dapat belajar dari data yang tersedia. " +
               "Namun, karena informasi tidak sepenuhnya lengkap, hasil prediksi mulai " +
               "menjadi kurang stabil dibandingkan saat data lengkap.";
    }

    if (missingPercent <= 45){
        return "⚠️ Data hilang cukup banyak: jumlah contoh yang tersedia semakin berkurang. " +
               "Komputer mulai kesulitan mengenali pola dengan baik sehingga hasil prediksi " +
               "lebih mudah meleset dan tingkat kepercayaannya menurun.";
    }

    return "🚨 Data hilang sangat banyak: informasi yang tersedia tidak cukup untuk " +
           "mewakili kondisi sebenarnya. Keputusan atau prediksi yang dihasilkan " +
           "menjadi tidak dapat dipercaya. Pada tahap ini, data perlu diperbaiki terlebih dahulu, " +
           "misalnya dengan proses data cleaning atau imputasi.";
}

let baseData = generateBaseData();
let missingPercent = 0;
let showMissingAsGaps = true;

const chart = new Chart(document.getElementById("dataChart"), {
    type: "line",
    data: {
        labels: [...Array(N)].map((_, i) => `S${i + 1}`),
        datasets: [{
            label: "Nilai Data",
            data: baseData,
            tension: 0.25,
            borderWidth: 2,
            pointRadius: 4
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                min: 0,
                max: 100,
                title: {
                    display: true,
                    text: "Skor (0–100)"
                }
            },
            x: {
                title: {
                    display: true,
                    text: "Sampel data (contoh)"
                }
            }
        }
    }
});

function render(){
    const withMissing = applyMissing(baseData, missingPercent);
    const availableCount = withMissing.filter(v => v !== null).length;
    const pred = meanAvailable(withMissing);

    chart.data.datasets[0].data =
        showMissingAsGaps ? withMissing : withMissing.map(v => v ?? pred);

    chart.data.datasets[0].spanGaps = !showMissingAsGaps;
    chart.update();

    document.getElementById('missingLabel').textContent = missingPercent;
    document.getElementById('missingPill').textContent = `Missing: ${missingPercent}%`;
    document.getElementById('availableLabel').textContent = availableCount;
    document.getElementById('accLabel').textContent = simulatedAccuracy(missingPercent, availableCount);
    document.getElementById('predLabel').textContent = pred ? pred.toFixed(1) : "-";
    document.getElementById('feedbackBox').textContent = makeFeedback(missingPercent, availableCount);
}

document.getElementById('missingRange').oninput = (e) => {
    missingPercent = +e.target.value;
    render();
};

document.getElementById('showMissingToggle').onchange = (e) => {
    showMissingAsGaps = e.target.checked;
    render();
};

document.getElementById('regenBtn').onclick = () => {
    baseData = generateBaseData();
    render();
};

document.getElementById('resetBtn').onclick = () => {
    missingPercent = 0;
    document.getElementById('missingRange').value = 0;
    document.getElementById('showMissingToggle').checked = true;
    showMissingAsGaps = true;
    render();
};

render();
</script>
@endpush