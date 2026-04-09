@extends('layouts.siswa')

@section('title', 'Data: Dataset dan Labeling')

@section('topbar', 'Data: Bahan Bakar Utama Kecerdasan Buatan')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Alata&family=Itim&family=Kumbh+Sans:wght,YOPQ@100..900,300&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

<style>
.card{
  padding: 15px;
  padding-top: 8px;
  border-radius: 20px;
  position: relative;
}

.card h3{
  color: #0f172a;
  font-size: 22px;
  margin-top: 0;
  margin-bottom: 12px;
}

.card p{
  color: #334155;
  line-height: 1.6;
}

.status{
  margin: 14px 0;
  padding: 12px;
  border-radius: 12px;
  background: #ecfeff;
  color: #0f766e;
  font-weight: 700;
}

.card ol{
  padding-left: 20px;
}

.card ol li{
  margin-bottom: 8px;
}

input[type="file"]{
  margin-top: 10px;
  padding: 10px;
  background: #f1f5f9;
  border-radius: 12px;
  border: 1px dashed #94a3b8;
  width: 100%;
}

button{
  margin-top: 14px;
  padding: 12px 20px;
  border: none;
  border-radius: 999px;
  background: linear-gradient(135deg, #006A67, #0891b2);
  color: #ffffff;
  font-weight: 700;
  cursor: pointer;
  transition: transform .2s ease, box-shadow .2s ease;
}

button:hover{
  transform: translateY(-2px);
  box-shadow: 0 6px 18px rgba(0,0,0,.15);
}

button:disabled{
  background: #94a3b8;
  cursor: not-allowed;
  box-shadow: none;
  transform: none;
}

#preview{
  display: block;
  margin: 16px auto;
  max-width: 260px;
  border-radius: 16px;
  border: 2px solid #e5e7eb;
  box-shadow: 0 6px 18px rgba(0,0,0,.12);
}

.result{
  margin-top: 16px;
  padding: 16px;
  background: #f8fafc;
  border-radius: 16px;
  border-left: 6px solid #006A67;
  font-weight: 600;
  color: #0f172a;
}

.hint{
  margin-top: 12px;
  font-size: 13px;
  color: #64748b;
  background: #f1f5f9;
  padding: 10px 14px;
  border-radius: 12px;
}

.insight-btn {
    position: absolute;
    top: -20px; /* ⬅ ubah */
    right: -20px; /* ⬅ ubah */
    transform: none; /* ⬅ hapus translate */

    width: 70px;
    height: 70px;

    border-radius: 50%;
    border: 6px solid white;
    background: linear-gradient(135deg, #006A67, #0891b2);
    color: white;

    font-size: 26px;

    display: flex;
    align-items: center;
    justify-content: center;

    box-shadow: 0 10px 25px rgba(0,106,103,0.4);
    cursor: pointer;

    transition: all .3s ease;
    animation: pulseGlow 2.5s infinite;
}

@keyframes pulseGlow {
    0% { box-shadow: 0 0 0 0 rgba(8,145,178,0.6); }
    70% { box-shadow: 0 0 0 15px rgba(8,145,178,0); }
    100% { box-shadow: 0 0 0 0 rgba(8,145,178,0); }
}

.insight-btn:hover {
    transform: translate(-50%, -50%) scale(1.08);
    box-shadow: 0 0 25px rgba(15,118,110,0.6);
}

.insight-modal {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.5);
    justify-content: center;
    align-items: center;
    z-index: 99999;
}

.insight-card {
    background: white;
    width: 500px;
    border-radius: 20px;
    padding: 25px;
    position: relative;
    animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
    from { transform: scale(0.9); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
}

.close-btn {
    position: absolute;
    top: 12px;
    right: 12px;

    width: 36px;
    height: 36px;

    border-radius: 50%;
    border: none;

    background: transparent;
    color: #64748b;

    font-size: 18px;
    font-weight: bold;

    display: flex;
    align-items: center;
    justify-content: center;

    cursor: pointer;
    transition: all .2s ease;
}

.insight-content {
    display: flex;
    gap: 15px;
}

.insight-icon img {
    width: 90px;
    animation: float 2s infinite ease-in-out;
}

@keyframes float {
    0%,100% { transform: translateY(0); }
    50% { transform: translateY(-5px); }
}

.page {
    display: none;
}
.page.active {
    display: block;
}

.dots {
    margin-top: 15px;
    text-align: center;
}

.dot {
    height: 8px;
    width: 8px;
    margin: 0 3px;
    background-color: #ccc;
    border-radius: 50%;
    display: inline-block;
}

.dot.active {
    background-color: #16a085;
}

#nextBtn {
    margin-top: 15px;
    background: #16a085;
    color: white;
    border: none;
    padding: 8px 15px;
    border-radius: 10px;
    cursor: pointer;
    align-self: flex-end;
}
@media (max-width: 600px){

  /* BUTTON INSIGHT */
  .insight-btn{
    width: 50px;
    height: 50px;
    font-size: 16px;

    top: -15px;
    right: -15px;

    transform: none;
  }

  /* MODAL */
  .insight-card{
    width: 90%;
    max-height: 80vh; 
    overflow-y: auto;
    padding: 16px;
  }

  .insight-content{
    flex-direction: column;
    text-align: center;
  }

  .insight-icon img{
    width: 50px;
  }

  /* CARD */
  .card{
    padding: 12px;
  }

  .card h3{
    font-size: 16px;
  }

  .card p{
    font-size: 12px;
  }

  .status{
    font-size: 12px;
  }

  /* BUTTON */
  button{
    padding: 10px 14px;
    font-size: 12px;
  }

}
</style>
@endpush

@section('content')
<div class="content-card">
    <h3>3. Dataset dan Labeling</h3>
    <p class="style-materi">
        Untuk melatih kecerdasan buatan, data yang digunakan harus diorganisir dan diberi petunjuk agar dapat dipahami oleh mesin.
        Proses ini melibatkan dua hal penting, yaitu dataset dan labeling.
    </p>
    <p class="style-materi">
        <b>Dataset</b> adalah kumpulan data yang telah dikumpulkan dari berbagai sumber dan siap digunakan untuk pelatihan kecerdasan buatan. Bayangkan kamu
        ingin mengajarkan komputer untuk mengenali gambar kucing dan anjing. Maka kamu perlu menyiapkan banyak gambar kucing dan anjing — itulah yang disebut dataset.
    </p>
    <p class="style-materi">
        Sementara itu, <b>labeling</b> adalah proses memberi nama atau kategori pada data agar model kecerdasan buatan dapat memahami konteksnya. Misalnya, sebuah foto diberi
        label "anjing" agar kecerdasan buatan mengetahui bahwa gambar tersebut menampilkan seekor anjing. Dalam konteks machine learning, pelabelan data dilakukan untuk memberikan makna pada data mentah, sehingga model dapat belajar mengenali pola dan membuat prediksi yang lebih akurat.
    </p>

    <section class="activity-frame">
        <div id="insightButton" class="insight-btn">
            💡
        </div>

        <div id="insightModal" class="insight-modal">
            <div class="insight-card">
                <button class="close-btn" onclick="closeInsight()">✕</button>
                <div class="insight-content">

                    <!-- ICON -->
                    <div class="insight-icon">
                        <img src="{{ asset('img/insight.png') }}" alt="icon">
                    </div>

                    <!-- TEXT CONTENT -->
                    <div class="insight-text">

                        <!-- PAGE 1 -->
                        <div class="page active">
                            <h3>👀 Tahukah Kamu?</h3>
                            <img src="{{ asset('img/logoTM.png') }}" alt="Teachable Machine Logo" style="width:200px; height:auto; display:block; margin:auto;">
                            <p style="font-size: 12px">Model kecerdasan buatan pada simulasi ini dilatih menggunakan dataset gambar dan diimplementasikan dalam media pembelajaran melalui <b>Teachable Machine</b>.
                            Teachable Machine adalah platform berbasis web dari Google yang memungkinkan kita melatih model kecerdasan buatan tanpa perlu coding. Dengan Teachable Machine, pengguna dapat melatih komputer mengenali gambar, suara, atau gerakan menggunakan contoh data yang diberikan. Pada simulasi ini, model kecerdasan buatan dibuat menggunakan Teachable Machine untuk melatih komputer mengenali gambar tertentu berdasarkan dataset yang telah dipelajari sebelumnya.</p>
                        </div>

                        <!-- PAGE 2 -->
                        <div class="page">
                            <h3>🧠 Bagaimana Cara Kerjanya?</h3>
                            <p style="font-size: 12px">1. Mengumpulkan gambar</p>
                            <p style="font-size: 12px">2. Memberi label pada gambar</p>
                            <p style="font-size: 12px">3. Model belajar mengenali pola</p>
                            <p style="font-size: 12px">4. Menguji gambar baru untuk diprediksi</p>
                        </div>

                        <!-- PAGE 3 -->
                        <div class="page">
                            <h3>🤖 Contoh Penggunaan</h3>
                            <p style="font-size: 12px">- Memprediksi gambar berdasarkan kemiripan</p>
                            <p style="font-size: 12px">- Membedakan sampah organik dan anorganik</p>
                            <p style="font-size: 12px">- Mengenali ekspresi wajah</p>
                            <p style="font-size: 12px">- Mendeteksi gerakan tangan</p>
                            <p style="font-size: 12px">Pada simulasi ini, model sudah dilatih sebelumnya.</p>
                        </div>

                        <!-- DOT INDICATOR -->
                        <div class="dots">
                            <span class="dot active"></span>
                            <span class="dot"></span>
                            <span class="dot"></span>
                        </div>

                        <!-- NEXT BUTTON -->
                        <button id="nextBtn" onclick="nextPage()">Next ➜</button>

                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <h3>Simulasi Kecerdasan Buatan: Mengenali Gambar</h3>
            <p>
                Pada aktivitas ini, kamu akan menggunakan sebuah model kecerdasan buatan yang telah dilatih sebelumnya menggunakan dataset gambar yang sudah diberi label. Dataset tersebut membantu komputer mempelajari pola dan membedakan satu objek dengan objek lainnya. Ketika sebuah gambar ditampilkan, komputer tidak menebak secara acak, melainkan membandingkan gambar tersebut dengan data berlabel yang pernah dipelajarinya.
            </p>

            <!-- TOMBOL UNDUH CONTOH -->
            <a href="{{ asset('contoh-gambar/contoh-gambar.zip') }}" download>
                <button type="button">⬇ Unduh Contoh Gambar</button>
            </a>

            <p class="hint">
                Catatan: Setelah diunduh, <b>ekstrak file ZIP</b> terlebih dahulu sebelum meng-upload gambar.
            </p>

            <div class="status" id="status">⏳ Memuat model kecerdasan buatan...</div>

            <p><b>Langkah:</b></p>
            <ol>
                <li>Unduh dan ekstrak contoh gambar. (Klik kanan file .zip → pilih Extract All/Extract Here → Klik Extract)</li>
                <li>Upload satu gambar (pilih salah satu pada folder tersebut).</li>
                <li>Klik <b>Prediksi</b> untuk melihat hasil kecerdasan buatan.</li>
            </ol>

            <input type="file" id="file" accept="image/*">
            <br>
            <button id="btn" disabled>Prediksi</button>

            <div>
                <img id="preview" alt="preview" style="display:none; max-width:280px; margin-top:12px;">
            </div>

            <div class="result" id="hasil">
                Hasil prediksi akan muncul di sini.
            </div>

            <p class="hint" id="hint" style="display:none;">
                Mengapa tidak 100%? Kecerdasan buatan tidak “melihat” gambar seperti manusia, melainkan mencocokkannya dengan pola dari data yang telah dipelajari. Persentase yang muncul menunjukkan tingkat keyakinan terhadap hasil prediksi. Jadi, meskipun prediksi tertinggi dipilih, tetap ada kemungkinan kecil kemiripan dengan objek lain karena AI hanya mengenali pola, bukan benar-benar memahami gambar.</p>
        </div>
    </section>

    <p class="style-materi">Dari aktivitas tadi, kamu telah memahami bahwa proses labeling memegang peranan sangat penting dalam pembelajaran mesin karena label berfungsi sebagai petunjuk bagi komputer untuk belajar mengenali pola. Komputer hanya dapat mengenali gambar karena sebelumnya dilatih menggunakan dataset yang sudah diberi label, sehingga tanpa dataset yang cukup dan label yang jelas, kecerdasan buatan tidak akan mampu membedakan satu objek dengan objek lainnya. Meskipun sebuah prediksi kecerdasan buatan terkadang terlihat sangat tinggi, kecerdasan buatan sebenarnya tidak pernah benar-benar "pasti" atau "yakin sepenuhnya", karena cara kerjanya didasarkan pada perhitungan peluang (probabilitas), bukan pemahaman seperti manusia.</p>

    <div class="case-title">
        Contoh Kasus: <b>"Komputer Jadi Detektif Wajah"</b>
    </div>
    <p style="font-size:13px; line-height:1.9;"><b>Ilustrasi:</b> Pernah pakai HP yang bisa terbuka hanya dengan melihat wajahmu? Sekilas terlihat canggih, seolah-olah HP "mengenal" kamu. Tapi sebenarnya, HP tidak benar-benar tahu siapa kamu—ia hanya <b>belajar dari data.</b></p>

    <figure class="img-figure">
        <img src="{{ asset('img/ilustrasi1.png') }}" alt="Gambar 5 Ilustrasi Komputer Mendeteksi Wajah">
        <figcaption><i>Gambar 5 Ilustrasi Komputer Mendeteksi Wajah</i></figcaption>
    </figure>

    <p style="font-size:13px; line-height:1.9;"><b>Penjelasan:</b> Agar HP bisa mengenali wajahmu, dibutuhkan dataset berupa kumpulan foto wajah dari berbagai kondisi. Setiap foto diberi label (penanda) seperti “pemilik HP” agar komputer memahami maknanya. Dari data ini, komputer mempelajari pola wajah dan menggunakannya untuk mencocokkan saat kamu membuka HP. Jika cocok, HP terbuka; jika tidak, tetap terkunci. Namun, kesalahan pada data atau label bisa membuat komputer salah mengenali wajah yang pada akhir berakibat:</p>
    <ul>
        <li>Pemilik HP tidak dikenali</li>
        <li>Orang lain malah bisa membuka HP</li>
    </ul>
</div>

<div class="bottom-bar">
    <a href="{{ route('quiz.show', ['quiz' => 1]) }}" class="btn-next">
        Materi Selanjutnya
        <i class="fa-solid fa-arrow-right"></i>
    </a>
</div>
@endsection

@push('scripts')
<script>
  const buttons = document.querySelectorAll(".label-btn");
  const feedback = document.getElementById("labeling-feedback");

  if (buttons.length && feedback) {
    buttons.forEach(btn => {
      btn.addEventListener("click", () => {
        const status = btn.dataset.answer;

        feedback.style.display = "block";
        feedback.classList.remove("ok", "bad");

        if (status === "benar") {
          feedback.classList.add("ok");
          feedback.innerHTML = `
            <b>Benar!</b><br>
            Proses ini sama seperti saat manusia melatih AI.<br>
            Jika labelnya benar, AI belajar dengan baik.<br>
            Jika labelnya salah, AI jadi salah mengenali.
          `;
        } else {
          feedback.classList.add("bad");
          feedback.innerHTML = `
            <b>Belum tepat.</b><br>
            Coba perhatikan ciri-ciri hewan pada gambar dengan lebih teliti.
          `;
        }
      });
    });
  }
</script>

<!-- LIBRARY TEACHABLE MACHINE -->
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest/dist/tf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@latest/dist/teachablemachine-image.min.js"></script>

<script>
  const MODEL_URL = "https://teachablemachine.withgoogle.com/models/zxlahJoI8/";
  let model = null;
  let imageReady = false;

  const statusEl  = document.getElementById("status");
  const hasilEl   = document.getElementById("hasil");
  const fileEl    = document.getElementById("file");
  const btnEl     = document.getElementById("btn");
  const previewEl = document.getElementById("preview");

  async function loadModel(){
    try{
      statusEl.textContent = "⏳ Mengunduh model AI...";
      model = await tmImage.load(
        MODEL_URL + "model.json",
        MODEL_URL + "metadata.json"
      );
      statusEl.textContent = "✅ Model siap. Silakan upload gambar.";
    } catch(err) {
      statusEl.textContent = "❌ Model gagal dimuat.";
    }
  }
  loadModel();

  fileEl.addEventListener("change", () => {
    const file = fileEl.files[0];
    if(!file) return;

    imageReady = false;
    btnEl.disabled = true;
    hasilEl.textContent = "Gambar sedang dimuat...";

    const url = URL.createObjectURL(file);
    previewEl.onload = () => {
      imageReady = true;
      btnEl.disabled = false;
      hasilEl.textContent = "Gambar siap diprediksi.";
      URL.revokeObjectURL(url);
    };
    previewEl.src = url;
    previewEl.style.display = "block";
  });

  btnEl.addEventListener("click", async () => {
    if(!model || !imageReady) return;

    btnEl.disabled = true;
    hasilEl.innerHTML = "AI sedang menganalisis gambar...";

    const predictions = await model.predict(previewEl);

    let html = "<b>Hasil Prediksi AI:</b><br>";
    predictions.forEach(p => {
      html += `${p.className}: ${Math.round(p.probability * 100)}%<br>`;
    });

    hasilEl.innerHTML = html;
    btnEl.disabled = false;
    document.getElementById('hint').style.display = 'block';
  });
</script>

<script>
let currentPage = 0;
const pages   = document.querySelectorAll('.page');
const dots    = document.querySelectorAll('.dot');
const modal   = document.getElementById('insightModal');
const insightBtn = document.getElementById('insightButton');
const nextBtn = document.getElementById('nextBtn');

insightBtn.addEventListener('click', () => {
    modal.style.display = 'flex';
    updateButton();
});

function closeInsight(){
    modal.style.display = 'none';
    currentPage = 0;
    resetPages();
}

function nextPage(){
    if(currentPage === pages.length - 1){
        closeInsight();
        return;
    }

    pages[currentPage].classList.remove('active');
    dots[currentPage].classList.remove('active');

    currentPage++;

    pages[currentPage].classList.add('active');
    dots[currentPage].classList.add('active');

    updateButton();
}

function updateButton(){
    nextBtn.innerHTML = (currentPage === pages.length - 1) ? "Selesai" : "Next ➜";
}

function resetPages(){
    pages.forEach(p => p.classList.remove('active'));
    dots.forEach(d => d.classList.remove('active'));

    pages[0].classList.add('active');
    dots[0].classList.add('active');

    nextBtn.innerHTML = "Next ➜";
}
</script>
@endpush