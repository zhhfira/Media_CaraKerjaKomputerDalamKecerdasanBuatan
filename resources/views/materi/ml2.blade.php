@extends('layouts.siswa')

@section('title', 'Machine Learning: Jenis Machine Learning')

@section('topbar', 'Machine Learning: Komputer yang Belajar')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Alata&family=Itim&family=Kumbh+Sans:wght,YOPQ@100..900,300&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

<style>
/* ====== TABEL ====== */
.identify-table{
  width: 100%;
  border-collapse: collapse;
  margin-top: 12px;
  background: #fff;
}

.identify-table th,
.identify-table td{
  border: 1px solid #555;
  padding: 10px 12px;
  vertical-align: top;
}

.identify-table th{
  background: #f6f6f6;
  text-align: center;
  font-weight: 700;
}

.steps-cell{
  vertical-align: top;
  padding: 12px;
}

/* 2 kolom: Supervised & Unsupervised */
.steps-wrap{
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 18px;
  width: 100%;
  max-width: 820px;
  margin: 0;
  align-items: start;
}

@media (max-width: 760px){
  .steps-wrap{ grid-template-columns: 1fr; }
}

/* ====== BANK ITEM ====== */
.bank{
  display: grid;
  gap: 10px;
  margin: 2px 0;
}

.drag-item{
  border: 3px solid #006A67;
  background: #fff;
  padding: 8px 10px;
  cursor: grab;
  user-select: none;
  line-height: 1.6;
  font-size: 12px;
  box-sizing: border-box;
}

.drag-item:active{ cursor: grabbing; }
.drag-item.dragging{ opacity: .6; }

/* ====== STEPS ====== */
.step-col{
  flex: 1;
  display: flex;
  flex-direction: column;
}

.step-label{
  font-weight: 800;
  text-transform: uppercase;
  margin-bottom: 8px;
  font-size: 14px;
  letter-spacing: .5px;
  text-align: center;
}

.drop-zone{
  min-height: 160px;
  padding: 12px;
  border: 2px dashed #999;
  border-radius: 14px;
  display: flex;
  flex-direction: column;
  gap: 10px;
  background: #fff;
  box-sizing: border-box;
}

.drop-zone.over{ background: #f6f6f6; }

/* ====== TOMBOL ====== */
.btn-row{
  display: flex;
  gap: 10px;
  margin-top: 12px;
  flex-wrap: wrap;
  position: relative;
  z-index: 5;
}

.btn{
  border: 1px solid #555;
  background: #f6f6f6;
  padding: 7px 14px;
  font-weight: 700;
  cursor: pointer;
}

.btn:hover{ background: #eaeaea; }

.hasil{
  margin-top: 10px;
  font-size: 12px;
  line-height: 1.7;
  text-align: justify;
  font-family: 'Poppins', Arial, sans-serif;
}

.feedback-penutup{
  margin-top: 12px;
  padding: 12px 14px;
  border: 1px solid #555;
  border-radius: 10px;
  background: #f6f6f6;
  font-size: 12px;
  line-height: 1.7;
  text-align: justify;
  display: none;
}

.drag-item.correct{ outline: 2px solid #22c55e; }
.drag-item.wrong{ outline: 2px solid #ef4444; }

/* ====== MODAL OVERLAY ====== */
.modal-overlay{
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,0.45);
  display: none;
  align-items: center;
  justify-content: center;
  z-index: 9999;
}

.modal-overlay.show{ display: flex; }

.modal-box{
  background: #ffffff;
  border-radius: 12px;
  padding: 32px 40px 26px;
  max-width: 480px;
  width: 90%;
  text-align: center;
  box-shadow: 0 12px 40px rgba(0,0,0,0.25);
}

.modal-icon{
  width: 120px;
  height: 120px;
  border-radius: 50%;
  margin: 0 auto 18px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 56px;
  border: 6px solid #e6f7ec;
}

.modal-icon.success{ color: #1b8a3c; border-color: #e6f7ec; }
.modal-icon.error{ color: #c62828; border-color: #fde0e0; }

.modal-title{ margin-bottom: 6px; font-size: 22px; font-weight: 700; }

#modal-text{ font-size: 14px; margin-bottom: 18px; line-height: 1.6; }

.modal-btn{
  background: #1a73e8;
  color: #fff;
  border: none;
  padding: 8px 20px;
  border-radius: 6px;
  font-size: 14px;
  font-weight: 600;
  cursor: pointer;
}

.modal-btn:hover{ background: #185abc; }
</style>
@endpush

@section('content')
<div class="content-card">
    <h3>2. Jenis <i>Machine Learning</i></h3>

    <p class="style-materi">
        Secara umum, terdapat dua jenis utama algoritma dalam <i>machine learning</i>, yaitu <i>Supervised Learning</i> dan <i>Unsupervised Learning</i>.
        Kedua jenis ini dibedakan berdasarkan ada atau tidaknya label pada data yang digunakan saat proses pembelajaran.
        Melalui pemahaman kedua jenis ini, kita dapat mengetahui bagaimana komputer "belajar" dari data untuk mengenali pola, membuat prediksi,
        dan mengambil keputusan.
    </p>

    <ol style="margin: 6px 0 16px 0; padding-left: 38px; font-size: 14px; line-height: 1.75; text-align: justify;">
        <li class="section-text">
            <b><i>Supervised Learning</i></b><br/>
            <p class="style-materi">
                Tujuan dari <i>supervised learning</i> adalah membuat model mampu menebak atau memprediksi output (label) dari data baru dengan memanfaatkan pola
                yang sudah dipelajari dari data sebelumnya. Proses ini dimulai dari data yang sudah diberi label, sehingga model "tahu" jawaban yang benar saat belajar.
            </p>

            <figure class="img-figure">
                <img src="{{ asset('img/supervised.png') }}" alt="Gambar 9 Alur Supervised Learning">
                <figcaption><i>Gambar 9 Alur Supervised Learning</i></figcaption>
            </figure>

            <p class="style-materi">
                Dapat dilihat pada gambar 9 proses <i>supervised learning</i> dapat dipahami secara sederhana sebagai berikut. Pertama, model menerima data mentah
                (input raw data) berupa gambar-gambar hewan yang sudah dilengkapi dengan label, seperti sapi, gajah, dan unta. Data berlabel ini berfungsi sebagai
                contoh bagi komputer untuk belajar mengenali ciri-ciri setiap hewan. Selanjutnya, data tersebut diproses menggunakan algoritma, yaitu aturan atau langkah logis
                yang membantu komputer menemukan pola dari data yang ada.
            </p>

            <p class="style-materi">
                Setelah melalui tahap pemrosesan dan pembelajaran, model akan menghasilkan output, yaitu prediksi label untuk data baru. Misalnya, ketika diberikan gambar hewan
                yang belum pernah dilihat sebelumnya, model dapat menentukan apakah gambar tersebut termasuk gajah, unta, atau sapi, berdasarkan kemiripan pola dengan data latihan.
                Dengan cara inilah <i>supervised learning</i> bekerja: belajar dari contoh yang sudah diberi label, lalu menggunakan hasil pembelajaran tersebut untuk membuat keputusan pada data baru.
            </p>
        </li>

        <li class="section-text">
            <b>Unsupervised Learning</b><br/>
            <p class="style-materi">
                Berbeda dengan supervised learning, <i>unsupervised learning</i> tidak membutuhkan label atau jawaban benar saat proses pembelajaran. Model hanya diberikan data mentah
                (raw data) tanpa informasi nama atau kategori. Dari data tersebut, komputer kemudian berusaha menemukan pola, kesamaan, atau perbedaan secara mandiri.
            </p>

            <figure class="img-figure">
                <img src="{{ asset('img/unsupervised.png') }}" alt="Gambar 10 Alur Unsupervised Learning">
                <figcaption><i>Gambar 10 Alur Unsupervised Learning</i></figcaption>
            </figure>

            <p class="style-materi">
                Dapat dilihat pada Gambar 10 proses <i>unsupervised learning</i> dimulai dari input raw data berupa gambar-gambar hewan tanpa label. Komputer tidak diberi tahu mana gajah, unta,
                atau sapi. Pada tahap <i>interpretation</i>, model mencoba memahami karakteristik data, seperti bentuk, ukuran, atau kemiripan visual antar hewan. Selanjutnya, melalui algoritma dan proses
                pengolahan <i>(processing)</i>, model melakukan pelatihan <i>(model training)</i> untuk mengelompokkan data berdasarkan kemiripan ciri yang ditemukan.
            </p>

            <p class="style-materi">
                Hasil dari proses ini bukan berupa nama hewan secara langsung, tetapi berupa kelompok <i>(cluster)</i>. Misalnya, hewan yang memiliki ukuran besar akan terkumpul dalam satu kelompok,
                sementara hewan yang memiliki bentuk tubuh lebih kecil berada di kelompok lain. Dengan kata lain, model "bernalar" sendiri untuk menentukan data mana yang mirip dan mana yang berbeda
                tanpa arahan manusia. Karena itu, metode ini sering disebut sebagai <i>learning by reasoning</i>, yaitu pembelajaran dengan menalar pola dari data.
            </p>

            <p class="style-materi">
                Tujuan utama <i>unsupervised learning</i> adalah menemukan pola atau struktur tersembunyi dalam data (Bintoro et al., 2024). Metode ini banyak digunakan untuk menemukan hubungan alami antar data,
                seperti mengelompokkan pelanggan berdasarkan kebiasaan belanja yang mirip, atau menyederhanakan data berdimensi besar agar lebih mudah dianalisis.
            </p>
        </li>
    </ol>

    <!-- ===== AKTIVITAS INTERAKTIF ===== -->
    <section class="activity-frame" id="ml-activity">
        <div class="activity-label">
            Aktivitas Interaktif: <b><i>"Supervised & Unsupervised"</i></b>
        </div>

        <p>
            Untuk memahami perbedaan antara <i>Supervised Learning</i> dan <i>Unsupervised Learning</i>, lakukan aktivitas interaktif berikut. Kamu akan menyeret dan meletakkan beberapa contoh kasus ke kategori
            yang paling sesuai berdasarkan materi yang sudah kamu pelajari.
        </p>

        <p>
            <b>Petunjuk:</b><br/>
            Pasangkan setiap kartu kasus di bawah ini ke kolom <i>Supervised Learning</i> dan <i>Unsupervised Learning</i> sesuai dengan karakteristiknya. Bacalah setiap kasus dengan teliti dan tentukan apakah
            contoh tersebut memerlukan label atau tidak.
        </p>

        <table class="identify-table">
            <tbody>
                <tr>
                    <td>
                        <div id="bank-ml" class="bank">
                            <div class="drag-item" draggable="true" data-id="fix">
                                Kecerdasan buatan dilatih dengan foto berbagai tanaman yang sudah diberi label seperti "Pisang", "Mangga", dan "Jambu" berdasarkan bentuk daunnya.
                            </div>
                            <div class="drag-item" draggable="true" data-id="test">
                                Sistem menganalisis kebiasaan belanja pelanggan untuk menemukan kelompok pola belanja yang mirip tanpa mengetahui kategori pelanggan sebelumnya.
                            </div>
                            <div class="drag-item" draggable="true" data-id="label">
                                Model kecerdasan buatan menggunakan data siswa (tugas, kuis, kehadiran) yang sudah diberi label "Lulus" atau "Perlu Bimbingan" untuk memprediksi hasil belajar.
                            </div>
                            <div class="drag-item" draggable="true" data-id="collect">
                                Aplikasi secara otomatis mengelompokkan foto hewan dengan ciri tubuh mirip tanpa mengetahui nama hewan tersebut.
                            </div>
                            <div class="drag-item" draggable="true" data-id="train">
                                Model yang belajar dari rekaman suara yang sudah diberi label "Halo", "Stop", dan "Mulai".
                            </div>
                        </div>
                    </td>

                    <td class="steps-cell">
                        <div class="steps-wrap">
                            <div class="step-col">
                                <div class="step-label"><i>SUPERVISED LEARNING</i></div>
                                <div class="drop-zone" data-step="1"></div>
                            </div>

                            <div class="step-col">
                                <div class="step-label"><i>UNSUPERVISED LEARNING</i></div>
                                <div class="drop-zone" data-step="2"></div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="btn-row">
            <button class="btn" id="cek-ml" type="button">Cek Jawaban</button>
            <button class="btn" id="reset-ml" type="button">Reset</button>
        </div>

        <div id="hasil-ml" class="hasil" aria-live="polite"></div>

        <div id="feedback-penutup" class="feedback-penutup">
            Melalui aktivitas ini, kamu telah melihat bahwa cara sebuah model Machine Learning belajar sangat bergantung pada jenis data yang diterimanya. Ketika data sudah memiliki label —
            seperti nama tanaman, jenis suara, atau kategori hasil belajar — maka komputer dapat belajar dengan cara meniru contoh tersebut. Inilah yang disebut Supervised Learning. Sebaliknya,
            jika data tidak memiliki label, komputer harus mencari pola dan kemiripannya sendiri. Proses ini dikenal sebagai Unsupervised Learning.
        </div>
    </section>
</div>

<div class="bottom-bar">
    <a href="{{ route('materi.ml3') }}" class="btn-next">
        Materi Selanjutnya
        <i class="fa-solid fa-arrow-right"></i>
    </a>
</div>

<!-- MODAL BUBBLE (GLOBAL) -->
<div id="modal-overlay" class="modal-overlay">
    <div class="modal-box">
        <div id="modal-icon" class="modal-icon success">
            <i id="modal-fa" class="fa-solid fa-check"></i>
        </div>
        <h2 id="modal-title" class="modal-title">Benar</h2>
        <p id="modal-text">...</p>
        <button id="modal-close" class="modal-btn" type="button">Tutup</button>
    </div>
</div>
@endsection

@push('scripts')
<script>
function showModal(type, title, htmlText){
    const overlay = document.getElementById("modal-overlay");
    const icon    = document.getElementById("modal-icon");
    const fa      = document.getElementById("modal-fa");
    const t       = document.getElementById("modal-title");
    const txt     = document.getElementById("modal-text");

    overlay.classList.add("show");

    if(type === "success"){
        icon.className = "modal-icon success";
        fa.className   = "fa-solid fa-check";
    } else {
        icon.className = "modal-icon error";
        fa.className   = "fa-solid fa-xmark";
    }

    t.textContent = title;
    txt.innerHTML = htmlText;
}

function closeModal(){
    document.getElementById("modal-overlay").classList.remove("show");
}

document.addEventListener("DOMContentLoaded", () => {
    const overlay  = document.getElementById("modal-overlay");
    const closeBtn = document.getElementById("modal-close");

    if (!overlay || !closeBtn) return;

    closeBtn.addEventListener("click", closeModal);
    overlay.addEventListener("click", (e) => { if(e.target === overlay) closeModal(); });
    document.addEventListener("keydown", (e) => { if(e.key === "Escape") closeModal(); });
});
</script>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const root = document.getElementById("ml-activity");
    if (!root) return;

    const bank          = root.querySelector("#bank-ml");
    const cekBtn        = root.querySelector("#cek-ml");
    const resetBtn      = root.querySelector("#reset-ml");
    const hasil         = root.querySelector("#hasil-ml");
    const feedbackPenutup = root.querySelector("#feedback-penutup");
    const dropZones     = root.querySelectorAll(".drop-zone");

    if (!bank || !cekBtn || !resetBtn || !hasil || !dropZones.length) return;

    // step "1" = supervised, step "2" = unsupervised
    const ANSWER_BY_ID = {
        fix:     "1",
        label:   "1",
        train:   "1",
        test:    "2",
        collect: "2",
    };

    const TOTAL_ITEMS = Object.keys(ANSWER_BY_ID).length;
    let draggedEl = null;

    /* =====================
       DRAG START / END
    ===================== */
    root.addEventListener("dragstart", (e) => {
        const item = e.target.closest(".drag-item");
        if (!item) return;

        draggedEl = item;
        e.dataTransfer.setData("text/plain", item.dataset.id);
        e.dataTransfer.effectAllowed = "move";
        item.classList.add("dragging");
    });

    root.addEventListener("dragend", (e) => {
        const item = e.target.closest(".drag-item");
        if (!item) return;

        item.classList.remove("dragging");
        draggedEl = null;
    });

    /* =====================
       DROP ZONE
    ===================== */
    dropZones.forEach((zone) => {
        zone.addEventListener("dragover", (e) => {
            e.preventDefault();
            zone.classList.add("over");
        });

        zone.addEventListener("dragleave", () => { zone.classList.remove("over"); });

        zone.addEventListener("drop", (e) => {
            e.preventDefault();
            zone.classList.remove("over");

            const id   = e.dataTransfer.getData("text/plain");
            const item = root.querySelector(`.drag-item[data-id="${id}"]`) || draggedEl;

            if (!item) return;

            zone.appendChild(item);
            clearMarks();
        });
    });

    /* =====================
       DROP BALIK KE BANK
    ===================== */
    bank.addEventListener("dragover", (e) => e.preventDefault());

    bank.addEventListener("drop", (e) => {
        e.preventDefault();

        const id   = e.dataTransfer.getData("text/plain");
        const item = root.querySelector(`.drag-item[data-id="${id}"]`) || draggedEl;

        if (!item) return;

        bank.appendChild(item);
        clearMarks();
    });

    /* =====================
       CEK JAWABAN
    ===================== */
    cekBtn.addEventListener("click", () => {
        clearMarks();

        if (feedbackPenutup) feedbackPenutup.style.display = "none";

        const placedCount = [...dropZones].reduce(
            (acc, z) => acc + z.querySelectorAll(".drag-item").length,
            0
        );

        if (placedCount !== TOTAL_ITEMS) {
            const sisa = TOTAL_ITEMS - placedCount;

            showModal(
                "error",
                "Belum Lengkap",
                `⚠️ Masih ada <b>${sisa}</b> kartu yang belum dipasang. Lengkapi dulu!`
            );

            hasil.innerHTML = `⚠️ <b>Belum lengkap.</b> Masih ada <b>${sisa}</b> kartu yang belum kamu pasangkan.`;
            return;
        }

        let salah = 0;

        dropZones.forEach((zone) => {
            const step = zone.dataset.step;
            zone.querySelectorAll(".drag-item").forEach((item) => {
                if (ANSWER_BY_ID[item.dataset.id] === step) {
                    item.classList.add("correct");
                } else {
                    item.classList.add("wrong");
                    salah++;
                }
            });
        });

        if (salah === 0) {
            showModal(
                "success",
                "Benar",
                "Mantap! Semua kasus sudah masuk kategori yang tepat."
            );

            hasil.innerHTML = `<b>Benar semua!</b> <b>Supervised</b> memakai data <b>berlabel</b>, sedangkan <b>Unsupervised</b> mencari <b>pola/cluster</b> tanpa label.`;

            if (feedbackPenutup) feedbackPenutup.style.display = "block";
        } else {
            showModal(
                "error",
                "Belum Tepat",
                `Masih ada <b>${salah}</b> kartu yang salah. Ingat: <b>ada label</b> = Supervised, <b>tanpa label</b> = Unsupervised.`
            );

            hasil.innerHTML = `<b>Belum tepat.</b> Ada <b>${salah}</b> kartu yang masih salah tempat.`;
        }
    });

    /* =====================
       RESET
    ===================== */
    resetBtn.addEventListener("click", () => {
        dropZones.forEach((zone) => {
            zone.querySelectorAll(".drag-item").forEach((item) => {
                bank.appendChild(item);
            });
        });

        clearMarks();
        hasil.innerHTML = "";
        if (feedbackPenutup) feedbackPenutup.style.display = "none";
    });

    /* =====================
       HELPER
    ===================== */
    function clearMarks() {
        root.querySelectorAll(".drag-item")
            .forEach((el) => el.classList.remove("correct", "wrong"));
    }
});
</script>
@endpush