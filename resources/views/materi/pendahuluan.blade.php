@extends('layouts.siswa')

@section('title', 'Pendahuluan')
@section('topbar', 'PENDAHULUAN')

@push('styles')
<style>
    .activity-identify{
        margin-top: 24px;
        border: 4px solid #006A67;
        border-radius: 26px;
        padding: 18px 22px 22px;
        background: #ffffff;
    }
    .activity-identify-header{
        font-size: 13px;
        line-height: 1.7;
        margin-bottom: 16px;
    }
    .identify-table{
        width: 100%;
        border-collapse: collapse;
        font-size: 13px;
        background: #ffffff;
    }
    .identify-table th,
    .identify-table td{
        border: 1px solid #555;
        padding: 8px 10px;
        vertical-align: middle;
    }
    .identify-table th{
        text-align: center;
        font-weight: 600;
        background: #f6f6f6;
    }
    .identify-table td.situation{ width: 65%; }
    .identify-table td.center{ text-align: center; }
    .choice-circle{
        display:inline-flex;
        width:20px; height:20px;
        border-radius:50%;
        border:2px solid #555;
        align-items:center;
        justify-content:center;
        cursor:pointer;
        transition:.15s ease;
    }
    .choice-circle:hover{ border-color:#1a73e8; }
    .choice-circle.active{ border-color:#1a73e8; background:#1a73e8; }
    .check-wrapper{ margin-top:16px; text-align:right; }
    .feedback-container{
        margin-top:22px;
        padding-top:4px;
        border-top:2px solid #e0e0e0;
        display:none;
    }
    .feedback-item{ margin-bottom:14px; }
    .feedback-box{
        border-left:4px solid #d0d0d0;
        padding-left:10px;
        font-size:13px;
        line-height:1.7;
    }
    .feedback-box.correct strong{ color:#1b8a3c; }
    .feedback-box.wrong strong{ color:#c62828; }
    .feedback-summary{
        margin-top: 18px;
        padding: 16px 18px;
        background: #f9f9f9;
        border-left: 5px solid #1a73e8;
        border-radius: 6px;
        font-size: 12px;
        line-height: 1.7;
        color: #333;
    }
    .feedback-summary p{ margin-bottom: 10px; font-weight: 500; }
    .feedback-summary ol{ margin-left: 18px; padding-left: 4px; }
    .feedback-summary ol li{ margin-bottom: 6px; }
    .feedback-summary b{ color: #0a4bb8; }
    .modal-overlay{
        position:fixed; inset:0;
        background:rgba(0,0,0,0.45);
        display:none;
        align-items:center; justify-content:center;
        z-index:9999;
    }
    .modal-overlay.show{ display:flex; }
    .modal-box{
        background:#ffffff;
        border-radius:12px;
        padding:32px 40px 26px;
        max-width:480px; width:90%;
        text-align:center;
        box-shadow:0 12px 40px rgba(0,0,0,0.25);
    }
    .modal-icon{
        width:120px; height:120px;
        border-radius:50%;
        margin:0 auto 18px;
        display:flex;
        align-items:center; justify-content:center;
        font-size:56px;
        border:6px solid #e6f7ec;
    }
    .modal-icon .icon-success,
    .modal-icon .icon-error{ display:none; font-size:42px; }
    .modal-icon.success .icon-success{ display:inline-block; }
    .modal-icon.error .icon-error{ display:inline-block; }
    .modal-icon.success{ color:#1b8a3c; border-color:#e6f7ec; }
    .modal-icon.error{ color:#c62828; border-color:#fde0e0; }
    .modal-title{ margin-bottom:6px; }
    #modal-text{ font-size:13px; margin-bottom:18px; }
    .modal-btn{
        background:#1a73e8; color:#fff;
        border:none; padding:8px 20px;
        border-radius:6px; font-size:13px;
        font-weight:600; cursor:pointer;
    }
    .modal-btn:hover{ background:#185abc; }
    .style1{ font-size:13px; line-height:1.9; }
</style>
@endpush

@section('content')
<div class="content-card">

    <p class="style1"><b>Bayangkan:</b> ketika kamu sedang menonton YouTube. Setiap kali kamu menonton video tentang musik, YouTube kemudian merekomendasikan video lain yang serupa dan sesuai dengan minatmu. Seolah-olah YouTube "memahami" apa yang kamu sukai. Hal serupa juga terjadi ketika kamu menggunakan Google Maps. Aplikasi tersebut dapat menentukan rute perjalanan tercepat, memperkirakan waktu tempuh, bahkan menghindari kemacetan sebelum kamu benar-benar melewati jalan tersebut. Dalam kehidupan sehari-hari, kita semakin sering berinteraksi dengan teknologi yang tampak mampu "menebak" dan mengambil keputusan secara cerdas.</p>

    <figure class="img-figure">
        <img src="{{ asset('img/maps.png') }}" alt="Gambar 1 Rute Jalan Tercepat">
        <figcaption><i>Gambar 1 Rute Jalan Tercepat</i></figcaption>
    </figure>

    <p class="style1">Fenomena tersebut sering menimbulkan anggapan bahwa komputer dapat berpikir seperti manusia. Padahal, sebenarnya komputer tidak berpikir dalam arti yang sama seperti manusia. Komputer tidak memiliki otak, kesadaran, emosi, maupun intuisi. Apa yang terlihat sebagai "pemikiran" komputer sejatinya adalah hasil dari proses pengolahan data yang sangat cepat, logis, dan terstruktur, yang dijalankan berdasarkan aturan dan instruksi yang telah dirancang oleh manusia.</p><br>

    <p class="style1">Kemampuan ini dikenal sebagai <i>Artificial Intelligence</i> (AI) atau Kecerdasan Buatan, yaitu bidang ilmu komputer yang berfokus pada pengembangan sistem yang mampu meniru aspek-aspek tertentu dari kecerdasan manusia. Kecerdasan buatan memungkinkan komputer untuk menerima data, menganalisisnya, mengenali pola, dan menghasilkan keputusan atau rekomendasi yang tampak cerdas. Dengan kata lain, komputer tidak memahami informasi seperti manusia, tetapi menghitung kemungkinan terbaik berdasarkan data yang tersedia.</p><br>

    <figure class="img-figure">
        <img src="{{ asset('img/KMvsKB.png') }}" alt="Gambar 2 Perbedaan Kecerdasan Manusia vs Kecerdasan Buatan">
        <figcaption><i>Gambar 2 Perbedaan Kecerdasan Manusia vs Kecerdasan Buatan</i></figcaption>
    </figure>

    <p class="style1">Salah satu ciri utama kecerdasan buatan adalah kemampuannya untuk belajar dari data dan pengalaman. Inilah yang membuat rekomendasi YouTube semakin sesuai dengan minat pengguna, atau prediksi Google Maps semakin akurat dari waktu ke waktu. Namun, penting untuk dipahami bahwa proses "belajar" pada komputer sangat berbeda dengan cara manusia belajar. Komputer tidak benar-benar memahami makna, melainkan hanya menyesuaikan perhitungan berdasarkan pola data.</p><br>

    <p class="style1">Perbedaan ini menjadi semakin jelas jika dibandingkan dengan kecerdasan alami. Kecerdasan manusia dan hewan merupakan hasil proses biologis yang kompleks dan berkembang melalui evolusi. Manusia mampu berpikir secara abstrak, menggunakan bahasa, berkreasi, berempati, serta mengambil keputusan berdasarkan perasaan dan pengalaman subjektif. Hewan pun menunjukkan bentuk kecerdasan alami, seperti kemampuan belajar, memecahkan masalah, berkomunikasi, dan beradaptasi dengan lingkungan. Semua kemampuan ini muncul secara alami, bukan karena diprogram.</p>

    <div style="margin-top:20px;">
        <h6 style="margin-bottom:14px;font-size:13px;">Tabel 1. Perbandingan Kecerdasan Alami dan Kecerdasan Buatan</h6>
        <table style="width:100%;border-collapse:collapse;font-size:13px;background:#ffffff;">
            <thead>
            <tr style="background:#222;color:#fff;text-align:center;">
                <th style="border:1px solid #444;padding:8px;">Aspek</th>
                <th style="border:1px solid #444;padding:8px;">Kecerdasan Alami (Manusia)</th>
                <th style="border:1px solid #444;padding:8px;">Kecerdasan Buatan (AI)</th>
            </tr>
            </thead>
            <tbody>
            <tr style="background:#f9f9f9;">
                <td style="border:1px solid #555;padding:8px;"><b>Asal-usul</b></td>
                <td style="border:1px solid #555;padding:8px;">Terbentuk secara alami melalui proses biologis dan pengalaman hidup</td>
                <td style="border:1px solid #555;padding:8px;">Dibuat oleh manusia menggunakan program komputer dan data</td>
            </tr>
            <tr>
                <td style="border:1px solid #555;padding:8px;"><b>Cara Belajar</b></td>
                <td style="border:1px solid #555;padding:8px;">Belajar dari pengalaman, pengamatan, dan interaksi langsung</td>
                <td style="border:1px solid #555;padding:8px;">Belajar dari data yang dimasukkan dan contoh yang diberikan</td>
            </tr>
            <tr style="background:#f9f9f9;">
                <td style="border:1px solid #555;padding:8px;"><b>Kemampuan Berpikir</b></td>
                <td style="border:1px solid #555;padding:8px;">Bisa berpikir kreatif, fleksibel, dan menghasilkan ide baru</td>
                <td style="border:1px solid #555;padding:8px;">Hanya memproses data dan mengikuti pola yang sudah dipelajari</td>
            </tr>
            <tr>
                <td style="border:1px solid #555;padding:8px;"><b>Perasaan & Kesadaran</b></td>
                <td style="border:1px solid #555;padding:8px;">Memiliki perasaan, empati, dan kesadaran diri</td>
                <td style="border:1px solid #555;padding:8px;">Tidak memiliki perasaan atau kesadaran diri</td>
            </tr>
            <tr style="background:#f9f9f9;">
                <td style="border:1px solid #555;padding:8px;"><b>Adaptasi</b></td>
                <td style="border:1px solid #555;padding:8px;">Mudah menyesuaikan diri dengan situasi baru</td>
                <td style="border:1px solid #555;padding:8px;">Terbatas pada tugas atau bidang yang diprogram</td>
            </tr>
            <tr>
                <td style="border:1px solid #555;padding:8px;"><b>Kecepatan Mengolah Informasi</b></td>
                <td style="border:1px solid #555;padding:8px;">Lebih lambat dalam menghitung data besar</td>
                <td style="border:1px solid #555;padding:8px;">Sangat cepat dalam mengolah data dalam jumlah besar</td>
            </tr>
            <tr style="background:#f9f9f9;">
                <td style="border:1px solid #555;padding:8px;"><b>Pemahaman Konteks</b></td>
                <td style="border:1px solid #555;padding:8px;">Memahami makna, situasi, dan maksud secara mendalam</td>
                <td style="border:1px solid #555;padding:8px;">Memahami berdasarkan data, sering kali secara harfiah</td>
            </tr>
            <tr>
                <td style="border:1px solid #555;padding:8px;"><b>Ketergantungan</b></td>
                <td style="border:1px solid #555;padding:8px;">Dapat berpikir mandiri tanpa program</td>
                <td style="border:1px solid #555;padding:8px;">Sangat bergantung pada data, listrik, dan program</td>
            </tr>
            </tbody>
        </table>
    </div>
    <br>

    <p class="style1">Pada materi ini, kamu akan mempelajari bagaimana komputer dapat "berpikir" secara teknis, meskipun sebenarnya yang terjadi adalah proses komputasi. Proses tersebut melibatkan beberapa tahapan penting, yaitu <b>data</b> sebagai bahan utama, <b>algoritma</b> sebagai langkah-langkah pemrosesan, <b><i>machine learning</i></b> sebagai metode belajar dari data, serta <b><i>computational thinking</i></b> sebagai cara berpikir logis dan sistematis dalam memecahkan masalah.</p>

    {{-- KOTAK AKTIVITAS --}}
    <div class="activity-identify">
        <div class="activity-identify-header">
            Melalui aktivitas berikut, coba identifikasi mana yang <b>dilakukan manusia</b>
            dan mana yang <b>dilakukan komputer</b>.
        </div>
        <table class="identify-table">
            <thead>
            <tr>
                <th>Situasi</th>
                <th>Manusia</th>
                <th>Komputer</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="situation">1. Menonton video di YouTube dan memilih video baru</td>
                <td class="center"><span class="choice-circle" data-q="1" data-ans="manusia"></span></td>
                <td class="center"><span class="choice-circle" data-q="1" data-ans="komputer"></span></td>
            </tr>
            <tr>
                <td class="situation">2. HP membuka kunci lewat wajah</td>
                <td class="center"><span class="choice-circle" data-q="2" data-ans="manusia"></span></td>
                <td class="center"><span class="choice-circle" data-q="2" data-ans="komputer"></span></td>
            </tr>
            <tr>
                <td class="situation">3. Memisahkan baju putih dan berwarna sebelum mencuci</td>
                <td class="center"><span class="choice-circle" data-q="3" data-ans="manusia"></span></td>
                <td class="center"><span class="choice-circle" data-q="3" data-ans="komputer"></span></td>
            </tr>
            <tr>
                <td class="situation">4. Google Maps menunjukkan jalan tercepat ke sekolah</td>
                <td class="center"><span class="choice-circle" data-q="4" data-ans="manusia"></span></td>
                <td class="center"><span class="choice-circle" data-q="4" data-ans="komputer"></span></td>
            </tr>
            </tbody>
        </table>
        <div class="check-wrapper">
            <button id="btn-check" class="btn-check-answer">Cek Jawaban</button>
        </div>
    </div>

    {{-- FEEDBACK --}}
    <div id="feedback-container" class="feedback-container">
        <div id="feedback-q1" class="feedback-item"></div>
        <div id="feedback-q2" class="feedback-item"></div>
        <div id="feedback-q3" class="feedback-item"></div>
        <div id="feedback-q4" class="feedback-item"></div>
        <div id="feedback-summary" class="feedback-summary">
            <p style="font-size:15px">Ada empat hal penting yang menjadi dasar <b>Cara Komputer "Berpikir"</b>:</p>
            <ol>
                <li style="font-size:15px"><b>Data</b> — bahan bakar utama komputer untuk berpikir.</li>
                <li style="font-size:15px"><b>Algoritma</b> — langkah-langkah logis dalam menyelesaikan masalah.</li>
                <li style="font-size:15px"><b><i>Machine Learning</i></b> — kemampuan komputer untuk belajar dari data.</li>
                <li style="font-size:15px"><b><i>Computational Thinking</i></b> — cara berpikir logis yang meniru proses berpikir komputer.</li>
            </ol>
        </div>
    </div>

    {{-- MODAL --}}
    <div id="modal-overlay" class="modal-overlay">
        <div class="modal-box">
            <div id="modal-icon" class="modal-icon">
                <i class="fa-solid fa-check icon-success"></i>
                <i class="fa-solid fa-xmark icon-error"></i>
            </div>
            <h2 id="modal-title">Benar</h2>
            <p id="modal-text">Semua jawabanmu sudah tepat!</p>
            <button id="modal-close" class="modal-btn">Tutup</button>
        </div>
    </div>

    <div class="bottom-bar">
        <a href="{{ route('materi.data') }}" class="btn-next">
            Materi Selanjutnya <i class="fa-solid fa-arrow-right"></i>
        </a>
    </div>

</div>
@endsection

@push('scripts')
<script>
const correctAnswers = { 1:"manusia", 2:"komputer", 3:"manusia", 4:"komputer" };
const feedbackTexts = {
    1: { title:"Bagus!", text:"Kamu tepat. YouTube memang memberi rekomendasi lewat komputer, tapi keputusan akhirnya tetap manusia yang memilih." },
    2: { title:"Mantap!", text:"HP menggunakan teknologi pengenalan wajah yang bekerja berdasarkan algoritma dan data." },
    3: { title:"Benar!", text:"Ini aktivitas yang butuh pengalaman dan penilaian manusia. Komputer tidak bisa melakukannya tanpa bantuan robot khusus." },
    4: { title:"Tepat sekali!", text:"Google Maps menghitung jalur tercepat menggunakan algoritma dan data lalu lintas secara real-time." }
};
const totalQuestions = 4;

document.querySelectorAll('.choice-circle').forEach(circle => {
    circle.addEventListener('click', () => {
        const row = circle.closest('tr');
        row.querySelectorAll('.choice-circle').forEach(c => c.classList.remove('active'));
        circle.classList.add('active');
    });
});

const modalOverlay = document.getElementById('modal-overlay');
const modalIcon    = document.getElementById('modal-icon');
const modalTitle   = document.getElementById('modal-title');
const modalText    = document.getElementById('modal-text');
const modalClose   = document.getElementById('modal-close');

function openModal(type, title, text){
    modalIcon.classList.remove('success','error');
    modalIcon.classList.add(type);
    modalTitle.textContent = title;
    modalText.textContent  = text;
    modalOverlay.classList.add('show');
}
function closeModal(){ modalOverlay.classList.remove('show'); }
modalClose.addEventListener('click', closeModal);
modalOverlay.addEventListener('click', e => { if(e.target === modalOverlay) closeModal(); });

function resetUI(){
    document.querySelectorAll('.choice-circle').forEach(el => el.classList.remove('is-correct'));
    for(let q=1; q<=totalQuestions; q++){
        const fb = document.getElementById('feedback-q'+q);
        if(fb) fb.innerHTML = "";
    }
    document.getElementById('feedback-container').style.display = 'none';
}

document.getElementById('btn-check').addEventListener('click', () => {
    const chosen = {};
    let allAnswered = true;

    for(let q=1; q<=totalQuestions; q++){
        const selected = document.querySelector(`.choice-circle.active[data-q="${q}"]`);
        if(!selected){ allAnswered = false; break; }
        chosen[q] = selected.dataset.ans;
    }

    if(!allAnswered){
        resetUI();
        openModal("error","Belum lengkap","Masih ada soal yang belum kamu jawab. Silakan pilih jawaban untuk semua situasi.");
        return;
    }

    let allCorrect = true;
    for(let q=1; q<=totalQuestions; q++){
        if(chosen[q] !== correctAnswers[q]){ allCorrect = false; break; }
    }

    if(!allCorrect){
        resetUI();
        openModal("error","Masih ada yang kurang tepat","Beberapa jawabanmu belum tepat. Coba cek lagi siapa yang melakukan tindakan utama.");
        return;
    }

    document.querySelectorAll('.choice-circle.active').forEach(el => el.classList.add('is-correct'));
    for(let q=1; q<=totalQuestions; q++){
        const f = feedbackTexts[q];
        const fb = document.getElementById('feedback-q'+q);
        if(fb) fb.innerHTML = '<div class="feedback-box correct"><strong>'+f.title+'</strong> '+f.text+'</div>';
    }
    document.getElementById('feedback-container').style.display = 'block';
    openModal("success","Benar","Keren! Semua jawabanmu sudah tepat. Lihat penjelasan di bawah.");
});
</script>
@endpush