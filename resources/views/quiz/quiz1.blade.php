<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alata&family=Itim&family=Kumbh+Sans:wght,YOPQ@100..900,300&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

  <title>Kuis</title>

  <style>
    :root{
      --bg:#c7dcdc;
      --card:#fff;
      --text:#1f2a24;
      --muted:#5b6a61;
      --brand:#000B58;
      --ok:#1e8e5a;
      --danger:#e23d3d;
      --info:#006A67;
      --line:rgba(0,0,0,.12);
      --r:16px;
    }

    *{box-sizing:border-box}
    body{
      font-size: 14px;
      margin:0;
      font-family: "Poppins", system-ui, Segoe UI, Arial;
      background:var(--bg);
      color:var(--text);
      min-height:100vh;
      display:flex;
      justify-content:center;
      align-items:flex-start;
      padding:16px;
    }

    .app{
      width: min(900px, 100%);
    }

    /* layout */
    .grid2{display:grid;grid-template-columns:1fr 1fr;gap:16px}
    @media(max-width:900px){.grid2{grid-template-columns:1fr}}
    .quizWrap{display:grid;grid-template-columns:1.2fr .8fr;gap:16px}
    @media(max-width:980px){.quizWrap{grid-template-columns:1fr}}

    .card,.quizLeft,.panel,.resultCard{
      background:var(--card);
      border:1px solid var(--line);
      border-radius:12px;
    }

    .dashed{outline:2px dashed rgba(0,0,0,.35);outline-offset:-12px}

    .cardHeader{padding:12px;text-align:center}
    .headerBadge{
      display:inline-block;
      background:var(--brand);
      color:#fff;
      padding:8px 14px;
      border-radius:999px;
      font-weight:800;
      font-size: 14px;
    }
    .cardBody{padding:16px 20px 18px}

    /* helper pill */
    .inlinePill{
      display:inline-block;
      background:var(--ok);
      color:#fff;
      padding:4px 10px;
      border-radius:10px;
      font-weight:800;
      font-size:13px;
      transform: translateY(-1px);
    }

    /* button */
    .btn{
      border:0;
      padding:8px 12px;
      border-radius:10px;
      font-weight:700;
      cursor:pointer;
      font-size: 13px;
    }
    .btn-primary{background:var(--ok);color:#fff}
    .btn-danger{background:var(--danger);color:#fff}
    .btn-info{background:var(--info);color:#fff}
    .btn-ghost{background:#fff;border:1px solid var(--line);color:var(--text)}
    .actions{display:flex;gap:10px;justify-content:center;flex-wrap:wrap;margin-top:14px}

    /* inputs */
    .input{
      width:100%;
      padding:8px 10px;
      border-radius:10px;
      border:1px solid rgba(0,0,0,.15);
      font-weight:700;
      outline:none;
      background:#fff;
      font-size: 13px;
    }
    .input:focus{border-color: rgba(27,115,232,.45)}
    .input[readonly]{background:#f7f7f7}

    /* quiz */
    .quizTop{
      padding:10px 12px;
      display:flex;
      justify-content:space-between;
      align-items:center;
      border-bottom:1px solid var(--line);
      gap:12px;
    }
    .pill{
      display:inline-block;
      background:var(--brand);
      color:#fff;
      padding:8px 12px;
      border-radius:999px;
      font-weight:900;
      white-space:nowrap;
      font-size: 13px;
    }
    .timer{
      padding:6px 10px;
      border:2px dashed rgba(0,0,0,.25);
      border-radius:10px;
      font-weight:900;
      min-width:80px;
      text-align:center;
      background:#fff;
      font-size: 13px;
    }

    .quizBody{padding:16px}
    .qNumber{font-size:13px;font-weight:900;margin:0 0 10px}
    .qText{margin:0 0 10px;line-height:1.6;padding-bottom:10px;border-bottom:1px solid var(--line)}

    .options{display:flex;flex-direction:column;gap:10px;margin-top:12px}
    .opt{
      display:flex;
      gap:10px;
      align-items:center;
      padding:10px;
      border:1px solid var(--line);
      border-radius:12px;
      cursor:pointer;
      font-size: 13px;
    }
    .opt input{width:16px;height:16px}

    .quizNav{
      padding:14px 16px;
      border-top:1px solid var(--line);
      display:flex;
      gap:10px;
      justify-content:center;
      flex-wrap:wrap
    }

    /* right panel */
    .panelHeader{
      background:var(--brand);
      color:#fff;
      text-align:center;
      padding:12px;
      font-weight:900;
      border-top-left-radius: var(--r);
      border-top-right-radius: var(--r);
    }
    .panelBody{padding:12px}

    .numGrid{display:grid;grid-template-columns:repeat(4,1fr);gap:10px;margin-top:10px}
    .numBtn{
      padding:8px 0;
      border-radius:9px;
      border:1px solid var(--line);
      background:#fff;
      font-weight:900;
      cursor:pointer;
      font-size: 13px;
    }
    .numBtn.active{outline:2px solid rgba(201,162,91,.5)}
    .numBtn.answered{background:var(--brand);color:#fff;border-color:transparent}

    .legend{margin-top:12px;padding-top:12px;border-top:1px solid var(--line);font-size:14px;color:var(--muted);font-weight:700}
    .tag{display:inline-block;padding:6px 10px;border-radius:10px;border:1px solid var(--line);background:#fff}
    .tag.brown{background:var(--brand);color:#fff;border-color:transparent}

    /* result */
    .resultHead{padding:12px;font-size: 15px;text-align:center;font-weight:900;border-bottom:1px solid var(--line)}
    .resultBody{padding:12px}
    .scoreBig{display:block;margin:25px auto 15px auto;padding:8px 12px;border-radius:12px;border:1px solid var(--line);background: linear-gradient(135deg,#f6f2e9,#e8e0d0);box-shadow: 0 4px 10px rgba(0,0,0,.08);font-weight:900;font-size: 20px;width:fit-content;text-align:center;}
    .resultMsg{
      margin-top:15px;
      text-align:center;
      font-size:16px;    
      font-weight:700;
    }
    .resultTable{width:100%;border-collapse:collapse}
    .resultTable td{padding:10px 6px;border-bottom:1px solid rgba(0,0,0,.06)}
    .resultTable td:nth-child(1){width:38%;color:var(--muted);font-weight:800}
    .resultTable td:nth-child(2){width:6%;text-align:center;color:var(--muted);font-weight:800}

    .page{display:none}
    .page.active{display:block}

    .singleIntro{
      max-width:860px;
      margin: 0 auto;
    }
    .cardHeader.bar{
      text-align:left;
      background: var(--info);
      color:#fff;
      border-top-left-radius: var(--r);
      border-top-right-radius: var(--r);
      padding:14px 18px;
      font-weight:900;
      font-size:20px;
    }
    .cardHeader.bar .headerBadge{display:none} /* biar tidak double */
    .cardBody.instruction p{margin: 0 0 12px; line-height:1.7}
    .cardFooter{
      border-top:1px solid var(--line);
      padding:12px 14px;
      display:flex;
      justify-content:flex-end;
      gap:10px;
      flex-wrap:wrap;
    }
    /* Modal sederhana */
.modal{
  position:fixed;
  inset:0;
  background:rgba(0,0,0,0.4);
  display:none;
  justify-content:center;
  align-items:center;
}

.modal-content{
  background:#fff;
  padding:40px 25px;   
  border-radius:20px;
  width:80%;           
  max-width:350px;     
  text-align:center;
}
.modal-icon{
  width:70px;
  height:70px;
  margin:0 auto 20px;
  border-radius:50%;
  border:4px solid #f4b183;
  display:flex;
  align-items:center;
  justify-content:center;
  font-size:32px;
  font-weight:bold;
  color:#f4b183;
}
.modal-btn{
  margin-top:15px;
  display:flex;
  justify-content:center;
  gap:10px;
}

.modal button{
  padding:10px 15px;
  border:none;
  border-radius:5px;
  cursor:pointer;
}

#confirmFinish{background:#1e8e5a;color:#fff;}
#cancelFinish{background:#e23d3d;color:#fff;}
  </style>
</head>

<body>
  <div class="app">

    <!-- PAGE 1: INSTRUKSI (1 KOTAK SAJA) -->
    <section class="page" id="pageIntro">
      <div class="card singleIntro">

        <div class="cardHeader bar">
          Instruksi Kuis {{ $quiz->title ?? '' }}
        </div>

        <div class="cardBody instruction">
          <p>Kamu akan mengerjakan kuis <b>{{ $quiz->title ?? 'Kuis' }}</b></p>

          <p>
            Waktu yang disediakan untuk menjawab adalah
            <b><span id="introDuration">-</span> menit</b>,
            Kriteria Ketuntasan Minimal (KKM) yang harus dicapai adalah
            <b>{{ $quiz->kkm ?? '-' }}</b>.
          </p>

          <p style="margin-top:14px;font-weight:800">Berikut petunjuk pelaksanaannya:</p>
          <ul style="margin-top:10px; line-height:1.8;">
            <li>Pastikan perangkat terhubung ke internet dengan koneksi yang stabil.</li>
            <li>Baca soal dengan teliti.</li>
            <li>Atur waktu dengan baik agar semua soal terjawab sebelum waktu habis.</li>
            <li>Jangan keluar atau berpindah aplikasi selama kuis berlangsung.</li>
            <li>Setelah waktu habis, aplikasi akan otomatis menyimpan jawaban.</li>
          </ul>

          <!-- Nama siswa otomatis dari login -->
          <input id="inpName" type="hidden" value="{{ Auth::user()->username }}">
          <input id="inpClass" type="hidden" value="{{ Auth::user()->kelas }}">

        </div>

        <div class="cardFooter">
          <button class="btn btn-danger" id="btnCancel" type="button">Batal</button>
          <button class="btn btn-info" id="btnStartFromIntro" type="button">Kerjakan Kuis</button>
        </div>

      </div>
    </section>

    <!-- PAGE 2: QUIZ -->
    <section class="page" id="pageQuiz">
      <div class="quizWrap">

        <div class="quizLeft">
          <div class="quizTop">
            <div class="quizTitle">
              <div class="pill" id="quizTitle">KUIS</div>
            </div>
            <div class="timer" id="timer">--:--</div>
          </div>

          <div class="quizBody">
            <div class="qNumber" id="qNumber">Nomor -</div>
            <div class="qText" id="qText">Teks soal...</div>
            
            <img id="qImage" src="" alt="Gambar Soal"
                style="display:none;max-width:100%;border-radius:10px;margin:10px 0;">

            <div class="options" id="options"></div>
          </div>

          <div class="quizNav">
            <button class="btn btn-info" id="btnPrev" type="button">Sebelumnya</button>
            <button class="btn btn-primary" id="btnNext" type="button">Selanjutnya</button>
          </div>
        </div>

        <aside class="panel">
          <div class="panelHeader">NO SOAL</div>
          <div class="panelBody">
            <div class="numGrid" id="numGrid"></div>

            <div class="legend">
              Keterangan:
              <div style="margin-top:10px;">
                <span class="tag">Putih</span> = Belum dijawab
              </div>
              <div style="margin-top:10px;">
                <span class="tag brown">Biru</span> = Sudah dijawab
              </div>
            </div>

            <div class="actions" style="margin-top:16px;">
              <button class="btn btn-danger" id="btnFinish" type="button">SELESAI</button>
            </div>
          </div>
        </aside>

      </div>
    </section>

    <!-- PAGE 3: RESULT -->
    <section class="page" id="pageResult">
      <div class="resultCard">
        <div class="resultHead">Hasil Kuis</div>
        <div class="resultBody">
          <div class="resultInner">
            <table class="resultTable">
              <tr><td>Nama Siswa</td><td>:</td><td id="rName">-</td></tr>
              <tr><td>Kelas</td><td>:</td><td id="rClass">-</td></tr>
              <tr><td>Hari, Tgl</td><td>:</td><td id="rDate">-</td></tr>
              <tr><td>Waktu Mengerjakan</td><td>:</td><td id="duration">-</td></tr>
            </table>

            <div class="scoreBig" id="scoreBadge">Skor: -</div>
            <div class="resultMsg" id="resultMsg" style="margin-top:10px;color:var(--muted);font-weight:800;">
              -
            </div>

            <div class="actions" style="margin-top:18px;">
              <button class="btn btn-primary" id="btnRetry" type="button">
                <i class="fa fa-rotate-right"></i> Ulangi Kuis
              </button>
              <button class="btn btn-danger" id="btnPrevMaterial" type="button">
                <i class="fa fa-arrow-left"></i> Materi Sebelumnya
              </button>

              <button class="btn btn-info" id="btnNextMaterial" type="button">
                <i class="fa fa-arrow-right"></i> Materi Selanjutnya
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
<div id="finishModal" class="modal">
  <div class="modal-content">

    <div class="modal-icon">!</div>

    <h3>Apakah Anda yakin ingin menyelesaikan kuis?</h3>
    <p>Pastikan Anda telah menjawab semua pertanyaan dengan benar!</p>

    <div class="modal-btn">
      <button id="confirmFinish">Ya, Selesai</button>
      <button id="cancelFinish">Batal</button>
    </div>

  </div>
</div>
<script>
const EXISTING_ATTEMPT = @json($attempt ?? null);
</script>
@php
    $prevRoute = null;
    $nextRoute = null;

    switch($quiz->id) {
        case 1:
            $prevRoute = 'materi.data3';
            $nextRoute = 'materi.algoritma';
            break;

        case 2:
            $prevRoute = 'materi.algoritma2';
            $nextRoute = 'materi.ml';
            break;

        case 3:
            $prevRoute = 'materi.ml3';
            $nextRoute = 'materi.ct';
            break;
    }
@endphp
<script>
const QUIZ_DATA = @json($quiz);

const SETTINGS = {
  totalQuestions: QUIZ_DATA.questions?.length ?? 0,
  durationMinutes: Number(QUIZ_DATA.duration_minutes ?? 0),
  kkm: Number(QUIZ_DATA.kkm ?? 0),
};

const pageIntro  = document.getElementById("pageIntro");
const pageQuiz   = document.getElementById("pageQuiz");
const pageResult = document.getElementById("pageResult");

const introDuration = document.getElementById("introDuration");
const quizTitleEl   = document.getElementById("quizTitle");
const timerEl       = document.getElementById("timer");
const numGridEl     = document.getElementById("numGrid");
const inpName       = document.getElementById("inpName");
const inpClass = document.getElementById("inpClass");

const rName     = document.getElementById("rName");
const rClass = document.getElementById("rClass");
const rDate     = document.getElementById("rDate");
const rDuration = document.getElementById("duration");
const scoreBadge = document.getElementById("scoreBadge");
const resultMsg = document.getElementById("resultMsg");

introDuration.textContent = SETTINGS.durationMinutes;
quizTitleEl.textContent = "KUIS : " + (QUIZ_DATA.title ?? "");

function showPage(page){
  [pageIntro, pageQuiz, pageResult].forEach(p => p.classList.remove("active"));
  page.classList.add("active");
}

/* ================= TIMER ================= */

let timerId = null;
let startedAt = null;

function formatMMSS(seconds){
  const m = Math.floor(seconds / 60);
  const s = seconds % 60;
  return String(m).padStart(2,"0") + ":" + String(s).padStart(2,"0");
}

function startTimer(){
  startedAt = Date.now();
  let remaining = SETTINGS.durationMinutes * 60;

  timerEl.textContent = formatMMSS(remaining);

  timerId = setInterval(() => {
    remaining--;
    timerEl.textContent = formatMMSS(remaining);

    if(remaining <= 0){
      clearInterval(timerId);
      finishQuiz();
    }
  },1000);
}

function stopTimer(){
  if(timerId){
    clearInterval(timerId);
    timerId = null;
  }
}

/* ================= QUIZ ================= */

let currentIndex = 0;
let answers = {};
let answered = [];

function buildNumGrid(){
  numGridEl.innerHTML = "";
  answered = new Array(SETTINGS.totalQuestions).fill(false);

  for(let i=0;i<SETTINGS.totalQuestions;i++){
    const btn = document.createElement("button");
    btn.type = "button";
    btn.className = "numBtn";
    btn.textContent = i+1;

    btn.onclick = () => {
      currentIndex = i;
      renderQuestion(i);
      refreshNumGrid();
    };

    numGridEl.appendChild(btn);
  }

  refreshNumGrid();
}

function refreshNumGrid(){
  const buttons = numGridEl.querySelectorAll(".numBtn");

  buttons.forEach((b,i)=>{
    b.classList.toggle("active", i===currentIndex);
    b.classList.toggle("answered", answered[i]);
  });
}

function renderQuestion(index){
  const q = QUIZ_DATA.questions[index];

  document.getElementById("qNumber").textContent = "Nomor " + (index+1);
  document.getElementById("qText").textContent = q.question_text;

  // ← TAMBAHKAN: tampilkan gambar jika ada
  const imgEl = document.getElementById("qImage");
  if (q.question_image) {
    imgEl.src = "/storage/" + q.question_image;
    imgEl.style.display = "block";
  } else {
    imgEl.src = "";
    imgEl.style.display = "none";
  }

  const wrap = document.getElementById("options");
  wrap.innerHTML = "";

  q.options.forEach(opt=>{
    const label = document.createElement("label");
    label.className = "opt";

    label.innerHTML = `
      <input type="radio" name="opt_${q.id}" value="${opt.id}">
      <span><b>${opt.option_label}.</b> ${opt.option_text}</span>
    `;

    wrap.appendChild(label);
  });
}

document.getElementById("options").addEventListener("change",(e)=>{
  if(!e.target.matches("input[type='radio']")) return;

  const q = QUIZ_DATA.questions[currentIndex];
  answers[q.id] = Number(e.target.value);
  answered[currentIndex] = true;
  refreshNumGrid();
});

/* ================= SUBMIT ================= */

async function submitQuiz(){

  const csrf = document.querySelector('meta[name="csrf-token"]').content;
  const spentSeconds = startedAt ? Math.floor((Date.now() - startedAt)/1000) : 0;

  const response = await fetch("{{ route('quiz.submit', $quiz->id) }}",{
    method:"POST",
    headers:{
      "Content-Type":"application/json",
      "X-CSRF-TOKEN":csrf
    },
    body: JSON.stringify({
      answers: answers,
      spent_seconds: spentSeconds
    })
  });

  if(!response.ok){
    throw new Error("Submit gagal");
  }

  return await response.json();
}

/* ================= FINISH ================= */

async function finishQuiz(){

  stopTimer();

  const spent = startedAt ? Math.floor((Date.now() - startedAt)/1000) : 0;
  const menit = Math.floor(spent/60);
  const detik = spent%60;

  const now = new Date();
  const hari = ["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"][now.getDay()];
  const bulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"][now.getMonth()];

  rName.textContent = inpName.value;
  rClass.textContent = inpClass.value || "-";
  rDate.textContent = `${hari}, ${now.getDate()} ${bulan} ${now.getFullYear()}`;
  rDuration.textContent = `${menit} menit ${detik} detik`;

  try{
      const result = await submitQuiz();

      scoreBadge.textContent = "Skor: " + result.score;
      resultMsg.textContent = result.score >= SETTINGS.kkm
          ? "Lulus. Nilai memenuhi KKM."
          : "Belum memenuhi KKM. Silakan pelajari kembali.";

      // ── BADGE POPUP ─────────────────────────────────
      if (result.new_badge) {
          tampilkanPopupBadge(result.new_badge);
      }
      // ────────────────────────────────────────────────

  }catch(err){
      resultMsg.textContent = "Gagal submit.";
      console.error(err);
  }

  showPage(pageResult);
}

/* ================= BUTTON ================= */

document.getElementById("btnStartFromIntro").onclick = ()=>{
  showPage(pageQuiz);
  buildNumGrid();
  renderQuestion(0);
  startTimer();
};

const modal = document.getElementById("finishModal");
const confirmBtn = document.getElementById("confirmFinish");
const cancelBtn = document.getElementById("cancelFinish");

document.getElementById("btnFinish").onclick = function(){
  modal.style.display = "flex";
};

cancelBtn.onclick = function(){
  modal.style.display = "none";
};

confirmBtn.onclick = function(){
  modal.style.display = "none";
  finishQuiz();
};

document.getElementById("btnPrev").onclick = ()=>{
  if(currentIndex>0){
    currentIndex--;
    renderQuestion(currentIndex);
    refreshNumGrid();
  }
};

document.getElementById("btnNext").onclick = ()=>{
  if(currentIndex < SETTINGS.totalQuestions-1){
    currentIndex++;
    renderQuestion(currentIndex);
    refreshNumGrid();
  }
};

document.getElementById("btnCancel").onclick = ()=>{
  window.history.back();
};

document.getElementById("btnRetry").onclick = ()=>{
  resetQuiz();
  showPage(pageIntro);
};

@if($prevRoute)
document.getElementById("btnPrevMaterial").onclick = () => {
    window.location.href = "{{ route($prevRoute) }}";
};
@else
document.getElementById("btnPrevMaterial").style.display = "none";
@endif

@if($nextRoute)
document.getElementById("btnNextMaterial").onclick = () => {
    window.location.href = "{{ route($nextRoute) }}";
};
@else
document.getElementById("btnNextMaterial").style.display = "none";
@endif

timerEl.textContent = "--:--";

function resetQuiz(){

  // reset index ke nomor 1
  currentIndex = 0;

  // kosongkan jawaban
  answers = {};

  // reset status answered
  answered = new Array(SETTINGS.totalQuestions).fill(false);

  // reset timer
  stopTimer();
  timerEl.textContent = "--:--";

}
window.onload = function(){

  if (EXISTING_ATTEMPT) {

    rName.textContent = EXISTING_ATTEMPT.student_name;
    rClass.textContent = inpClass.value || "-";

    const finishedAt = new Date(EXISTING_ATTEMPT.finished_at);

    const hari = ["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"][finishedAt.getDay()];
    const bulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"][finishedAt.getMonth()];

    rDate.textContent = `${hari}, ${finishedAt.getDate()} ${bulan} ${finishedAt.getFullYear()}`;

if (EXISTING_ATTEMPT.started_at && EXISTING_ATTEMPT.finished_at) {

  const start = new Date(EXISTING_ATTEMPT.started_at);
  const end   = new Date(EXISTING_ATTEMPT.finished_at);

  const diffSeconds = Math.floor((end - start) / 1000);

  const menit = Math.floor(diffSeconds / 60);
  const detik = diffSeconds % 60;

  rDuration.textContent = `${menit} menit ${detik} detik`;

} else {
  rDuration.textContent = "-";
}
    scoreBadge.textContent = "Skor: " + EXISTING_ATTEMPT.score;

    resultMsg.textContent =
      EXISTING_ATTEMPT.score >= SETTINGS.kkm
      ? "Lulus. Nilai memenuhi KKM."
      : "Belum memenuhi KKM. Silakan pelajari kembali.";

    showPage(pageResult);

  } else {
    showPage(pageIntro);
  }

};

function tampilkanPopupBadge(badge) {
    const popup = document.createElement('div');
    popup.style.cssText = `
        position: fixed; inset: 0;
        background: rgba(0,0,0,0.5);
        display: flex; align-items: center; justify-content: center;
        z-index: 9999;
    `;
    popup.innerHTML = `
        <div style="background: white; border-radius: 16px; padding: 2rem;
                    text-align: center; max-width: 280px; width: 90%;
                    font-family: Poppins, sans-serif;">
            <p style="font-weight: 700; font-size: 1.1rem; margin: 0 0 0.5rem;">
                Badge Baru Didapat!
            </p>
            <img src="/img/badges/${badge.image}"
                 style="width: 100px; height: 100px; margin: 1rem auto; display: block;">
            <p style="color: #555; margin-bottom: 1rem; font-weight: 600;">
                ${badge.name}
            </p>
            <button onclick="this.closest('div').parentElement.remove()"
                    style="padding: 0.5rem 1.5rem; background: #1e8e5a;
                           color: white; border: none; border-radius: 8px;
                           cursor: pointer; font-weight: 700; font-family: Poppins, sans-serif;">
                Terima Badge
            </button>
        </div>
    `;
    document.body.appendChild(popup);
}
</script>
</body>
</html>
