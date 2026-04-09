@extends('layouts.siswa')

@section('title', 'Data')
@section('topbar', 'Data: Bahan Bakar Utama Kecerdasan Buatan')

@push('styles')
<style>
.data-guess-table{
    width: 100%;
    border-collapse: collapse;
    font-size: 12px;
}
.data-guess-table th,
.data-guess-table td{
    border: 1px solid #555;
    padding: 8px 10px;
    vertical-align: top;
}
.data-guess-table th{
    background: #f7f7f7;
    text-align: center;
    font-weight: 500;
}
.choices-cell{ white-space: normal; }
.choice-pill{
    display: inline-flex;
    align-items: center;
    margin-right: 10px;
    margin-top: 4px;
    font-size: 12px;
    cursor: pointer;
}
.choice-pill input{ display:none; }
.choice-circle{
    width: 16px; height: 16px;
    border-radius: 50%;
    border: 2px solid #44546a;
    margin-right: 4px;
    box-sizing: border-box;
    position: relative;
}
.choice-pill input:checked + .choice-circle::after{
    content: "";
    position: absolute;
    inset: 2px;
    border-radius: 50%;
    background: #44546a;
}
.row-feedback{ margin-top: 4px; font-size: 12px; }
.row-feedback.correct{ color:#1b8a3c; }
.row-feedback.wrong{ color:#c62828; }
.check-wrapper{ margin-top: 10px; text-align: right; }
.quiz-summary{ margin-top: 8px; font-size: 12px; font-weight: 600; }
.modal-overlay{
    position:fixed; inset:0;
    background:rgba(0,0,0,0.45);
    display:none;
    align-items:center; justify-content:center;
    z-index:9999;
}
.modal-overlay.show{ display:flex; }
.modal-box{
    background:#ffffff; border-radius:12px;
    padding:32px 40px 26px;
    max-width:480px; width:90%;
    text-align:center;
    box-shadow:0 12px 40px rgba(0,0,0,0.25);
}
.modal-icon{
    width:120px; height:120px;
    border-radius:50%;
    margin:0 auto 18px;
    display:flex; align-items:center; justify-content:center;
    font-size:56px; border:6px solid #e6f7ec;
}
.modal-icon.success{ color:#1b8a3c; border-color:#e6f7ec; }
.modal-icon.error{ color:#c62828; border-color:#fde0e0; }
.modal-title{ margin-bottom:6px; }
#modal-text{ font-size:14px; margin-bottom:18px; }
.modal-btn{
    background:#1a73e8; color:#fff;
    border:none; padding:8px 20px;
    border-radius:6px; font-size:14px;
    font-weight:600; cursor:pointer;
}
.modal-btn:hover{ background:#185abc; }
.konten-ai{
    display: flex;
    gap: 16px;
    align-items: flex-start;
}
.gambar-ai{ flex: 0 0 220px; }
.gambar-ai img{ width: 100%; height: auto; border-radius: 12px; }
.caption{ font-size: 10px; text-align: center; margin-top: 6px; font-style: italic; color: #747474; }
.teks-ai{ flex: 1; text-align: justify; font-size: 13px; line-height: 1.9;min-width: 0; }
.teks-ai p{ text-indent: 40px; }
@media (max-width: 600px){

  .konten-ai{
    flex-direction: column; /* ⬅ jadi atas-bawah */
  }

  .gambar-ai{
    width: 100%;
  }

  .teks-ai{
    font-size: 12px;
  }

  .teks-ai p{
    text-indent: 20px;
  }

}
</style>
@endpush

@section('content')
<div class="content-card">

    <section class="objective-box">
        <div class="objective-title">TUJUAN PEMBELAJARAN</div>
        <ul class="objective-list">
            <li>Mengenal konsep data dan perannya sebagai dasar dalam kecerdasan buatan (AI).</li>
            <li>Menjelaskan pentingnya data berkualitas dalam menghasilkan keputusan kecerdasan buatan yang akurat.</li>
            <li>Memahami peran dataset dan proses labeling dalam melatih sistem kecerdasan buatan.</li>
        </ul>
    </section>

    <hr>

    <div class="video-wrapper">
        <video controls>
            <source src="{{ asset('video/data.mp4') }}" type="video/mp4">
        </video>
    </div>

    <hr>

    <p class="section-text">
        Pernahkah kamu memperhatikan mengapa toko online bisa menampilkan produk
        yang mirip dengan barang yang baru saja kamu lihat? Menurutmu, apa yang
        membuat komputer bisa tahu kesukaan seseorang? Apakah komputer bisa
        "membaca pikiran", atau ada hal lain yang membuatnya tahu?
        Semua kemampuan itu tidak terjadi secara kebetulan, melainkan karena adanya
        data yang dikumpulkan dan diolah oleh komputer.
    </p>

    <section id="materi-isi" class="materi-isi">
        <h3>1. Konsep Data</h3>
        <p class="style-materi">
            Data adalah fakta mentah berupa angka, teks, gambar, atau suara yang mewakili informasi dari dunia nyata. Sebelum bisa digunakan, data perlu diolah menjadi informasi agar bermakna. Perlu dipahami bahwa data bersifat mentah, artinya informasi yang terkandung di dalamnya belum sepenuhnya bermakna atau siap digunakan. Oleh karena itu, data perlu diolah dan diverifikasi agar menjadi informasi yang akurat, relevan, dan mudah dipahami.        
        </p>
       <br>
        <div class="konten-ai">
            <div class="gambar-ai">
                <img src="{{ asset('img/pomdata.png') }}" alt="Gambar 3 Ilustrasi data">
                <p class="caption">Gambar 3 Ilustrasi proses pengisian data sebagai dasar pembelajaran kecerdasan buatan.</p>
            </div>
            <div class="teks-ai">
            <p> Dalam konteks kecerdasan buatan <i>(Artificial Intelligence)</i>, data memegang peranan yang sangat penting. Tanpa data, sistem kecerdasan buatan tidak memiliki dasar untuk belajar, sehingga tidak mampu mengambil keputusan yang tepat. Data berfungsi sebagai “bahan bakar” utama bagi kecerdasan buatan, karena dari data inilah komputer mempelajari contoh, pengalaman, dan pola yang ada di dunia nyata. Melalui data, kecerdasan buatan dapat menganalisis pola, seperti hubungan antar nilai, kemiripan bentuk, atau kebiasaan tertentu. Selain itu, kecerdasan buatan menggunakan data untuk membuat prediksi, seperti memperkirakan cuaca, merekomendasikan konten, atau menentukan hasil berdasarkan informasi yang telah dipelajari sebelumnya.
            </p>
            </div>
        </div>
        <p class="style-materi">
            Semakin lengkap, beragam, dan berkualitas data yang digunakan, semakin baik kemampuan kecerdasan buatan dalam memahami suatu masalah. Bintoro et al. (2024) menjelaskan bahwa ada beberapa contoh bentuk data yang sering digunakan oleh kecerdasan buatan antara lain:
        </p>
        <ul>
            <li><b>Teks:</b> Data berbentuk tulisan seperti chat, artikel, atau caption.</li>
            <li><b>Gambar:</b> Data visual berupa foto, ilustrasi, atau logo.</li>
            <li><b>Suara:</b> Data berupa gelombang audio seperti rekaman lagu atau suara hewan.</li>
            <li><b>Angka:</b> Data berbentuk bilangan seperti nilai ujian atau suhu udara.</li>
        </ul>
        <br>
        <p class="style-materi">
            Selain jenis data, kecerdasan buatan juga membutuhkan data dalam jumlah yang besar, yang dikenal dengan istilah <b>Big Data</b>. Big Data adalah kumpulan data yang sangat banyak, beragam, dan terus bertambah. Dengan Big Data, kecerdasan buatan memiliki lebih banyak contoh untuk dipelajari, sehingga mampu mengenali pola dengan lebih akurat. Misalnya, semakin banyak foto wajah yang dipelajari, semakin baik kecerdasan buatan dalam membedakan wajah seseorang dengan orang lain.
        </p>
        <section class="activity-frame">
            <div class="activity-label">Aktivitas Interaktif: <b>"Tebak Jenis Data"</b></div>
            <table class="data-guess-table">
                <thead>
                    <tr><th>Contoh Data</th><th>Pilihan Jawaban</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td>🏙️ Foto Pemandangan</td>
                        <td class="choices-cell">
                            <label class="choice-pill"><input type="radio" name="r1" value="teks"><span class="choice-circle"></span> Teks</label>
                            <label class="choice-pill"><input type="radio" name="r1" value="gambar"><span class="choice-circle"></span> Gambar</label>
                            <label class="choice-pill"><input type="radio" name="r1" value="suara"><span class="choice-circle"></span> Suara</label>
                            <label class="choice-pill"><input type="radio" name="r1" value="angka"><span class="choice-circle"></span> Angka</label>
                            <div id="fb-r1" class="row-feedback"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>💬 Kalimat: <i>"Selamat pagi dunia!"</i></td>
                        <td class="choices-cell">
                            <label class="choice-pill"><input type="radio" name="r2" value="teks"><span class="choice-circle"></span> Teks</label>
                            <label class="choice-pill"><input type="radio" name="r2" value="gambar"><span class="choice-circle"></span> Gambar</label>
                            <label class="choice-pill"><input type="radio" name="r2" value="suara"><span class="choice-circle"></span> Suara</label>
                            <label class="choice-pill"><input type="radio" name="r2" value="angka"><span class="choice-circle"></span> Angka</label>
                            <div id="fb-r2" class="row-feedback"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>🔢 Deretan angka: 28°C, 30°C, 32°C, 35°C</td>
                        <td class="choices-cell">
                            <label class="choice-pill"><input type="radio" name="r3" value="teks"><span class="choice-circle"></span> Teks</label>
                            <label class="choice-pill"><input type="radio" name="r3" value="gambar"><span class="choice-circle"></span> Gambar</label>
                            <label class="choice-pill"><input type="radio" name="r3" value="suara"><span class="choice-circle"></span> Suara</label>
                            <label class="choice-pill"><input type="radio" name="r3" value="angka"><span class="choice-circle"></span> Angka</label>
                            <div id="fb-r3" class="row-feedback"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>🔊 Cuplikan bunyi hujan</td>
                        <td class="choices-cell">
                            <label class="choice-pill"><input type="radio" name="r4" value="teks"><span class="choice-circle"></span> Teks</label>
                            <label class="choice-pill"><input type="radio" name="r4" value="gambar"><span class="choice-circle"></span> Gambar</label>
                            <label class="choice-pill"><input type="radio" name="r4" value="suara"><span class="choice-circle"></span> Suara</label>
                            <label class="choice-pill"><input type="radio" name="r4" value="angka"><span class="choice-circle"></span> Angka</label>
                            <div id="fb-r4" class="row-feedback"></div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="check-wrapper">
                <button id="btn-cek-data" class="btn-check-answer">Cek Jawaban</button>
            </div>
            <div id="data-guess-summary" class="quiz-summary"></div>
        </section>

        <div id="modal-overlay" class="modal-overlay">
            <div class="modal-box">
                <div id="modal-icon" class="modal-icon success">
                    <i id="modal-fa" class="fa-solid fa-check"></i>
                </div>
                <h2 id="modal-title" class="modal-title">Benar</h2>
                <p id="modal-text">Semua jawabanmu sudah tepat!</p>
                <button id="modal-close" class="modal-btn">Tutup</button>
            </div>
        </div>
    </section>

</div>

<div class="bottom-bar">
    <a href="{{ route('materi.data2') }}" class="btn-next">
        Materi Selanjutnya <i class="fa-solid fa-arrow-right"></i>
    </a>
</div>
@endsection

@push('scripts')
<script>

// Modal
const modalOverlay = document.getElementById("modal-overlay");
const modalIcon    = document.getElementById("modal-icon");
const modalFa      = document.getElementById("modal-fa");
const modalTitle   = document.getElementById("modal-title");
const modalText    = document.getElementById("modal-text");
const modalClose   = document.getElementById("modal-close");

function openModal(type, title, text){
    modalIcon.classList.remove("success","error");
    modalIcon.classList.add(type);
    modalFa.className = type === "error" ? "fa-solid fa-xmark" : "fa-solid fa-check";
    modalTitle.textContent = title;
    modalText.textContent  = text;
    modalOverlay.classList.add("show");
}
function closeModal(){ modalOverlay.classList.remove("show"); }
modalClose.addEventListener("click", closeModal);
modalOverlay.addEventListener("click", e => { if(e.target === modalOverlay) closeModal(); });

// Tebak Jenis Data
const kunciJenisData = { r1:"gambar", r2:"teks", r3:"angka", r4:"suara" };
const penjelasanBenar = {
    r1:"Benar! Grafik adalah data visual, jadi termasuk gambar.",
    r2:"Tepat! Kalimat tertulis adalah contoh data teks.",
    r3:"Betul! Deretan suhu adalah data angka yang bisa dihitung.",
    r4:"Benar! Bunyi hujan termasuk data suara."
};

document.getElementById("btn-cek-data")?.addEventListener("click", function(){
    const rows = ["r1","r2","r3","r4"];
    rows.forEach(id => {
        const fb = document.getElementById("fb-"+id);
        if(fb){ fb.innerHTML = ""; fb.className = "row-feedback"; }
    });

    for(const id of rows){
        if(!document.querySelector(`input[name="${id}"]:checked`)){
            openModal("error","Belum lengkap","Masih ada contoh data yang belum kamu pilih.");
            return;
        }
    }

    let benar = 0;
    rows.forEach(id => {
        const sel = document.querySelector(`input[name="${id}"]:checked`);
        const fb  = document.getElementById("fb-"+id);
        if(!fb) return;
        if(sel.value === kunciJenisData[id]){
            benar++;
            fb.innerHTML = "✅ " + penjelasanBenar[id];
            fb.classList.add("correct");
        } else {
            fb.innerHTML = "❌ Kurang tepat. Coba pikirkan lagi jenis data yang paling sesuai.";
            fb.classList.add("wrong");
        }
    });

    openModal(
        benar === rows.length ? "success" : "error",
        benar === rows.length ? "Benar" : "Belum tepat",
        benar === rows.length ? "Keren! Semua jawabanmu sudah tepat." : "Tidak apa-apa kalau masih ada yang salah."
    );
});
</script>
@endpush