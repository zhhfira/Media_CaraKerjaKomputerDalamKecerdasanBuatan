@extends('layouts.siswa')

@section('title', 'Model Pohon Keputusan dalam Machine Learning')

@section('topbar', 'Proses Pembelajaran Mesin dalam Sistem Komputer')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Alata&family=Itim&family=Kumbh+Sans:wght,YOPQ@100..900,300&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

<style>
/* ===== Visual Decision Tree (prefix dtv-) ===== */
.activity-frame .dtv-wrap{
  border:1px solid rgba(255,255,255,.15);
  background:rgba(255,255,255,.04);
  border-radius:16px;
  padding:16px;
}

.activity-frame .dtv-head{
  display:flex;
  justify-content:space-between;
  align-items:flex-start;
  gap:12px;
  margin-bottom:12px;
}

.activity-frame .dtv-title{ margin-top: -20px; font-size:18px; font-weight:800; }
.activity-frame .dtv-sub{ margin:6px 0 13px; font-size:13px; opacity:.85; line-height:1.5; }

.activity-frame .dtv-badge{
  padding:8px 10px;
  border-radius:999px;
  border:1px solid rgba(255,255,255,.15);
  background:rgba(255,255,255,.06);
  font-size:12px;
  white-space:nowrap;
  opacity:.9;
}

.activity-frame .dtv-main{
  display:grid;
  grid-template-columns: 1.3fr .9fr;
  gap:14px;
}
@media (max-width: 900px){
  .activity-frame .dtv-main{ grid-template-columns: 1fr; }
}

.activity-frame .dtv-treeCard,
.activity-frame .dtv-panelCard,
.activity-frame .dtv-pathCard{
  border:1px solid rgba(255,255,255,.15);
  background:rgba(0,0,0,.12);
  border-radius:14px;
  padding:12px;
}

.activity-frame .dtv-treeTop{
  display:flex;
  justify-content:space-between;
  align-items:center;
  gap:10px;
  margin-bottom:10px;
}
.activity-frame .dtv-small{ font-size:12px; opacity:.8; }

.activity-frame .dtv-mini{
  border:1px solid rgba(255,255,255,.15);
  background:rgba(255,255,255,.06);
  color:inherit;
  padding:7px 9px;
  border-radius:10px;
  font-size:12px;
  cursor:pointer;
}

.activity-frame .dtv-svg{
  width:100%;
  height:auto;
  display:block;
  border-radius:12px;
  background:rgba(255,255,255,.03);
  border:1px dashed rgba(255,255,255,.12);
  padding:8px;
}

.activity-frame .dtv-legend{
  display:flex;
  gap:12px;
  align-items:center;
  margin-top:10px;
  font-size:12px;
  opacity:.85;
}
.activity-frame .dtv-dot{
  width:10px; height:10px; border-radius:999px; display:inline-block;
  border:2px solid rgba(255,255,255,.20);
}
.activity-frame .dtv-dot.is-current{ background:#7c5cff; border-color: rgba(124,92,255,.7); }
.activity-frame .dtv-dot.is-path{ background:#22c55e; border-color: rgba(34,197,94,.7); }

.activity-frame .dtv-panel{
  display:grid;
  gap:14px;
  align-content:start;
}

.activity-frame .dtv-label{ font-size:12px; opacity:.75; margin-bottom:6px; }
.activity-frame .dtv-q{
  font-size:18px;
  font-weight:900;
  line-height:1.25;
  margin-bottom:8px;
  animation: dtvFade .2s ease;
}
.activity-frame .dtv-hint{
  font-size:13px;
  line-height:1.5;
  opacity:.85;
  margin-bottom:12px;
  animation: dtvFade .2s ease;
}
@keyframes dtvFade{
  from{ opacity:0; transform:translateY(6px); }
  to{ opacity:1; transform:translateY(0); }
}

.activity-frame .dtv-actions{
  display:flex;
  gap:10px;
  flex-wrap:wrap;
  align-items:center;
}

.activity-frame .dtv-btn{
  border:1px solid rgba(255,255,255,.15);
  background:rgba(255,255,255,.06);
  color:inherit;
  padding:10px 12px;
  border-radius:12px;
  font-weight:800;
  cursor:pointer;
  transition: transform .08s ease, opacity .2s ease, background .2s ease;
}
.activity-frame .dtv-btn:hover{ background:rgba(255,255,255,.10); }
.activity-frame .dtv-btn:active{ transform:translateY(1px); }

.activity-frame .dtv-btn.yes{ border-color:rgba(34,197,94,.55); background:rgba(34,197,94,.16); }
.activity-frame .dtv-btn.no { border-color:rgba(239,68,68,.55); background:rgba(239,68,68,.14); }
.activity-frame .dtv-btn.ghost{ font-size:12px; padding:9px 10px; opacity:.85; }

.activity-frame .dtv-result{
  margin-top:12px;
  border:1px solid rgba(255,255,255,.15);
  background:rgba(124,92,255,.10);
  border-radius:14px;
  padding:12px;
  display:none;
}
.activity-frame .dtv-result.show{ display:block; }

.activity-frame .dtv-tag{
  display:inline-block;
  font-size:12px;
  font-weight:900;
  padding:6px 10px;
  border-radius:999px;
  border:1px solid rgba(255,255,255,.15);
  background:rgba(255,255,255,.06);
  margin-bottom:8px;
}
.activity-frame .dtv-rTitle{ font-size:18px; font-weight:900; margin-bottom:6px; }
.activity-frame .dtv-rDesc{ font-size:13px; opacity:.9; line-height:1.55; }

.activity-frame .dtv-pathHead{
  display:flex;
  justify-content:space-between;
  align-items:center;
  gap:10px;
  margin-bottom:10px;
}
.activity-frame .dtv-path{
  display:flex;
  flex-wrap:wrap;
  gap:8px;
}
.activity-frame .dtv-pill{
  border:1px solid rgba(255,255,255,.15);
  background:rgba(255,255,255,.05);
  padding:7px 10px;
  border-radius:999px;
  font-size:12px;
  opacity:.9;
}

/* ===== SVG styles ===== */
.activity-frame .dtv-link{
  stroke: rgba(255,255,255,.25);
  stroke-width: 2.2;
}
.activity-frame .dtv-link.path{
  stroke: rgba(34,197,94,.95);
  stroke-width: 3.2;
}

.activity-frame .dtv-nodeCircle{
  fill: rgba(255,255,255,.06);
  stroke: rgba(255,255,255,.25);
  stroke-width: 2.2;
}
.activity-frame .dtv-nodeCircle.current{
  fill: rgba(124,92,255,.35);
  stroke: rgba(124,92,255,.95);
  stroke-width: 3.2;
}
.activity-frame .dtv-nodeCircle.visited{
  fill: rgba(34,197,94,.16);
  stroke: rgba(34,197,94,.8);
}

.activity-frame .dtv-nodeText{
  fill: rgba(255,255,255,.90);
  font-size: 12px;
  font-weight: 800;
  text-anchor: middle;
  dominant-baseline: middle;
}
.activity-frame .dtv-nodeMini{
  fill: rgba(255,255,255,.70);
  font-size: 10px;
  font-weight: 700;
  text-anchor: middle;
  dominant-baseline: middle;
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
    <h3 class="content-title">4. Model Pohon Keputusan dalam <i>Machine Learning</i></h3>
    <p class="style-materi">
        Model pohon keputusan <i>(decision tree)</i> merupakan salah satu teknik klasifikasi dalam bidang data <i>mining</i>, yaitu proses menggali pengetahuan <i>(knowledge)</i> dari sekumpulan data.
        Pohon Keputusan <i>(Decision Tree)</i> adalah salah satu algoritma yang membuat komputer mampu mengambil keputusan selangkah demi selangkah, hampir seperti manusia saat sedang bernalar. Disebut "pohon" karena bentuk alurnya bercabang seperti batang pohon yang memiliki cabang-cabang kecil. Setiap jawaban mengarahkan komputer ke langkah berikutnya hingga diperoleh keputusan akhir. Cara kerjanya mirip permainan tebak-tebakan, di mana setiap pertanyaan mempersempit pilihan sampai ditemukan jawaban yang paling sesuai.
    </p>

    <section class="activity-frame">
        <div class="dtv-wrap">
            <div class="dtv-head">
                <div>
                    <h3 class="dtv-title">Aktivitas Interaktif: Pohon Keputusan 🌳</h3>
                    <p class="dtv-sub">Klik <b>Ya/Tidak</b> untuk menelusuri cabang. Jalur keputusan akan menyala.</p>
                    <p class="dtv-sub">Pada aktivitas ini, kamu diajak untuk memahami cara kerja pohon keputusan (decision tree) melalui simulasi interaktif. Pohon keputusan merupakan salah satu cara komputer atau sistem kecerdasan buatan mengambil keputusan secara bertahap berdasarkan pertanyaan dan jawaban yang diberikan.
                    <br><br>
                    Kamu akan menelusuri pohon keputusan dengan menjawab pertanyaan menggunakan pilihan <b>Ya</b> atau <b>Tidak</b>. Setiap jawaban akan menentukan cabang yang dilalui dan mengarahkan ke pertanyaan berikutnya. Proses ini terus berlangsung hingga kamu mencapai keputusan akhir berupa jenis hewan yang sesuai dengan ciri-ciri yang dipilih.
                    Melalui aktivitas ini, kamu dapat memahami bahwa:
                    <ul class="dtv-sub">
                        <li>Setiap node pada pohon keputusan merepresentasikan pertanyaan.</li>
                        <li>Setiap cabang menunjukkan pilihan jawaban (Ya/Tidak).</li>
                        <li>Jalur keputusan terbentuk dari rangkaian jawaban yang dipilih.</li>
                        <li>Keputusan akhir diperoleh setelah semua pertanyaan relevan terjawab.</li>
                    </ul>
                    </p>
                </div>
                <div class="dtv-badge" id="dtvStep">Langkah 1</div>
            </div>

            <div class="dtv-main">
                <!-- VISUAL TREE -->
                <div class="dtv-treeCard">
                    <div class="dtv-treeTop">
                        <span class="dtv-small">Visual Pohon</span>
                        <button type="button" class="dtv-mini" id="dtvReset">⟲ Ulangi</button>
                    </div>

                    <svg class="dtv-svg" id="dtvSvg" viewBox="0 0 860 420" role="img" aria-label="Pohon keputusan visual"></svg>

                    <div class="dtv-legend">
                        <span class="dtv-dot is-current"></span> Node aktif
                        <span class="dtv-dot is-path"></span> Jalur terpilih
                    </div>
                </div>

                <!-- Q/A PANEL -->
                <div class="dtv-panel">
                    <div class="dtv-panelCard">
                        <div class="dtv-label">Pertanyaan</div>
                        <div class="dtv-q" id="dtvQ">...</div>
                        <div class="dtv-hint" id="dtvHint">Klik Ya/Tidak untuk lanjut.</div>

                        <div class="dtv-actions">
                            <button type="button" class="dtv-btn yes" id="dtvYes">✅ Ya</button>
                            <button type="button" class="dtv-btn no" id="dtvNo">❌ Tidak</button>
                            <button type="button" class="dtv-btn ghost" id="dtvBack">↩ Kembali</button>
                        </div>

                        <div class="dtv-result" id="dtvResult">
                            <div class="dtv-tag">Hasil</div>
                            <div class="dtv-rTitle" id="dtvRTitle">...</div>
                            <div class="dtv-rDesc" id="dtvRDesc">...</div>
                        </div>
                    </div>

                    <div class="dtv-pathCard">
                        <div class="dtv-pathHead">
                            <b>Jalur Keputusan</b>
                        </div>
                        <div class="dtv-path" id="dtvPath"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <p class="style-materi">
        Cara ini persis seperti cara kerja pohon keputusan dalam kecerdasan buatan. Komputer tidak langsung memberikan jawaban—ia harus mengikuti rangkaian pertanyaan yang sudah disusun secara logis, bertingkat, dan berurutan. Setiap jawaban akan membawa komputer ke cabang tertentu, hingga akhirnya komputer sampai pada jawaban akhir. Komputer tidak memiliki insting seperti manusia, jadi ia tidak bisa langsung menebak tanpa bukti. Karena itu, pohon keputusan membantu komputer "memecah" masalah menjadi pertanyaan-pertanyaan kecil yang lebih mudah dijawab. Setiap pertanyaan membantu komputer menyaring kemungkinan yang mungkin benar dan membuang yang salah. Proses menyaring kemungkinan inilah yang membuat pohon keputusan sangat efektif.
    </p>
</div>

<div class="bottom-bar">
    <a href="{{ route('quiz.show',  ['quiz' => 3]) }}" class="btn-next">
        Uji Pemahamanmu!
        <i class="fa-solid fa-arrow-right"></i>
    </a>
</div>
@endsection

@push('scripts')
<script>
const MATERI_KEY = "ml.pohon"; 

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
// ===== DATA TREE =====
const DTV = {
    start: "n1",
    nodes: {
        n1:      { type:"q",    label:"Q1", q:"Apakah hewannya menyusui anaknya?",     hint:"Ciri mamalia: menyusui.",                                             yes:"n2",      no:"n5",      x:430, y:60  },
        n2:      { type:"q",    label:"Q2", q:"Apakah biasa dipelihara di rumah?",      hint:"Pet vs liar.",                                    yes:"n3",      no:"n4",      x:250, y:160 },
        n5:      { type:"q",    label:"Q3", q:"Apakah hewan ini hidup di air?",         hint:"Bukan mamalia → cek habitat.",                                       yes:"fish",    no:"n6",      x:610, y:160 },
        n3:      { type:"q",    label:"Q4", q:"Apakah hewan ini mengeong?",             hint:"Suara khas bisa jadi fitur pembeda.",                                yes:"cat",     no:"dog",     x:150, y:270 },
        n4:      { type:"q",    label:"Q5", q:"Apakah hewan ini hidup di laut?",        hint:"Habitat adalah fitur penting.",                                      yes:"dolphin", no:"tiger",   x:350, y:270 },
        n6:      { type:"q",    label:"Q6", q:"Apakah hewan ini punya sayap?",          hint:"Sayap → mengarah ke burung.",                       yes:"bird",    no:"lizard",  x:700, y:270 },
        cat:     { type:"leaf", label:"🐱", title:"Kucing",       desc:"Mamalia peliharaan yang mengeong.",                                    x:90,  y:370 },
        dog:     { type:"leaf", label:"🐶", title:"Anjing",       desc:"Mamalia peliharaan yang tidak mengeong.",                              x:210, y:370 },
        dolphin: { type:"leaf", label:"🐬", title:"Lumba-lumba",  desc:"Mamalia yang hidup di laut.",                                         x:310, y:370 },
        tiger:   { type:"leaf", label:"🐯", title:"Harimau",      desc:"Mamalia liar darat.",                              x:390, y:370 },
        fish:    { type:"leaf", label:"🐟", title:"Ikan",         desc:"Tidak menyusui dan hidup di air.",                                    x:550, y:370 },
        bird:    { type:"leaf", label:"🐦", title:"Burung",       desc:"Tidak menyusui dan punya sayap.",                                     x:650, y:370 },
        lizard:  { type:"leaf", label:"🦎", title:"Kadal",        desc:"Tidak menyusui, tidak hidup di air, tidak bersayap.",                 x:770, y:370 }
    }
};

// ===== ELEMENTS =====
const svg     = document.getElementById("dtvSvg");
const dtvQ    = document.getElementById("dtvQ");
const dtvHint = document.getElementById("dtvHint");
const dtvStep = document.getElementById("dtvStep");

const btnYes   = document.getElementById("dtvYes");
const btnNo    = document.getElementById("dtvNo");
const btnBack  = document.getElementById("dtvBack");
const btnReset = document.getElementById("dtvReset");

const resultBox = document.getElementById("dtvResult");
const rTitle    = document.getElementById("dtvRTitle");
const rDesc     = document.getElementById("dtvRDesc");

const pathBox = document.getElementById("dtvPath");

// ===== STATE =====
const state = {
    current: DTV.start,
    history: [] // {from, answer, to}
};

// ===== SVG BUILD =====
function el(tag, attrs = {}){
    const n = document.createElementNS("http://www.w3.org/2000/svg", tag);
    for(const k in attrs) n.setAttribute(k, attrs[k]);
    return n;
}

function buildTree(){
    svg.innerHTML = "";

    // Links first (so nodes appear on top)
    for(const id in DTV.nodes){
        const node = DTV.nodes[id];
        if(node.type !== "q") continue;

        const yesNode = DTV.nodes[node.yes];
        const noNode  = DTV.nodes[node.no];

        svg.appendChild(
            el("line", { x1: node.x, y1: node.y+22, x2: yesNode.x, y2: yesNode.y-22, "class":"dtv-link", "data-from":id, "data-to":node.yes, "data-ans":"yes" })
        );
        svg.appendChild(
            el("line", { x1: node.x, y1: node.y+22, x2: noNode.x,  y2: noNode.y-22,  "class":"dtv-link", "data-from":id, "data-to":node.no,  "data-ans":"no"  })
        );

        const midYesX = (node.x + yesNode.x) / 2;
        const midYesY = (node.y + yesNode.y) / 2;
        const midNoX  = (node.x + noNode.x)  / 2;
        const midNoY  = (node.y + noNode.y)  / 2;

        const tYes = el("text", { x: midYesX, y: midYesY-4, "class":"dtv-nodeMini" });
        tYes.textContent = "Ya";
        svg.appendChild(tYes);

        const tNo = el("text", { x: midNoX, y: midNoY-4, "class":"dtv-nodeMini" });
        tNo.textContent = "Tidak";
        svg.appendChild(tNo);
    }

    // Nodes
    for(const id in DTV.nodes){
        const node = DTV.nodes[id];

        const g = el("g", { "data-id": id, style: "cursor:pointer" });

        const circle = el("circle", {
            cx: node.x, cy: node.y, r: 22,
            "class": "dtv-nodeCircle",
            "data-circle": id
        });

        const text = el("text", {
            x: node.x, y: node.y,
            "class": "dtv-nodeText",
            "data-text": id
        });

        text.textContent = node.label || id;

        g.appendChild(circle);
        g.appendChild(text);

        g.addEventListener("click", () => {
            const visitedIds = new Set([DTV.start, ...state.history.map(h => h.to), ...state.history.map(h => h.from)]);
            if(id === state.current || visitedIds.has(id)){
                state.current = id;
                render();
            }
        });

        svg.appendChild(g);
    }
}

// ===== RENDER =====
function isLeaf(id){ return DTV.nodes[id]?.type === "leaf"; }

function render(){
    const node = DTV.nodes[state.current];

    dtvStep.textContent = isLeaf(state.current) ? "Selesai" : `Langkah ${state.history.length + 1}`;

    if(isLeaf(state.current)){
        resultBox.classList.add("show");
        dtvQ.textContent   = "Keputusan akhir ditemukan ✅";
        dtvHint.textContent = "Klik Kembali untuk mengubah jawaban, atau Ulangi untuk mulai lagi.";

        rTitle.textContent = `${node.title} ${node.label || ""}`.trim();
        rDesc.textContent  = node.desc;

        btnYes.disabled = true;
        btnNo.disabled  = true;
        btnYes.style.opacity = .55;
        btnNo.style.opacity  = .55;
    } else {
        resultBox.classList.remove("show");
        dtvQ.textContent   = node.q;
        dtvHint.textContent = node.hint || "Klik Ya/Tidak untuk lanjut.";

        btnYes.disabled = false;
        btnNo.disabled  = false;
        btnYes.style.opacity = 1;
        btnNo.style.opacity  = 1;
    }

    btnBack.disabled     = state.history.length === 0;
    btnBack.style.opacity = btnBack.disabled ? .55 : 1;

    renderPath();
    highlightSvg();
}

function renderPath(){
    pathBox.innerHTML = "";
    state.history.forEach((h, i) => {
        const pill = document.createElement("div");
        pill.className   = "dtv-pill";
        pill.textContent = `${i+1}. ${h.answer === "yes" ? "✅ Ya" : "❌ Tidak"}`;
        pathBox.appendChild(pill);
    });
    if(state.history.length === 0){
        const pill = document.createElement("div");
        pill.className   = "dtv-pill";
        pill.textContent = "Belum ada jawaban.";
        pathBox.appendChild(pill);
    }
}

function highlightSvg(){
    svg.querySelectorAll(".dtv-link").forEach(l => l.classList.remove("path"));
    svg.querySelectorAll(".dtv-nodeCircle").forEach(c => {
        c.classList.remove("current");
        c.classList.remove("visited");
    });

    const visited = new Set([DTV.start]);
    state.history.forEach(h => { visited.add(h.from); visited.add(h.to); });

    visited.forEach(id => {
        const c = svg.querySelector(`[data-circle="${id}"]`);
        if(c) c.classList.add("visited");
    });

    const curr = svg.querySelector(`[data-circle="${state.current}"]`);
    if(curr) curr.classList.add("current");

    state.history.forEach(h => {
        const line = svg.querySelector(`.dtv-link[data-from="${h.from}"][data-to="${h.to}"][data-ans="${h.answer}"]`);
        if(line) line.classList.add("path");
    });
}

// ===== NAVIGATION =====
function go(ans){
    const node = DTV.nodes[state.current];
    if(!node || node.type !== "q") return;

    const next = ans === "yes" ? node.yes : node.no;
    state.history.push({ from: state.current, answer: ans, to: next });
    state.current = next;
    render();
}

function back(){
    if(state.history.length === 0) return;
    const last    = state.history.pop();
    state.current = last.from;
    render();
}

function resetAll(){
    state.current = DTV.start;
    state.history = [];
    render();
}

// ===== EVENTS =====
btnYes.addEventListener("click",   () => go("yes"));
btnNo.addEventListener("click",    () => go("no"));
btnBack.addEventListener("click",  back);
btnReset.addEventListener("click", resetAll);

// Init
buildTree();
render();
</script>
@endpush