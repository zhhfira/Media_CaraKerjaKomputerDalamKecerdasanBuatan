@extends('layouts.siswa')

@section('title', 'Algoritma dalam AI')
@section('topbar', 'Algoritma: Resep Rahasia Kecerdasan Buatan')

@push('styles')
<style>
/* ====== TABEL ====== */
.identify-table{ width:100%; border-collapse:collapse; margin-top:12px; background:#fff; }
.identify-table th, .identify-table td{ border:1px solid #555; padding:10px 12px; vertical-align:top; }
.identify-table th{ background:#f6f6f6; text-align:center; font-weight:700; }
.steps-cell{ width:46%; }
.bank{ display:grid; gap:10px; margin:2px 0; }
.drag-item{ border:1px solid #555; background:#fff; padding:8px 10px; cursor:grab; user-select:none; }
.drag-item:active{ cursor:grabbing; }
.step-row{ display:flex; align-items:center; gap:10px; margin:0 0 10px 0; }
.step-row:last-child{ margin-bottom:0; }
.step-num{ width:26px; font-weight:700; }
.drop-zone{ flex:1; min-height:36px; border:1px dashed #555; padding:6px; background:#fff; display:flex; align-items:center; }
.drop-zone.over{ background:#f6f6f6; }
.btn-row{ display:flex; gap:10px; margin-top:12px; flex-wrap:wrap; }
.btn{ border:1px solid #555; background:#f6f6f6; padding:7px 14px; font-weight:700; cursor:pointer; font-size:12px; }
.btn:hover{ background:#eaeaea; }
.hasil{ margin-top:10px; border:1px solid #555; padding:10px 12px; display:none; background:#fff; border-radius:10px; }
.hasil.ok{ display:block; color:#1b5e20; background:#e6f4ea; border-color:#1b5e20; }
.hasil.bad{ display:block; color:#8b1e1e; background:#fdecea; border-color:#8b1e1e; }
.feedback-penutup{ margin-top:12px; padding:12px 14px; border:1px solid #555; border-radius:10px; background:#f6f6f6; font-size:12px; line-height:1.7; text-align:justify; display:none; }

/* ====== MAP GAME ====== */
.map{ max-width:1400px; margin:auto; position:relative; z-index:1; }
.header{ text-align:center; margin-bottom:40px; }
.header h1{ font-size:3em; font-weight:900; background:linear-gradient(135deg,#667eea,#f093fb); -webkit-background-clip:text; -webkit-text-fill-color:transparent; letter-spacing:3px; }
.header p{ color:#a5b4fc; letter-spacing:2px; text-transform:uppercase; }
.game-board{ background:rgba(15,23,42,.85); border-radius:30px; padding:40px; margin-bottom:20px; border:2px solid rgba(99,102,241,.3); box-shadow:0 0 50px rgba(99,102,241,.3); }
.map-map{ position:relative; height:520px; margin-top:20px; background:radial-gradient(circle at 20% 30%,rgba(99,102,241,.22),transparent 45%),radial-gradient(circle at 80% 70%,rgba(168,85,247,.22),transparent 45%),#020617; border:2px solid rgba(99,102,241,.5); border-radius:24px; overflow:hidden; }
.map-point{ position:absolute; width:70px; height:70px; border-radius:50%; display:flex; align-items:center; justify-content:center; background:rgba(15,23,42,.9); border:3px solid #6366f1; box-shadow:0 0 20px rgba(99,102,241,.6); transition:.4s; cursor:pointer; z-index:2; }
.map-point:hover{ transform:scale(1.15); }
.map-point.locked{ opacity:.4; cursor:not-allowed; border-color:#475569; }
.map-point.active{ border-color:#fbbf24; box-shadow:0 0 60px rgba(251,191,36,1),inset 0 0 18px rgba(251,191,36,.6); }
.map-point.completed{ border-color:#22c55e; box-shadow:0 0 40px rgba(34,197,94,1),inset 0 0 16px rgba(34,197,94,.6); }
@keyframes pulsePoint{ 50%{ transform:scale(1.15); } }
.point-number{ font-size:28px; font-weight:900; color:white; }
.map-title.game-style{ text-align:center; margin:30px 0; }
.map-title.game-style h2{ font-size:34px; letter-spacing:3px; background:linear-gradient(90deg,#a5b4fc,#c084fc); -webkit-background-clip:text; -webkit-text-fill-color:transparent; }
.map-subtitle{ margin-top:6px; font-size:13px; letter-spacing:1px; text-transform:uppercase; color:#94a3b8; }
.instruction{ margin-top:20px; background:rgba(15,23,42,.7); padding:20px 24px; border-radius:16px; border:1px solid rgba(99,102,241,.3); color:#cbd5e1; }
.instruction h3{ color:#a5b4fc; margin-bottom:10px; letter-spacing:1px; }
.instruction p{ margin-bottom:12px; line-height:1.6; }
.instruction ol{ list-style-position:inside; padding-left:0; margin:16px auto 0; max-width:800px; text-align:center; }
.instruction li{ margin-bottom:8px; line-height:1.6; }
.path{ position:absolute; height:5px; background:repeating-linear-gradient(to right,#a5b4fc 0 12px,transparent 12px 22px); transform-origin:left center; animation:pathMove 1.4s linear infinite; filter:drop-shadow(0 0 10px rgba(165,180,252,1)); z-index:1; pointer-events:none; }
@keyframes pathMove{ to{ background-position:-20px 0; } }
.bubble {
    position: fixed;
    z-index: 999;
    background: linear-gradient(180deg, #0f172a, #020617);
    border-radius: 18px;
    padding: 22px 24px;
    animation: bubbleIn .25s ease-out;
    border: 1px solid rgba(99, 102, 241, .35);
    box-shadow: 0 20px 40px rgba(0,0,0,.45), inset 0 0 0 1px rgba(255,255,255,.03);
    color: #e5e7eb;

    /* Desktop: pojok kanan bawah */
    right: 32px;
    bottom: 32px;
    width: 420px;
    max-height: 70vh;
    overflow-y: auto;
}
@keyframes bubbleIn{ from{ opacity:0; transform:translateY(10px) scale(.98); } to{ opacity:1; transform:none; } }
.bubble p{ font-size:13.5px; line-height:1.75; color:#d1d5db; margin-bottom:14px; }
.bubble-title{ font-size:16px; font-weight:700; color:#c7d2fe; margin-bottom:10px; line-height:1.4; }
.bubble-footer{ display:flex; justify-content:space-between; gap:12px; margin-top:18px; }
.bubble-footer .button{ padding:10px 18px; font-size:13px; border-radius:10px; }
.bubble.show{ display:block; }
.bubble-sub{ color:#94a3b8; margin-bottom:15px; }
.button{ background:linear-gradient(135deg,#6366f1,#4f46e5); border:none; color:white; padding:12px 24px; border-radius:10px; cursor:pointer; font-weight:600; }
.button.alt{ background:#1e293b; color:#e5e7eb; }
.progress{ margin-top:30px; height:36px; border-radius:18px; background:rgba(30,41,59,.6); overflow:hidden; border:2px solid rgba(99,102,241,.3); }
.progress-fill{ height:100%; width:0%; background:linear-gradient(90deg,#6366f1,#a855f7); display:flex; align-items:center; justify-content:center; transition:.8s; }
.done{ display:none; margin-top:30px; padding:40px; text-align:center; background:linear-gradient(135deg,#064e3b,#052e16); border-radius:20px; border:2px solid #22c55e; color:white; }
.done.show{ display:block; }

/* ====== SIMULASI ALGORITMA ====== */
.algoritma-sim{ margin:20px 0; padding:20px 18px; background:#f9fafb; border:1.5px solid #006A67; border-radius:16px; }
.algoritma-sim h2{ font-size:18px; margin-bottom:6px; }
.algoritma-sim p{ font-size:13.5px; line-height:1.65; margin:4px 0; }
.algoritma-progress{ height:8px; background:#e5e7eb; border-radius:999px; overflow:hidden; margin:10px 0 14px; }
.algoritma-progress div{ height:100%; width:0%; background:#006A67; transition:width .2s ease; }
.algoritma-tabs{ display:flex; gap:8px; margin-bottom:14px; flex-wrap:wrap; }
.algoritma-tab{ border:1px solid #d1d5db; background:#fff; padding:6px 12px; border-radius:999px; font-size:12.5px; font-weight:700; cursor:pointer; }
.algoritma-tab.active{ background:rgba(0,106,103,.12); border-color:rgba(0,106,103,.35); color:#064e4b; }
.algoritma-grid{ display:grid; grid-template-columns:1fr 1fr; gap:16px; }

@media(max-width:900px){ .algoritma-grid{ grid-template-columns:1fr; } }
.algoritma-card{ background:#fff; border:1px solid #e5e7eb; border-radius:14px; padding:14px; }
.algoritma-step{ font-size:14px; font-weight:800; margin-bottom:8px; }
.algoritma-box{ border:1px solid #e5e7eb; background:#f8fafc; border-radius:12px; padding:10px 12px; margin-top:8px; font-size:13px; }
.algoritma-trace{ background:#fff; border:1px dashed #cbd5e1; border-radius:10px; padding:10px 12px; font-family:monospace; font-size:12px; min-height:70px; }
.algoritma-controls{ display:flex; gap:8px; margin-top:12px; flex-wrap:wrap; }
.algoritma-controls button{ padding:7px 14px; font-size:12.5px; border-radius:999px; border:none; cursor:pointer; font-weight:700; }
.algoritma-controls .prev{ background:#0f172a; color:#fff; }
.algoritma-controls .next{ background:#006A67; color:#fff; }
@media (max-width: 600px) {
    .bubble {
        right: auto;
        bottom: auto;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 88vw;
        max-height: 75vh;
        padding: 16px;
    }
}
</style>
@endpush

@section('content')
<div class="content-card">

    <h3>2. Bagaimana Algoritma Bekerja dalam Kecerdasan Buatan?</h3>

    <p class="style-materi">
        Setelah memahami pengertian dan pentingnya algoritma, kini saatnya kamu mempelajari
        bagaimana algoritma bekerja dalam sistem kecerdasan buatan (AI). Pernahkah kamu
        bertanya-tanya, bagaimana komputer bisa menebak bahwa gambar yang kamu tunjuk
        adalah kucing atau anjing?
    </p>

    <p class="style-materi">
        Ternyata, komputer tidak memiliki "insting", tetapi mengikuti serangkaian langkah sistematis yang disebut <b>algoritma</b>. Dalam dunia kecerdasan buatan, komputer tidak berpikir seperti manusia, melainkan mengikuti serangkaian langkah logis dan terurut untuk menyelesaikan suatu masalah.
        Setiap langkah diatur secara berurutan agar komputer bisa mengambil keputusan berdasarkan logika, bukan perasaan. Karena itu, bisa dikatakan bahwa algoritma adalah "otak logis" dari kecerdasan buatan, yang membuat komputer mampu melakukan tugas-tugas cerdas seperti mengenali wajah, menerjemahkan bahasa, hingga merekomendasikan video di YouTube.
    </p>

    <p class="style-materi">
        Agar lebih mudah dibayangkan, cara kerja algoritma dalam kecerdasan buatan biasanya melewati tahapan berikut:
    </p>

    <!-- LIST TAHAPAN -->
    <div class="map">
        <div class="header">
            <div class="map-title game-style">
                <h2>🚀 ALGORITHM EXPLORER</h2>
                <div class="map-subtitle">Misi: Memahami Tahapan Algoritma Kecerdasan Buatan</div>
            </div>
            <div class="instruction">
                <h3>Instruksi Penggunaan</h3>
                <p>Aktivitas ini membantumu memahami cara kerja algoritma dalam kecerdasan buatan.</p>
                <ol>
                    <li>Klik setiap titik pada peta untuk mempelajari tahapan algoritma secara berurutan.</li>
                    <li>Setiap tahap mewakili proses penting dalam pengambilan keputusan oleh komputer.</li>
                    <li>Selesaikan seluruh tahapan untuk melihat bagaimana algoritma bekerja sebagai satu kesatuan.</li>
                </ol>
            </div>
        </div>

        <div class="game-board">
            <div class="map-map" id="map"></div>
            <div class="progress">
                <div class="progress-fill" id="bar">0%</div>
            </div>
            <div class="done" id="done">
                <h2>Tahap Selesai!</h2>
                <p>Kamu telah mempelajari bahwa algoritma adalah urutan langkah logis yang membuat komputer mampu mengambil keputusan. Konsep ini menjadi fondasi dari berbagai teknologi kecerdasan buatan yang kita gunakan sehari-hari.</p>
            </div>
        </div>
    </div>

    <p class="style-materi">
        Setelah memahami empat tahap cara kerja algoritma dalam kecerdasan buatan, berikut disajikan contoh penerapan sederhana untuk memperjelas bagaimana tahapan input, proses, keputusan, dan output saling berhubungan dalam sebuah sistem komputer.
    </p>

    <section class="algoritma-sim">
        <h2>Simulasi 4 Tahap Algoritma dalam Kecerdasan Buatan</h2>
        <p>Amati bagaimana komputer bekerja melalui urutan: <b>Input → Proses → Keputusan → Output</b>.</p>

        <div class="algoritma-progress">
            <div id="algProg"></div>
        </div>

        <div class="algoritma-tabs">
            <div class="algoritma-tab active" data-step="1">Input</div>
            <div class="algoritma-tab" data-step="2">Proses</div>
            <div class="algoritma-tab" data-step="3">Keputusan</div>
            <div class="algoritma-tab" data-step="4">Output</div>
        </div>

        <div class="algoritma-grid">
            <div class="algoritma-card">
                <div class="algoritma-step" id="algTitle">Tahap 1 — Menerima Input</div>
                <div id="algStage"></div>
                <div class="algoritma-controls">
                    <button class="prev" id="algPrev">← Back</button>
                    <button class="next" id="algNext">Next →</button>
                    <button id="algReset" class="btn-reset">Ulangi Simulasi</button>
                </div>
            </div>
            <div class="algoritma-card">
                <div class="algoritma-step">Yang Terjadi di Dalam Komputer</div>
                <div class="algoritma-box"><b>Input:</b><div id="algInput">-</div></div>
                <div class="algoritma-box"><b>Langkah:</b><div class="algoritma-trace" id="algTrace">Klik Next untuk mulai.</div></div>
                <div class="algoritma-box"><b>Output:</b><div id="algOutput">-</div></div>
            </div>
        </div>
    </section>

    <p class="style-materi">Berdasarkan simulasi yang dilakukan, komputer bekerja melalui empat tahap, yaitu <b>input, proses, keputusan, dan output</b>. Pada tahap input, pengguna memasukkan nilai siswa sebagai data awal. Data tersebut kemudian diproses sesuai dengan aturan yang telah diprogram, misalnya menentukan apakah nilai memenuhi kriteria kelulusan. Selanjutnya, komputer mengambil keputusan berdasarkan aturan tersebut dan menampilkan hasilnya sebagai output. Dari simulasi ini dapat dipahami bahwa komputer tidak berpikir seperti manusia, melainkan menjalankan instruksi secara sistematis sesuai logika yang telah dibuat.</p>

    <!-- AKTIVITAS INTERAKTIF -->
    <section class="activity-frame">
        <div class="activity-label">Aktivitas Interaktif: <b>"Menyusun Langkah Logis"</b></div>

        <p>Dalam kecerdasan buatan (AI), komputer hanya dapat "berpikir" jika mengikuti langkah-langkah logis yang disebut algoritma.</p>
        <p>Pada aktivitas ini, kamu akan berperan sebagai otak komputer dan mencoba menyusun langkah-langkah tersebut secara berurutan agar kecerdasan buatan dapat bekerja dengan benar.</p>
        <p><b>Instruksi:</b> Kelompokkan setiap komponen kegiatan berikut ke dalam urutan langkah yang sesuai.</p>

        <table class="identify-table">
            <thead>
                <tr><th>Komponen Aktivitas</th><th>Susun Langkah</th></tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div id="bank" class="bank">
                            <div class="drag-item" draggable="true" data-id="fix">Memperbaiki kesalahan</div>
                            <div class="drag-item" draggable="true" data-id="test">Menguji hasil</div>
                            <div class="drag-item" draggable="true" data-id="label">Memberi label data</div>
                            <div class="drag-item" draggable="true" data-id="collect">Mengumpulkan gambar</div>
                            <div class="drag-item" draggable="true" data-id="train">Melatih model</div>
                        </div>
                    </td>
                    <td class="steps-cell">
                        <div class="step-row"><span class="step-num">1.</span><div class="drop-zone" data-step="1"></div></div>
                        <div class="step-row"><span class="step-num">2.</span><div class="drop-zone" data-step="2"></div></div>
                        <div class="step-row"><span class="step-num">3.</span><div class="drop-zone" data-step="3"></div></div>
                        <div class="step-row"><span class="step-num">4.</span><div class="drop-zone" data-step="4"></div></div>
                        <div class="step-row"><span class="step-num">5.</span><div class="drop-zone" data-step="5"></div></div>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="btn-row">
            <button class="btn" id="cek" type="button">Cek Jawaban</button>
            <button class="btn" id="reset" type="button">Reset</button>
        </div>

        <div id="hasil" class="hasil" aria-live="polite"></div>

        <div id="feedback-penutup" class="feedback-penutup">
            Dari aktivitas menyusun langkah-langkah kerja komputer, kamu telah melihat bahwa sebuah algoritma hanya dapat berjalan dengan baik jika urutannya benar. Setiap langkah—mulai dari mengumpulkan data, memberi label, melatih model, hingga menguji hasil—harus dilakukan secara sistematis. Jika satu langkah saja ditempatkan tidak pada urutannya, maka komputer bisa menghasilkan keputusan yang salah. Aktivitas ini menunjukkan bahwa algoritma bukan sekadar daftar perintah, tetapi <b>rangkaian proses logis yang saling bergantung</b> untuk membantu komputer "berpikir" dan menyelesaikan tugas dengan tepat.
        </div>
    </section>

</div>

<div class="bottom-bar">
    <a href="{{ route('quiz.show',  ['quiz' => 2]) }}" class="btn-next">
        Uji Pemahamanmu! <i class="fa-solid fa-arrow-right"></i>
    </a>
</div>
@endsection

@push('scripts')
<script>
// ========== SEMUA SCRIPT DALAM DOMContentLoaded ==========
document.addEventListener("DOMContentLoaded", function () {

    // ===== DRAG & DROP =====
    const feedbackPenutup = document.getElementById("feedback-penutup");
    const kunci = { 1:"collect", 2:"label", 3:"train", 4:"test", 5:"fix" };
    const bank  = document.getElementById("bank");
    const hasil = document.getElementById("hasil");
    const zones = document.querySelectorAll(".drop-zone");
    let dragged  = null;

    document.querySelectorAll(".drag-item").forEach(item => {
        item.addEventListener("dragstart", () => { dragged = item; });
    });

    zones.forEach(zone => {
        zone.addEventListener("dragover", e => { e.preventDefault(); zone.classList.add("over"); });
        zone.addEventListener("dragleave", () => zone.classList.remove("over"));
        zone.addEventListener("drop", e => {
            e.preventDefault();
            zone.classList.remove("over");
            if (!dragged) return;
            const existing = zone.querySelector(".drag-item");
            if (existing) bank.appendChild(existing);
            zone.innerHTML = "";
            zone.appendChild(dragged);
            hasil.style.display = "none";
            hasil.classList.remove("ok", "bad");
            hasil.innerHTML = "";
            feedbackPenutup.style.display = "none";
        });
    });

    document.getElementById("cek").addEventListener("click", () => {
        let terisi = 0, benar = 0;
        zones.forEach(z => {
            const step = Number(z.dataset.step);
            const item = z.querySelector(".drag-item");
            if (!item) return;
            terisi++;
            if (item.dataset.id === kunci[step]) benar++;
        });
        hasil.style.display = "block";
        if (terisi < 5) {
            hasil.classList.add("bad");
            hasil.innerHTML = `❗ Kamu baru mengisi <b>${terisi}/5</b> langkah.`;
            feedbackPenutup.style.display = "none";
            return;
        }
        if (benar === 5) {
            hasil.classList.remove("bad"); hasil.classList.add("ok");
            hasil.innerHTML = `✅ <b>Semua langkah sudah benar!</b>`;
            feedbackPenutup.style.display = "block";
        } else {
            hasil.classList.remove("ok"); hasil.classList.add("bad");
            hasil.innerHTML = `❌ Masih ada langkah yang belum tepat.`;
            feedbackPenutup.style.display = "none";
        }
    });

    document.getElementById("reset").addEventListener("click", () => {
        zones.forEach(z => {
            const item = z.querySelector(".drag-item");
            if (item) bank.appendChild(item);
            z.innerHTML = "";
        });
        const order = ["fix","test","label","collect","train"];
        const items = Array.from(bank.querySelectorAll(".drag-item"));
        order.forEach(id => {
            const found = items.find(el => el.dataset.id === id);
            if (found) bank.appendChild(found);
        });
        hasil.style.display = "none";
        hasil.classList.remove("ok", "bad");
        hasil.innerHTML = "";
    });

    // ===== SIMULASI ALGORITMA =====
    let step = 1, nilai = "";
    const titles = {
        1: "Tahap 1 — Menerima Input",
        2: "Tahap 2 — Mengolah Data",
        3: "Tahap 3 — Membuat Keputusan",
        4: "Tahap 4 — Menghasilkan Output"
    };
    const algTitle  = document.getElementById("algTitle");
    const algStage  = document.getElementById("algStage");
    const algInput  = document.getElementById("algInput");
    const algTrace  = document.getElementById("algTrace");
    const algOutput = document.getElementById("algOutput");
    const algProg   = document.getElementById("algProg");
    const tabs      = document.querySelectorAll(".algoritma-tab");

    function render() {
        algTitle.textContent = titles[step];
        let percent = 0;
        if (step === 1) percent = 0;
        if (step === 2) percent = 33;
        if (step === 3) percent = 66;
        if (step === 4) percent = 100;
        algProg.style.width = percent + "%";
        tabs.forEach(t => t.classList.toggle("active", +t.dataset.step === step));

        if (step === 1) {
            algStage.innerHTML = `
                <label>Masukkan nilai siswa:</label><br>
                <input type="number" id="val" placeholder="contoh: 80">
                <p style="font-size:12px;">Tanpa input, komputer tidak bisa bekerja.</p>
            `;
            document.getElementById("val").oninput = e => {
                nilai = e.target.value;
                algInput.textContent = nilai || "-";
            };
            algTrace.textContent  = "Menunggu input.";
            algOutput.textContent = "-";
        }
        if (step === 2) {
            algStage.innerHTML    = `<p>Komputer mengecek apakah nilai sudah diisi dan valid.</p>`;
            algTrace.textContent  = "Ambil input\nCek apakah nilai valid";
        }
        if (step === 3) {
            const n    = Number(nilai);
            const res  = (!nilai || isNaN(n)) ? "Tidak valid" : (n >= 75 ? "Tuntas" : "Belum Tuntas");
            algStage.innerHTML    = `<p>Komputer membandingkan nilai dengan batas kelulusan. <br><b>Catatan:</b> KKM ditetapkan sebesar <b>75</b>.</p>`;
            algTrace.textContent  = "Jika nilai ≥ 75 → Tuntas\nJika nilai < 75 → Belum Tuntas";
            algOutput.textContent = res;
        }
        if (step === 4) {
            algStage.innerHTML    = `<p>Keputusan ditampilkan sebagai hasil akhir.</p>`;
            algTrace.textContent  = "Output ditampilkan ke pengguna.";
        }
    }

    document.getElementById("algNext").onclick  = () => { if (step < 4) { step++; render(); } };
    document.getElementById("algPrev").onclick  = () => { if (step > 1) { step--; render(); } };
    document.getElementById("algReset").onclick = () => {
        step = 1; nilai = "";
        algInput.textContent  = "-";
        algTrace.textContent  = "Menunggu input.";
        algOutput.textContent = "-";
        algProg.style.width   = "0%";
        render();
    };
    tabs.forEach(t => t.onclick = () => { step = +t.dataset.step; render(); });
    render();

    // ===== MAP GAME =====
    // Fungsi closeB dan next dibuat global agar bisa dipanggil dari onclick di bubble HTML
    const mapSteps = [
        {t:"1.\tMenerima Input", c:"Proses dimulai dengan mengumpulkan berbagai gambar sebagai bahan utama. Gambar-gambar ini menjadi sumber informasi yang akan digunakan oleh komputer untuk belajar mengenali sesuatu. Semakin banyak dan beragam gambar yang dikumpulkan, semakin baik pula pemahaman sistem terhadap data yang ada. Tanpa adanya input berupa gambar, proses selanjutnya tidak dapat berjalan."},
        {t:"2.\tMengolah Data Mengikuti Langkah-Langkah Tertentu", c:"Setelah gambar dikumpulkan, setiap gambar diberi keterangan atau label sesuai dengan isinya. Label ini membantu komputer mengetahui apa yang terdapat di dalam gambar tersebut. Dengan adanya label, data menjadi lebih terstruktur dan mudah dipahami. Tahap ini penting agar komputer tidak hanya melihat gambar, tetapi juga memahami maknanya secara sederhana."},
        {t:"3.\tMembuat Keputusan", c:"Pada tahap ini, komputer mulai mempelajari data yang sudah diberi label. Komputer akan mencari pola atau ciri-ciri dari setiap gambar berdasarkan informasi yang tersedia. Proses ini dilakukan dengan mengikuti aturan atau langkah yang sudah ditentukan sebelumnya. Dari sini, komputer mulai “belajar” membedakan satu jenis gambar dengan yang lain."},
        {t:"4.\tMenghasilkan Output", c:"Setelah proses belajar selesai, komputer mencoba menggunakan pengetahuannya pada gambar baru. Komputer akan memberikan hasil berupa tebakan atau keputusan berdasarkan apa yang telah dipelajari. Hasil ini menunjukkan seberapa baik sistem memahami data sebelumnya. Jika hasilnya sudah sesuai, maka sistem dapat digunakan untuk membantu pekerjaan manusia."}
    ];

    const pos = [
        {x:15, y:50}, {x:38, y:25}, {x:62, y:55}, {x:85, y:30}
    ];

    let cur = 0, done = [], bubble = null;
    const mapEl = document.getElementById("map");

    // Buat semua titik dulu
    pos.forEach((p, i) => mapEl.appendChild(makePoint(i, p)));

    // Buat path setelah titik ter-render
    setTimeout(() => {
        pos.forEach((_, i) => { if (i) mapEl.appendChild(makePath(i-1, i)); });
    }, 50);

    updateBar();

    function makePoint(i, p) {
        const d = document.createElement("div");
        d.id = `p${i}`;
        d.className = "map-point" + (i ? " locked" : " active");
        d.style.left = `calc(${p.x}% - 35px)`;
        d.style.top  = `calc(${p.y}% - 35px)`;
        d.innerHTML  = `<div class="point-number">${i+1}</div>`;
        d.onclick    = () => i > cur ? alert("Selesaikan tahap sebelumnya!") : showBubble(i);
        return d;
    }

    function makePath(a, b) {
        const pa  = document.getElementById(`p${a}`).getBoundingClientRect();
        const pb  = document.getElementById(`p${b}`).getBoundingClientRect();
        const map = mapEl.getBoundingClientRect();
        const x1  = pa.left + pa.width/2  - map.left;
        const y1  = pa.top  + pa.height/2 - map.top;
        const x2  = pb.left + pb.width/2  - map.left;
        const y2  = pb.top  + pb.height/2 - map.top;
        const len = Math.hypot(x2-x1, y2-y1);
        const ang = Math.atan2(y2-y1, x2-x1) * 180 / Math.PI;
        const line = document.createElement("div");
        line.className      = "path";
        line.style.left     = x1 + "px";
        line.style.top      = y1 + "px";
        line.style.width    = len + "px";
        line.style.transform = `rotate(${ang}deg)`;
        return line;
    }

    function showBubble(i) {
        bubble?.remove();
        document.getElementById('bubbleOverlay')?.remove(); // hapus overlay lama

        // Overlay (hanya HP)
        if (window.innerWidth <= 600) {
            const overlay = document.createElement('div');
            overlay.id = 'bubbleOverlay';
            overlay.style.cssText = 'position:fixed;inset:0;background:rgba(0,0,0,0.6);z-index:998;';
            overlay.onclick = closeBubble;
            document.body.appendChild(overlay);
        }

        bubble = document.createElement("div");
        bubble.className = "bubble show";
        bubble.innerHTML = `
            <div class="bubble-title">${mapSteps[i].t}</div>
            <p>${mapSteps[i].c}</p>
            <div class="bubble-footer">
                <button class="button alt" id="btnCloseB">Tutup</button>
                ${i === cur ? '<button class="button" id="btnNext">Lanjut</button>' : ''}
            </div>`;
        document.body.appendChild(bubble);

        document.getElementById("btnCloseB").addEventListener("click", closeBubble);
        const btnNext = document.getElementById("btnNext");
        if (btnNext) btnNext.addEventListener("click", nextStep);
    }

    function closeBubble() {
        bubble?.remove();
        bubble = null;
        document.getElementById('bubbleOverlay')?.remove();
    }

    function nextStep() {
        done.push(cur);
        document.getElementById(`p${cur}`).classList.replace("active", "completed");
        if (cur < mapSteps.length - 1) {
            cur++;
            document.getElementById(`p${cur}`).classList.replace("locked", "active");
        } else {
            document.getElementById("done").classList.add("show");
        }
        closeBubble();
        updateBar();
    }

    function updateBar() {
        const p = Math.round(done.length / mapSteps.length * 100);
        const bar = document.getElementById("bar");
        bar.style.width  = p + "%";
        bar.textContent  = p + "%";
    }

    window.addEventListener("resize", () => {
        document.querySelectorAll(".path").forEach(p => p.remove());
        setTimeout(() => {
            pos.forEach((_, i) => { if (i) mapEl.appendChild(makePath(i-1, i)); });
        }, 50);
    });

}); // akhir DOMContentLoaded
</script>
@endpush