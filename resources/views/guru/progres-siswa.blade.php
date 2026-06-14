@extends('layouts.guru')

@section('title', 'Progres Siswa')
@section('topbar', 'Progres Siswa')

@push('styles')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.29/jspdf.plugin.autotable.min.js"></script>
<style>
.toolbar{
    display:flex; gap:10px; flex-wrap:wrap;
    justify-content:space-between; align-items:center;
    margin-bottom:14px;
}
.search{ display:flex; gap:10px; align-items:center; flex-wrap:wrap; }
.search input{
    padding:10px 12px; border-radius:10px;
    border:1px solid rgba(0,0,0,.15); outline:none;
    min-width:260px; font-weight:700;
}
.table-wrapper{
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}
.table-progres{
    border-collapse: collapse;
    width: 100%;
    min-width: 700px;
}
.table-progres th,
.table-progres td{
    padding: 10px 12px;
    font-size: 12px;
    white-space: nowrap;
}
#pagination{ display:flex; flex-wrap:wrap; gap:4px; justify-content:flex-end; }
#pagination button{ margin:0 !important; }
.content-card{ overflow-x:hidden; box-sizing:border-box; }
</style>
@endpush

@section('content')
<div class="content-card">
    <div class="toolbar">
        <div>
            <div style="font-weight:900;font-size:20px">Progres Siswa</div>
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
            <input type="text" id="searchInput" placeholder="Cari nama siswa...">
            <select id="kelasFilter"
                style="padding:10px 12px;border-radius:10px;border:1px solid rgba(0,0,0,.15);
                       font-weight:700;background:#fff;outline:none;">
                <option value="">Semua Kelas</option>
                @foreach($data->pluck('user.kelas')->unique()->filter()->sort() as $kelas)
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

    <div class="table-wrapper">
        <table class="table-progres">
            <thead>
                <tr style="background:rgba(0,0,0,.03);">
                    <th style="text-align:left;">No</th>
                    <th style="text-align:left;">Nama Siswa</th>
                    <th style="text-align:left;">Kelas</th>
                    <th style="text-align:center;">Level</th>
                    <th style="text-align:center;">XP</th>
                    <th style="text-align:center;">Badge</th>
                    <th style="text-align:center;">Kuis Dikerjakan</th>
                    <th style="text-align:center;">Konten Selesai</th>
                    <th style="text-align:center;">Progres</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @foreach($data as $i => $d)
                <tr>
                    <td style="border-bottom:1px solid rgba(0,0,0,.06);">{{ $i + 1 }}</td>
                    <td style="border-bottom:1px solid rgba(0,0,0,.06);font-weight:700;">{{ $d->user->username }}</td>
                    <td style="border-bottom:1px solid rgba(0,0,0,.06);">{{ $d->user->kelas ?? '-' }}</td>
                    <td style="border-bottom:1px solid rgba(0,0,0,.06);text-align:center;">
                        <span style="background:#000B58;color:#fff;padding:4px 10px;border-radius:999px;font-size:11px;font-weight:700;">
                            Lv.{{ $d->level['level'] }} {{ $d->level['label'] }}
                        </span>
                    </td>
                    <td style="border-bottom:1px solid rgba(0,0,0,.06);text-align:center;font-weight:700;">
                        {{ $d->xp }} XP
                    </td>
                    <td style="border-bottom:1px solid rgba(0,0,0,.06);text-align:center;">
                        @foreach($d->badges as $badge)
                            <img src="/img/badges/{{ $badge->image }}" title="{{ $badge->name }}"
                                 style="width:26px;height:26px;display:inline-block;">
                        @endforeach
                        @if($d->badges->isEmpty()) <span style="color:#9ca3af;">-</span> @endif
                    </td>
                    <td style="border-bottom:1px solid rgba(0,0,0,.06);text-align:center;">
                        {{ $d->quiz_dikerjakan }} / {{ $quizzes->count() }} Kuis
                    </td>
                    <td style="border-bottom:1px solid rgba(0,0,0,.06);text-align:center;">
                        {{ $d->total_materi }} / 19 Konten
                    </td>
                    <td style="border-bottom:1px solid rgba(0,0,0,.06);text-align:center;min-width:120px;">
                        <div style="background:#e5e7eb;border-radius:999px;height:8px;">
                            <div style="background:#1e8e5a;height:8px;border-radius:999px;width:{{ $d->progres }}%"></div>
                        </div>
                        <small style="font-weight:700;">{{ $d->progres }}%</small>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div style="display:flex;justify-content:space-between;align-items:center;margin-top:12px;">
        <div id="info" style="font-weight:700;color:#555"></div>
        <div id="pagination"></div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    const tableBody         = document.getElementById("tableBody");
    const rowsPerPageSelect = document.getElementById("rowsPerPage");
    const searchInput       = document.getElementById("searchInput");
    const pagination        = document.getElementById("pagination");
    const info              = document.getElementById("info");

    let rows         = Array.from(tableBody.querySelectorAll("tr"));
    let filteredRows = [...rows];
    let currentPage  = 1;
    let rowsPerPage  = parseInt(rowsPerPageSelect.value);

    window.exportPDF = function () {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF({ orientation: 'landscape' });
    doc.setFontSize(16);
    doc.text("Progres Siswa", 14, 16);

    const tableColumn = ["No", "Nama Siswa", "Kelas", "Level", "XP", "Kuis Dikerjakan", "Konten Selesai", "Progres"];
    const tableRows   = [];

    filteredRows.forEach((row, index) => {
        tableRows.push([
            index + 1,
            row.children[1].textContent.trim(),
            row.children[2].textContent.trim(),
            row.children[3].textContent.trim(),
            row.children[4].textContent.trim(),
            row.children[6].textContent.trim(),
            row.children[7].textContent.trim(),
            row.children[8].textContent.trim(),
        ]);
    });

    doc.autoTable({
        startY: 24,
        head: [tableColumn],
        body: tableRows,
        styles: { fontSize: 9 },
        headStyles: { fillColor: [0, 11, 88] }
    });

    doc.save("progres-siswa.pdf");
};
    function renderTable() {
        tableBody.innerHTML = "";
        const start    = (currentPage - 1) * rowsPerPage;
        const end      = start + rowsPerPage;
        const pageRows = filteredRows.slice(start, end);

        pageRows.forEach((row, index) => {
            const cloned = row.cloneNode(true);
            cloned.children[0].textContent = start + index + 1;
            tableBody.appendChild(cloned);
        });

        info.textContent =
            `Menampilkan ${start + 1} – ${Math.min(end, filteredRows.length)} dari ${filteredRows.length} data`;

        renderPagination();
    }

    function renderPagination() {
        pagination.innerHTML = "";
        const totalPages = Math.ceil(filteredRows.length / rowsPerPage);

        const prevBtn = document.createElement("button");
        prevBtn.textContent = "Sebelumnya";
        prevBtn.disabled    = currentPage === 1;
        styleBtn(prevBtn);
        prevBtn.onclick = () => { if (currentPage > 1) { currentPage--; renderTable(); } };
        pagination.appendChild(prevBtn);

        for (let i = 1; i <= totalPages; i++) {
            const btn = document.createElement("button");
            btn.textContent = i;
            styleBtn(btn);
            if (i === currentPage) {
                btn.style.background = "#1e8e5a";
                btn.style.color      = "#fff";
                btn.disabled         = true;
            }
            btn.onclick = () => { currentPage = i; renderTable(); };
            pagination.appendChild(btn);
        }

        const nextBtn = document.createElement("button");
        nextBtn.textContent = "Berikutnya";
        nextBtn.disabled    = currentPage === totalPages;
        styleBtn(nextBtn);
        nextBtn.onclick = () => { if (currentPage < totalPages) { currentPage++; renderTable(); } };
        pagination.appendChild(nextBtn);
    }

    function styleBtn(btn) {
        btn.style.padding      = "6px 12px";
        btn.style.borderRadius = "6px";
        btn.style.border       = "1px solid rgba(0,0,0,.2)";
        btn.style.fontWeight   = "700";
        btn.style.cursor       = "pointer";
    }

    function applyFilter() {
        const keyword = searchInput.value.toLowerCase();
        const kelas   = document.getElementById("kelasFilter").value;

        filteredRows = rows.filter(row => {
            const nameMatch  = row.children[1].textContent.toLowerCase().includes(keyword);
            const kelasMatch = !kelas || row.children[2].textContent.trim() === kelas;
            return nameMatch && kelasMatch;
        });

        currentPage = 1;
        renderTable();
    }

    searchInput.addEventListener("input", applyFilter);
    document.getElementById("kelasFilter").addEventListener("change", applyFilter);
    rowsPerPageSelect.addEventListener("change", function () {
        rowsPerPage = parseInt(this.value);
        currentPage = 1;
        renderTable();
    });

    renderTable();
});
</script>
@endpush