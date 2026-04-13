@extends('layouts.guru')

@section('title', 'Data Nilai Siswa')
@section('topbar', 'Data Nilai Siswa')

@push('styles')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.29/jspdf.plugin.autotable.min.js"></script>
<style>
.toolbar{
    display:flex; gap:10px; flex-wrap:wrap;
    justify-content:space-between; align-items:center;
    margin-bottom:14px;
}
.search{
    display:flex; gap:10px; align-items:center;
    flex-wrap:wrap; flex:1;
}
.search input{
    padding:10px 12px; border-radius:10px;
    border:1px solid rgba(0,0,0,.15); outline:none;
    flex:1; min-width:0;
    font-weight:700; box-sizing:border-box;
}
.filter-select{
    padding:10px 12px; border-radius:10px;
    border:1px solid rgba(0,0,0,.15); font-weight:700;
    min-width:220px; outline:none; background:#fff;
}
.table-wrap{
    width:100%; overflow-x:auto;
    -webkit-overflow-scrolling:touch;
    border:1px solid rgba(0,0,0,.08); border-radius:12px;
}
.table{
    border-collapse:collapse;
    width:100%; min-width:640px;
    background:#fff;
}
.table th, .table td{
    padding:10px 12px; border-bottom:1px solid rgba(0,0,0,.06);
    text-align:left; font-size:13px; white-space:nowrap;
}
.table th{ font-weight:800; background:rgba(0,0,0,.03); }
.badge{
    display:inline-block; padding:4px 8px;
    border-radius:999px; font-weight:800; font-size:11px;
    border:1px solid rgba(0,0,0,.12); background:#fff;
}
.badge.ok{ border-color:rgba(30,142,90,.35); }
.badge.bad{ border-color:rgba(226,61,61,.35); }
.popup-bubble{
    display:none;
    position:fixed;
    z-index:99999;
    background:#fff;
    border-radius:16px;
    box-shadow:0 8px 40px rgba(0,0,0,0.3);
    padding:20px;
    width:90vw; max-width:680px;
    max-height:75vh; overflow-y:auto;
    border:1px solid rgba(0,0,0,.08);
    box-sizing:border-box;
}
.popup-content table{
    width:100%; border-collapse:collapse;
    font-size:13px; min-width:360px;
}
.popup-content th{
    font-weight:900; text-align:left;
    padding:8px 6px; border-bottom:1px solid rgba(0,0,0,.08);
    white-space:nowrap;
}
.popup-content td{ padding:8px 6px; vertical-align:top; }
.detail-btn{ background:none; border:none; cursor:pointer; font-size:18px; }
#pagination{
    display:flex; flex-wrap:wrap;
    gap:4px; justify-content:flex-end;
}
@media(max-width:600px){
    .toolbar{ flex-direction:column; align-items:stretch; }
    .search{ width:100%; flex-direction:column; }
    .filter-select{ min-width:0; width:100%; }
    .table th, .table td{ font-size:11px; padding:8px; }
}
</style>
@endpush

@section('content')
<div class="content-card">
    <div class="toolbar">
        <div>
            <div style="font-weight:900;font-size:20px">Rekap Nilai Siswa</div>
            <div style="margin-top:6px;font-weight:700;color:#555">
                Tampilkan
                <select id="rowsPerPage" style="padding:6px 10px;border-radius:8px;font-weight:700;">
                    <option value="5">5</option>
                    <option value="10" selected>10</option>
                    <option value="25">25</option>
                </select>
                data per halaman
            </div>
        </div>
        <div class="search">
            <input type="text" id="searchInput" placeholder="Cari nama siswa..." oninput="filterRows(this.value)">
            
            <select id="kelasFilter" onchange="filterRows()"
            style="padding:10px 12px;border-radius:10px;border:1px solid rgba(0,0,0,.15);
                   font-weight:700;background:#fff;outline:none;">
            <option value="">Semua Kelas</option>
            @foreach($rekap->pluck('kelas')->unique()->filter()->sort() as $kelas)
                <option value="{{ $kelas }}">Kelas {{ $kelas }}</option>
            @endforeach
            </select>

            <button onclick="exportPDF()"
                style="padding:10px 14px;border-radius:10px;font-weight:400;
                       background:#1e8e5a;color:#fff;border:none;cursor:pointer;">
                <i class="fa-solid fa-file-pdf"></i> Export PDF
            </button>
        </div>
    </div>

    <div class="table-wrap">
        <table class="table" id="nilaiTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Kuis 1</th>
                    <th>Kuis 2</th>
                    <th>Kuis 3</th>
                    <th>Kuis 4</th>
                    <th>Evaluasi</th>
                    <th>Rata-rata</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rekap as $i => $r)
                <tr data-kelas="{{ $r->kelas }}">
                    <td>{{ $i+1 }}</td>
                    <td><b>{{ $r->student_name }}</b></td>
                    <td>{{ $r->kelas ?? '-' }}</td>
                    <td>{{ $r->kuis1 ?? '-' }}</td>
                    <td>{{ $r->kuis2 ?? '-' }}</td>
                    <td>{{ $r->kuis3 ?? '-' }}</td>
                    <td>{{ $r->kuis4 ?? '-' }}</td>
                    <td>{{ $r->evaluasi ?? '-' }}</td>
                    <td><b>{{ $r->rata_rata }}</b></td>
                    <td style="position:relative">
                        <button class="detail-btn" onclick="openBubble(event, {{ $i }})">
                            <i class="fa-solid fa-circle-info"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div style="display:flex;justify-content:space-between;align-items:center;margin-top:12px;">
            <div id="info" style="font-weight:700;color:#555"></div>
            <div id="pagination"></div>
        </div>
    </div>

    {{-- POPUP BUBBLE --}}
    <div id="globalBubble" class="popup-bubble">
        <div class="popup-content">
            <div>
                <b>Detail Nilai Siswa</b><br>
                Nama Siswa : <b id="popupStudentName">-</b>
            </div>
            <br>
            <table>
                <thead>
                    <tr>
                        <th>Kuis</th>
                        <th>Skor</th>
                        <th>Status KKM</th>
                        <th>Waktu Mengerjakan</th>
                        <th>Durasi Pengerjaan</th>
                    </tr>
                </thead>
                <tbody id="popupBody"></tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// ===== DATA DARI BLADE =====
const dataDetails = @json($rekap);
const rekapData   = @json($rekap);

// ===== FILTER =====
let selectedQuizId = "";

function applyFilters() {
    const keyword = (document.getElementById("searchInput")?.value || "").toLowerCase();
    const rows    = document.querySelectorAll("#nilaiTable tbody tr");
    rows.forEach(r => {
        const name   = (r.children[1]?.textContent || "").toLowerCase();
        const quizId = r.children[2]?.getAttribute("data-quiz-id") || "";
        const okName = name.includes(keyword);
        const okQuiz = !selectedQuizId || quizId === selectedQuizId;
        r.style.display = (okName && okQuiz) ? "" : "none";
    });
}

function filterRows() {
    const keyword = (document.getElementById("searchInput")?.value || "").toLowerCase();
    const kelas   = document.getElementById("kelasFilter")?.value || "";
    const rows    = document.querySelectorAll("#nilaiTable tbody tr");

    rows.forEach(r => {
        const name    = (r.children[1]?.textContent || "").toLowerCase();
        const okName  = name.includes(keyword);
        const okKelas = !kelas || r.getAttribute("data-kelas") === kelas;
        r.style.display = (okName && okKelas) ? "" : "none";
    });
}

// ===== POPUP BUBBLE =====
function openBubble(e, index) {
    e.stopPropagation();

    const bubble        = document.getElementById('globalBubble');
    const body          = document.getElementById('popupBody');
    const studentNameEl = document.getElementById('popupStudentName');

    body.innerHTML = '';
    studentNameEl.textContent = dataDetails[index].student_name;

    dataDetails[index].details.forEach(d => {
        body.innerHTML += `
            <tr>
                <td>${d.quiz}</td>
                <td>${d.score}</td>
                <td><span class="badge ${d.status === 'Memenuhi' ? 'ok' : 'bad'}">${d.status}</span></td>
                <td>${d.waktu_kerjakan ?? '-'}</td>
                <td>${d.time ?? '-'}</td>
            </tr>`;
    });

    /* Reset dulu semua style posisi */
    bubble.style.cssText = 'display:block; visibility:hidden; position:fixed; z-index:99999;';

    if (window.innerWidth <= 600) {
        bubble.style.top       = '50%';
        bubble.style.left      = '50%';
        bubble.style.transform = 'translate(-50%, -50%)';
        bubble.style.width     = '92vw';
    } else {
        const rect = e.target.closest('button').getBoundingClientRect();
        const bw   = bubble.offsetWidth;
        const bh   = bubble.offsetHeight;

        /* Semua koordinat relatif viewport karena position:fixed */
        let top  = rect.bottom + 8;
        let left = rect.left;

        if (left + bw > window.innerWidth - 16) left = window.innerWidth - bw - 16;
        if (left < 8) left = 8;
        if (top + bh > window.innerHeight - 16) top = rect.top - bh - 8;
        if (top < 8) top = 8;

        bubble.style.top   = top + 'px';
        bubble.style.left  = left + 'px';
        bubble.style.width = '90vw';
    }

    bubble.style.visibility = 'visible';
}

document.addEventListener('click', () => {
    document.getElementById('globalBubble').style.display = 'none';
});

// ===== EXPORT PDF =====
window.exportPDF = function () {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF('l');
    let y = 15;

    doc.setFontSize(16);
    doc.text("Rekap Nilai Siswa", 14, y);
    y += 8;

    const rekapHead = [["No","Nama","Kuis 1","Kuis 2","Kuis 3","Kuis 4","Evaluasi","Rata-rata"]];
    const rekapBody = rekapData.map((r, i) => [
        i+1, r.student_name,
        r.kuis1 ?? '-', r.kuis2 ?? '-',
        r.kuis3 ?? '-', r.kuis4 ?? '-',
        r.evaluasi ?? '-', r.rata_rata
    ]);

    doc.autoTable({
        startY: y,
        head: rekapHead,
        body: rekapBody,
        styles: { fontSize: 9 },
        headStyles: { fillColor: [30,142,90] }
    });

    y = doc.lastAutoTable.finalY + 12;

    doc.addPage('p');
    y = 15;
    doc.setFontSize(14);
    doc.text("Detail Nilai Siswa", 14, y);
    y += 8;

    rekapData.forEach((r, i) => {
        doc.setFontSize(12);
        doc.text(`${i+1}. ${r.student_name}`, 14, y);
        y += 4;

        const detailHead = [["Kuis","Skor","Status KKM","Waktu"]];
        const detailBody = r.details.map(d => [
            d.quiz, d.score, d.status, d.time ?? '-'
        ]);

        doc.autoTable({
            startY: y,
            head: detailHead,
            body: detailBody,
            styles: { fontSize: 10 },
            margin: { left: 14 }
        });

        y = doc.lastAutoTable.finalY + 10;
        if (y > 250) { doc.addPage(); y = 15; }
    });

    doc.save("rekap-nilai-dan-detail.pdf");
};
</script>
@endpush