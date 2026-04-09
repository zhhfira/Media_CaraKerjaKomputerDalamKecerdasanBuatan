@extends('layouts.guru')

@section('title', 'Data Siswa')
@section('topbar', 'Data Siswa')

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

.table-siswa{
    border-collapse: collapse;
    width: 100%;
    min-width: 420px;
}

.table-siswa th,
.table-siswa td{
    padding: 10px 12px;
    font-size: 12px;
    white-space: nowrap;
}

#pagination{
    display: flex;
    flex-wrap: wrap;
    gap: 4px;
    justify-content: flex-end;
}

#pagination button {
  margin: 0 !important; /* override inline style dari styleBtn */
}

/* Pastikan content-card tidak meluap */
.content-card {
  overflow-x: hidden;
  box-sizing: border-box;
}

@media (max-width: 600px) {
  /* hapus rule table-siswa di sini, sudah ditangani di atas */

  .table-siswa th,
  .table-siswa td {
    padding: 8px;
    font-size: 12px;
    white-space: nowrap; /* ← cegah teks wrap aneh */
  }

.search{
    display: flex;
    gap: 10px;
    align-items: center;
    flex-wrap: wrap;
    width: 100%;
}

.search input{
    padding: 10px 12px;
    border-radius: 10px;
    border: 1px solid rgba(0,0,0,.15);
    outline: none;
    flex: 1;           /* ← ikuti lebar container */
    min-width: 0;      /* ← ganti dari 260px */
    font-weight: 700;
    box-sizing: border-box;
}
  .toolbar{
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 14px;
}

}
</style>
@endpush

@section('content')
<div class="content-card">
    <div class="toolbar">
        <div>
            <div style="font-weight:900;font-size:20px">Data Siswa</div>
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
            <button onclick="exportPDF()"
                style="padding:10px 14px;border-radius:10px;font-weight:400;
                       background:#1e8e5a;color:#fff;border:none;cursor:pointer;">
                <i class="fa-solid fa-file-pdf"></i> Export PDF
            </button>
        </div>
    </div>

        <div class="table-wrapper">
            <table class="table-siswa">
                <thead>
                <tr style="background:rgba(0,0,0,.03);">
                    <th style="padding:12px;text-align:left;">No</th>
                    <th style="padding:12px;text-align:left;">Username</th>
                    <th style="padding:12px;text-align:left;">Email</th>
                    <th style="padding:12px;text-align:left;">Kelas</th>
                </tr>
                </thead>
            <tbody id="tableBody">
                @forelse($siswa as $i => $s)
                    <tr>
                        <td style="padding:12px;border-bottom:1px solid rgba(0,0,0,.06);">{{ $i+1 }}</td>
                        <td style="padding:12px;border-bottom:1px solid rgba(0,0,0,.06);">{{ $s->username }}</td>
                        <td style="padding:12px;border-bottom:1px solid rgba(0,0,0,.06);">{{ $s->email }}</td>
                        <td style="padding:12px;border-bottom:1px solid rgba(0,0,0,.06);">{{ $s->kelas }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="padding:14px;text-align:center;color:#777;">
                            Belum ada data siswa.
                        </td>
                    </tr>
                @endforelse
            </tbody>
            </table>
        </div>
        <div style="display:flex;justify-content:space-between;align-items:center;margin-top:12px;">
            <div id="info" style="font-weight:700;color:#555"></div>
            <div id="pagination"></div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {

    const tableBody        = document.getElementById("tableBody");
    const rowsPerPageSelect = document.getElementById("rowsPerPage");
    const searchInput      = document.getElementById("searchInput");
    const pagination       = document.getElementById("pagination");
    const info             = document.getElementById("info");

    let rows         = Array.from(tableBody.querySelectorAll("tr"));
    let filteredRows = [...rows];
    let currentPage  = 1;
    let rowsPerPage  = parseInt(rowsPerPageSelect.value);

    function renderTable() {
        tableBody.innerHTML = "";
        const start    = (currentPage - 1) * rowsPerPage;
        const end      = start + rowsPerPage;
        const pageRows = filteredRows.slice(start, end);

        pageRows.forEach((row, index) => {
            const clonedRow = row.cloneNode(true);
            clonedRow.children[0].textContent = start + index + 1;
            tableBody.appendChild(clonedRow);
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

    searchInput.addEventListener("input", function () {
        const keyword = this.value.toLowerCase();
        filteredRows  = rows.filter(row =>
            row.children[1].textContent.toLowerCase().includes(keyword)
        );
        currentPage = 1;
        renderTable();
    });

    rowsPerPageSelect.addEventListener("change", function () {
        rowsPerPage = parseInt(this.value);
        currentPage = 1;
        renderTable();
    });

    // Export PDF — perlu akses filteredRows dari luar, jadikan window
    window.exportPDF = function () {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        doc.setFontSize(16);
        doc.text("Data Siswa", 14, 16);

        const tableColumn = ["No", "Username", "Email", "Kelas"];
        const tableRows   = [];

        filteredRows.forEach((row, index) => {
            tableRows.push([
                index + 1,
                row.children[1].textContent,
                row.children[2].textContent,
                row.children[3].textContent
            ]);
        });

        doc.autoTable({
            startY: 24,
            head: [tableColumn],
            body: tableRows,
            styles: { fontSize: 10 },
            headStyles: { fillColor: [30, 142, 90] }
        });

        doc.save("data-siswa.pdf");
    };

    renderTable();
});
</script>
@endpush