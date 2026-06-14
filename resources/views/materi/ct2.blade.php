@extends('layouts.siswa')

@section('title', 'Berpikir Komputasional: Empat Komponen Utama Computational Thinking')

@section('topbar', 'Penerapan Computational Thinking dalam Pemecahan Masalah')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Alata&family=Itim&family=Kumbh+Sans:wght,YOPQ@100..900,300&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

<style>
.activity-intro{
  border: 4px solid #006A67;
  border-radius: 10px;
  padding: 22px 26px;
  margin: 16px 0 20px 0;
  background: #fff;
  font-family: 'Poppins', Arial, sans-serif;
  box-sizing: border-box; 
}

.activity-intro .label{
  text-align: center;
  font-weight: 700;
  font-size: 14px;
  margin-bottom: 6px;
}

.activity-intro .title{
  text-align: center;
  font-weight: 800;
  font-size: 13px;
  margin-bottom: 14px;
}

.activity-intro p{
  font-size: 12px;
  line-height: 1.9;
  text-align: center;
  margin: 0;
}

/* ===== BOX TABEL ===== */
.box-table{
  border: 4px solid #006A67;
  border-radius: 6px;
  background: #fff;
  margin: 18px 0;
  overflow: hidden;
  font-family: 'Poppins', Arial, sans-serif;
}

.box-header{
  background: #006A67;
  padding: 8px 12px;
  font-weight: 800;
  font-size: 15px;
  color: #ffffff;
  border-bottom: 3px solid #006A67;
}

.box-body{
  padding: 14px 16px;
  font-size: 12px;
  line-height: 1.7;
  color: #111;
}

.box-body p{
  margin: 0 0 10px 0;
}

.box-subtitle{
  margin-top: 12px;
}

.dd-wrap{
  display: grid;
  grid-template-columns: 1.1fr 1.9fr;
  gap: 18px;
  align-items: start;
}

/* BANK */
.dd-bank{
  border: 1px solid #ffffff;
  background: #fff;
  padding: 10px;
  display: grid;
  gap: 10px;
  box-sizing: border-box;
}

.dd-item{
  border: 1px solid #111;
  padding: 12px 12px;
  margin-left: 0px;
  background: #fff;
  cursor: grab;
  user-select: none;
  line-height: 1.6;
  font-size: 12px;
}
.dd-item:active{ cursor: grabbing; }
.dd-item.dragging{ opacity: .6; }

/* TABLE BOX */
.dd-table-box{
  margin-left: 5px;
  border: 1px solid #ffffff;
  background: #fff;
  padding-right: 38px;
  padding-left: 32px;
  box-sizing: border-box;
}

.dd-table-title{
  display: grid;
  grid-template-columns: 1.3fr 1fr;
  gap: 12px;
  padding: 10px 12px 14px 12px;
  border-bottom: 1px solid #ddd;
  margin-bottom: 6px;
}
.dd-th{
  font-weight: 700;
  font-size: 13px;
}

.dd-row{
  display: grid;
  grid-template-columns: 1.3fr 1fr;
  gap: 15px;
  padding: 14px 12px;
  border-bottom: 1px solid #eee;
}
.dd-row:last-of-type{ border-bottom: none; }

.dd-step{
  line-height: 1.5;
  font-size: 12px;
}

.dd-drop{
  min-height: 52px;
  border-bottom: 2px solid #333;
  display: flex;
  align-items: center;
  padding: 8px 6px;
  box-sizing: border-box;
}
.dd-drop.over{ background: #f6f6f6; }

.dd-drop .dd-item{
  width: 100%;
  border: 1px solid #111;
  padding: 12px 12px;
  cursor: grab;
}

.dd-actions{
  display: flex;
  gap: 10px;
  margin-top: 14px;
  flex-wrap: wrap;
}

.btn{
  border: 1px solid #555;
  background: #f6f6f6;
  padding: 7px 14px;
  font-weight: 700;
  cursor: pointer;
}
.btn:hover{ background: #eaeaea; }

.dd-hasil{
  margin-top: 10px;
  font-size: 12px;
  line-height: 1.6;
}

.dd-item.correct{ outline: 2px solid #22c55e; }
.dd-item.wrong{ outline: 2px solid #ef4444; }

/* TABEL SEDERHANA */
table{
  width: 100%;
  border-collapse: collapse;
  font-size: 12px;
  margin-bottom: 10px;
  min-width: 500px;
}

th, td{
  border: 1px solid #000;
  padding: 8px 10px;
  vertical-align: top;
}

th{
  font-weight: bold;
  text-align: center;
}

td:first-child{
  text-align: center;
  width: 50px;
}

td:last-child{
  width: 120px;
  text-align: center;
}

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
  width: 46%;
}

.bank{
  display: grid;
  gap: 10px;
  margin: 2px 0;
}

.drag-item{
  border: 1px solid #555;
  background: #fff;
  padding: 8px 10px;
  cursor: grab;
  user-select: none;
}

.drag-item:active{ cursor: grabbing; }

.step-row{
  display: flex;
  align-items: center;
  gap: 10px;
  margin: 0 0 10px 0;
}

.step-row:last-child{ margin-bottom: 0; }

.step-num{
  width: 26px;
  font-weight: 700;
}

.drop-zone{
  flex: 1;
  min-height: 36px;
  border: 1px dashed #555;
  padding: 6px;
  background: #fff;
  display: flex;
  align-items: center;
}

.drop-zone.over{ background: #f6f6f6; }

.btn-row{
  display: flex;
  gap: 10px;
  margin-top: 12px;
  flex-wrap: wrap;
}

/* ====== MODAL OVERLAY ====== */
.modal-overlay{
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,0.45);
  display: none;
  align-items: center;
  justify-content: center;
  z-index: 99999;
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
  transition: background .2s ease;
}

.modal-btn:hover{ background: #185abc; }

.table-wrapper{
    width: 100%;
    overflow-x: auto;
}

/* ================= HP ================= */
@media (max-width: 600px){

  /* container */
  .activity-intro{
    padding: 16px;
  }

  /* layout utama jadi vertikal */
  .dd-wrap{
    grid-template-columns: 1fr; /* ⬅ penting */
    gap: 14px;
  }

  /* tabel drop */
  .dd-row{
    grid-template-columns: 1fr; /* ⬅ paksa 1 kolom */
    gap: 6px;
  }

  .dd-table-title{
    grid-template-columns: 1fr;
  }

  /* teks */
  .activity-intro .title{
    font-size: 12px;
  }

  .activity-intro p{
    font-size: 11px;
  }

  .dd-item{
    font-size: 11px;
    padding: 8px;
  }

  .dd-drop{
    min-height: 36px;
  }

  /* tombol */
  .btn{
    font-size: 12px;
    padding: 6px 12px;
  }

  /* tabel scroll */
  .box-table{
    overflow-x: auto;
  }

  table{
    min-width: unset; /* ⬅ hapus paksa lebar */
    width: 100%;
    font-size: 11px;
  }

  th, td{
    padding: 6px;
    font-size: 10px;
  }
    .box-body{
    font-size: 11px;
  }

  .activity-intro p{
    font-size: 11px;
  }

}
/* ================= TABLET ================= */
@media (min-width: 601px) and (max-width: 1024px){

  .dd-wrap{
    grid-template-columns: 1fr; /* masih 1 kolom biar lega */
  }

  .dd-table-title,
  .dd-row{
    grid-template-columns: 1fr 1fr;
  }

  .activity-intro{
    padding: 20px;
  }

}
/* ================= DESKTOP ================= */
@media (min-width: 1200px){

  .activity-intro{
    padding: 26px 32px;
  }

  .dd-wrap{
    grid-template-columns: 1.1fr 1.9fr;
  }

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

    <h3 class="content-title">2. Empat Komponen Utama <i>Computational Thinking</i></h3>

    <p class="style-materi">
        Menurut Angraini et al. (2022), terdapat empat komponen utama dalam <i>computational thinking,</i> yaitu dekomposisi, pengenalan pola, abstraksi, dan perancangan algoritma. Keempat komponen ini saling berkaitan dalam membentuk cara berpikir sistematis yang menjadi dasar penyelesaian masalah secara komputasional.
    </p>

    <ol style="margin: 6px 0 16px 0; padding-left: 38px; font-size: 14px; line-height: 1.75; text-align: justify;">

        {{-- ===== KOMPONEN 1: DEKOMPOSISI ===== --}}
        <li class="section-text">
            <b>Dekomposisi <i>(Decomposition)</i></b><br>
            Dekomposisi adalah proses menguraikan masalah kompleks menjadi bagian-bagian yang lebih kecil dan sederhana. Misalnya, dalam sistem kecerdasan buatan pengenalan gambar, proses berpikir komputer dapat dipecah menjadi beberapa langkah seperti mendeteksi bentuk dasar, mengenali pola warna, mengidentifikasi objek, dan akhirnya menentukan label yang sesuai. Agar kamu dapat lebih memahami langkah dekomposisi, cobalah mengerjakan aktivitas berikut!
        </li>

        <div class="activity-intro">
            <div class="label">Aktivitas Interaktif:</div>
            <div class="title">"Bagaimana Komputer Mengenali Jenis Ikan Sungai di Kalimantan?"</div>
            <p>
                Sebuah program komputer dirancang untuk membedakan berbagai jenis ikan sungai khas Kalimantan, seperti haruan, patin, dan papuyu. Agar program dapat bekerja dengan cepat dan akurat, komputer perlu mempelajari ciri-ciri dari setiap jenis ikan, seperti bentuk tubuh, warna, ukuran, dan pola sisiknya. Bagaimana cara komputer mengenali perbedaan tersebut? Mari mempelajarinya menggunakan pendekatan Computational Thinking (CT).
            </p>
        </div>

        <div class="box-table">
            <div class="box-header">Komponen 1 – Dekomposisi</div>
            <div class="box-body">
                <p>Sebuah sistem komputer dirancang untuk mengenali berbagai jenis ikan sungai khas Kalimantan dari gambar yang diberikan. Agar proses tersebut dapat berjalan dengan baik, permasalahan perlu dipecah menjadi langkah-langkah yang lebih kecil dan terstruktur sehingga komputer dapat mempelajari ciri khas dari setiap jenis ikan.</p>
                <p class="box-subtitle"><b>Instruksi Pengerjaan</b></p>
                <p>Pasangkan langkah dan kegiatan berikut ini dengan sesuai agar komputer bisa belajar mengenali gambar dengan benar.</p>
            </div>
            <section class="dd-wrap">
                <!-- BANK (kartu kegiatan) -->
                <div class="dd-bank" id="bank">
                    <div class="dd-item" draggable="true" data-id="kumpul">Mengelompokkan gambar berdasarkan jenis ikan, seperti haruan, patin, dan papuyu.</div>
                    <div class="dd-item" draggable="true" data-id="folder">Mengumpulkan berbagai gambar ikan sungai khas Kalimantan. </div>
                    <div class="dd-item" draggable="true" data-id="latih">Menguji kemampuan komputer dalam mengenali jenis ikan berdasarkan gambar yang diberikan.</div>
                    <div class="dd-item" draggable="true" data-id="uji">Memperbaiki data apabila komputer masih salah mengenali gambar ikan. </div>
                    <div class="dd-item" draggable="true" data-id="perbaiki">Melatih komputer agar dapat mengenali perbedaan ciri setiap jenis ikan. </div>
                </div>

                <!-- TABEL -->
                <div class="dd-table-box">
                    <div class="dd-table-title">
                        <div class="dd-th">Langkah</div>
                        <div class="dd-th">Kegiatan</div>
                    </div>
                    <div class="dd-row">
                        <div class="dd-step"><b>1. Mengumpulkan Data</b></div>
                        <div class="dd-drop" data-step="1"></div>
                    </div>
                    <div class="dd-row">
                        <div class="dd-step"><b>2. Mengelompokkan Gambar ke Folder Sesuai Jenisnya</b></div>
                        <div class="dd-drop" data-step="2"></div>
                    </div>
                    <div class="dd-row">
                        <div class="dd-step"><b>3. Melatih Komputer (Proses Belajar)</b></div>
                        <div class="dd-drop" data-step="3"></div>
                    </div>
                    <div class="dd-row">
                        <div class="dd-step"><b>4. Mencoba Model dengan Gambar Baru</b></div>
                        <div class="dd-drop" data-step="4"></div>
                    </div>
                    <div class="dd-row">
                        <div class="dd-step"><b>5. Memperbaiki Kesalahan Jika Prediksi Salah</b></div>
                        <div class="dd-drop" data-step="5"></div>
                    </div>
                    <div class="dd-actions">
                        <button class="btn" id="cek" type="button">Cek Jawaban</button>
                        <button class="btn" id="reset" type="button">Reset</button>
                    </div>
                </div>
            </section>
        </div>

        {{-- ===== KOMPONEN 2: PENGENALAN POLA ===== --}}
        <li class="section-text">
            <b>Pengenalan Pola <i>(Pattern Recognition)</i></b><br>
            Setelah masalah diuraikan, langkah selanjutnya adalah mengenali pola atau kesamaan antar bagian permasalahan. Misalnya, dalam sistem kecerdasan buatan pengenalan wajah, komputer belajar mengenali pola tertentu seperti bentuk mata, jarak antar fitur wajah, atau kontur wajah. Dengan menemukan pola-pola ini, kecerdasan buatan dapat mengidentifikasi seseorang meskipun gambar yang dilihat berbeda-beda. Agar kamu dapat lebih memahami langkah pengenalan pola, cobalah mengerjakan aktivitas berikut!
        </li>

        <div class="box-table">
            <div class="box-header">Komponen 2 – Pengenalan Pola</div>
            <div class="box-body">
                <p>
                    Pada aktivitas sebelumnya, kamu telah memecah proses kerja komputer dalam mengenali gambar menjadi langkah-langkah kecil (dekomposisi).
                    Sekarang, kamu akan mempelajari bagaimana komputer mengenali pola dari data yang telah dikumpulkan.
                    Bayangkan komputer sedang belajar mengenali berbagai jenis ikan sungai dari bentuk tubuh, warna, dan pola sisiknya. Beberapa gambar telah diberi label sesuai jenis ikannya agar komputer dapat mempelajari ciri-ciri dan menemukan pola yang sama pada setiap data.
                </p>
                <p class="box-subtitle"><b>Instruksi Pengerjaan</b></p>
                <p>Amati pola ciri-ciri yang ada pada tabel di atas! Kemudian tentukan label yang paling sesuai untuk nomor 4 dengan mengisi kolom label dengan jawaban yang benar.</p>
                
                <div class="table-wrapper">
                <table>
                    <tr>
                        <th>No.</th>
                        <th>Ciri-ciri</th>
                        <th>Label</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Tubuh panjang dan berwarna gelap</td>
                        <td>Haruan</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Memiliki kumis dan tubuh licin</td>
                        <td>Patin</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Sering hidup di rawa dan bentuk tubuh memanjang</td>
                        <td>Haruan</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Memiliki kumis panjang dan hidup di sungai</td>
                        <td><input type="text" id="jawaban" placeholder="Isi label"></td>
                    </tr>
                </table>
                </div>
                <br>
                <button class="btn" type="button" id="cekPola">Cek Jawaban</button>
            </div>
        </div>

        {{-- ===== KOMPONEN 3: ABSTRAKSI ===== --}}
        <li class="section-text">
            <b>Abstraksi dan Generalisasi <i>(Abstraction &amp; Generalization)</i></b><br>
            Abstraksi berarti menyaring informasi penting dan mengabaikan hal-hal yang tidak relevan, agar fokus pada inti permasalahan. Generalisasi berarti menggunakan solusi dari satu masalah untuk menyelesaikan masalah lain yang serupa. Dengan abstraksi dan generalisasi, kita belajar berpikir efisien dan menerapkan strategi yang telah berhasil pada konteks baru. Misalnya, pada sistem kecerdasan buatan klasifikasi gambar, komputer hanya mengambil fitur penting seperti bentuk, warna, atau pola tertentu sambil mengabaikan detail yang tidak dibutuhkan. Agar kamu dapat lebih memahami langkah abstraksi, cobalah mengerjakan aktivitas berikut!
        </li>

        <div class="box-table">
            <div class="box-header">Komponen 3 – Abstraksi</div>
            <div class="box-body">
                <p>
                    Pada tahap sebelumnya, kamu telah mempelajari bagaimana komputer memecah masalah menjadi bagian-bagian kecil (dekomposisi) dan mengenali kesamaan ciri dari data yang ada (pengenalan pola). Pada babak ini, kamu akan mempelajari abstraksi, yaitu proses menyaring informasi yang paling penting dan mengabaikan detail yang tidak diperlukan. Dengan abstraksi, komputer dapat fokus pada ciri utama yang membedakan satu objek dengan objek lainnya, sehingga proses pengambilan keputusan menjadi lebih sederhana dan efisien.
                </p>
                <p class="box-subtitle"><b>Instruksi Pengerjaan</b></p>
                <p>
                    Pilih informasi yang benar-benar diperlukan oleh komputer untuk membedakan jenis ikan sungai khas Kalimantan.
                    Beri tanda centang (✔) pada informasi yang paling relevan dan berpengaruh terhadap hasil pengenalan pola.
                </p>
                <div class="abstraksi-box">
                    <p><b>Catatan:</b> Pilih lebih dari satu informasi!</p>
                    <label><input type="checkbox" value="latar"> Warna air sungai</label><br>
                    <label><input type="checkbox" value="telinga"> Bentuk tubuh ikan</label><br>
                    <label><input type="checkbox" value="ekor"> Ada atau tidaknya kumis</label><br>
                    <label><input type="checkbox" value="background"> Lokasi gambar diambil</label><br>
                    <label><input type="checkbox" value="kaki"> Ukuran tubuh ikan</label><br>
                    <label><input type="checkbox" value="bulu"> Pola atau warna sisik</label><br>
                    <label><input type="checkbox" value="nama"> Nama File Gambar</label><br><br>
                    <button class="btn" type="button" id="cekAbstraksiBtn">Cek Jawaban</button>
                </div>
            </div>
        </div>

        {{-- ===== KOMPONEN 4: ALGORITMA ===== --}}
        <li class="section-text">
            <b>Perancangan Algoritma <i>(Algorithm Design)</i></b><br>
            Tahap terakhir adalah menyusun langkah-langkah penyelesaian masalah secara sistematis dan logis, yang disebut algoritma. Algoritma adalah urutan langkah terdefinisi yang dapat diikuti untuk mencapai tujuan tertentu. Misalnya, dalam kegiatan sehari-hari, resep memasak adalah bentuk algoritma karena berisi langkah-langkah yang jelas dan terurut. Dalam konteks pembelajaran, siswa yang mempelajari algoritma belajar untuk berpikir runtut, efisien, dan mampu menuliskan solusi dalam bentuk yang bisa dipahami oleh komputer. Agar kamu dapat lebih memahami langkah algoritma, cobalah mengerjakan aktivitas berikut!
        </li>

        <div class="box-table">
            <div class="box-header">Komponen 4 – Algoritma</div>
            <div class="box-body">
                <p>
                    Setelah menyelesaikan kegiatan pada tahap Dekomposisi, Pengenalan Pola, dan Abstraksi, langkah berikutnya adalah menyusun urutan proses yang dilakukan komputer untuk mengenali jenis ikan sungai khas Kalimantan.
                    Algoritma harus jelas, terurut, dan dapat diikuti secara logis oleh komputer agar menghasilkan keputusan yang tepat.
                </p>
                <p class="box-subtitle"><b>Instruksi Pengerjaan</b></p>
                <p>Urutkan langkah yang benar berdasarkan proses kerja kecerdasan buatan dalam mengenali gambar. Susun kembali langkah-langkah berikut <i>(drag end drop)</i> agar membentuk algoritma yang runtut dan efisien.</p>

                <div id="activity4">
                    <table class="identify-table">
                        <thead>
                            <tr>
                                <th>Komponen Aktivitas</th>
                                <th>Susun Langkah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div id="bank4" class="bank">
                                        <div class="drag-item" draggable="true" data-id="test">Menguji model menggunakan gambar ikan baru untuk melihat hasil prediksi.</div>
                                        <div class="drag-item" draggable="true" data-id="collect">Mengumpulkan gambar berbagai jenis ikan sungai sebagai data latih.</div>
                                        <div class="drag-item" draggable="true" data-id="fix">Memperbaiki data apabila hasil prediksi komputer masih salah.</div>
                                        <div class="drag-item" draggable="true" data-id="train">Melatih model kecerdasan buatan agar dapat mengenali pola dari data yang telah diberi label.</div>
                                        <div class="drag-item" draggable="true" data-id="label">Memberi label pada setiap gambar sesuai jenis ikan, seperti haruan, patin, atau papuyu.</div>
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
                        <button class="btn" id="cek4" type="button">Cek Jawaban</button>
                        <button class="btn" id="reset4" type="button">Reset</button>
                    </div>
                </div>
            </div>
        </div>

    </ol>

    <p class="style-materi">
        Berdasarkan empat aktivitas yang telah dilakukan, dapat disimpulkan bahwa <i>Computational Thinking</i> (CT) membantu kita memahami bagaimana komputer atau kecerdasan buatan menyelesaikan masalah secara logis, bertahap, dan terstruktur. Pada tahap <b>dekomposisi</b>, kamu belajar bahwa sebuah masalah besar perlu dipecah menjadi beberapa langkah kecil agar lebih mudah dipahami dan diselesaikan secara bertahap. Selanjutnya, pada tahap <b>pengenalan pola</b>, kamu dilatih untuk menemukan kesamaan ciri atau karakteristik dari data yang tersedia, sehingga dapat digunakan sebagai dasar dalam menentukan kategori yang tepat.
    </p>
    <p class="style-materi">
        Kemudian, melalui tahap <b>abstraksi dan generalisasi</b>, kamu memahami pentingnya memilih informasi yang paling relevan dan mengabaikan detail yang tidak berpengaruh terhadap tujuan utama. Terakhir, pada tahap <b>perancangan algoritma</b>, kamu menyusun urutan langkah penyelesaian masalah secara runtut dan logis agar dapat diikuti oleh komputer. Dengan demikian, keempat komponen <i>Computational Thinking</i> tersebut saling berkaitan dan membentuk alur berpikir yang sistematis. Jika diterapkan secara lengkap, <i>computational thinking</i> dapat membantu kecerdasan buatan bekerja lebih efektif dalam mengenali pola dari data dan menghasilkan keputusan yang sesuai.
    </p>
</div>

<div class="bottom-bar">
    <a href="{{ route('materi.ct3') }}" class="btn-next">
        Materi Selanjutnya
        <i class="fa-solid fa-arrow-right"></i>
    </a>
</div>

<!-- MODAL GLOBAL -->
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
function playCorrect(){
    new Audio("{{ asset('audio/benar.mp3') }}").play().catch(() => {});
}
function playWrong(){
    new Audio("{{ asset('audio/salah.mp3') }}").play().catch(() => {});
}
function playIncomplete(){
    new Audio("{{ asset('audio/salah.mp3') }}").play().catch(() => {});
}
</script>
<script>
const MATERI_KEY = "ct.empat"; 

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
    const container = document.querySelector(".content-card");

document.addEventListener("dragover", function(e){

    const rect = container.getBoundingClientRect();
    const threshold = 60;

    if (e.clientY < rect.top + threshold){
        container.scrollTop -= 10;
    }

    if (e.clientY > rect.bottom - threshold){
        container.scrollTop += 10;
    }

});
</script>
<script>
/* =========================
   MODAL GLOBAL FUNCTIONS
========================= */
function showModal(type, title, text){
    const modalOverlay = document.getElementById("modal-overlay");
    const modalIcon    = document.getElementById("modal-icon");
    const modalFa      = document.getElementById("modal-fa");
    const modalTitle   = document.getElementById("modal-title");
    const modalText    = document.getElementById("modal-text");

    modalOverlay.classList.add("show");

    if(type === "success"){
        modalIcon.className = "modal-icon success";
        modalFa.className   = "fa-solid fa-check";
    } else {
        modalIcon.className = "modal-icon error";
        modalFa.className   = "fa-solid fa-xmark";
    }

    modalTitle.textContent = title;
    modalText.innerHTML    = text;
}

function closeModal(){
    document.getElementById("modal-overlay").classList.remove("show");
}

document.addEventListener("DOMContentLoaded", () => {
    const modalOverlay = document.getElementById("modal-overlay");
    const modalClose   = document.getElementById("modal-close");

    modalClose.addEventListener("click", closeModal);
    modalOverlay.addEventListener("click", (e) => {
        if (e.target === modalOverlay) closeModal();
    });
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") closeModal();
    });
});
</script>

<script>
/* =========================
   KOMPONEN 1 – DEKOMPOSISI
========================= */
document.addEventListener("DOMContentLoaded", () => {
    const bank     = document.getElementById("bank");
    const cekBtn   = document.getElementById("cek");
    const resetBtn = document.getElementById("reset");
    const drops    = document.querySelectorAll(".dd-drop");

    if (!bank || !cekBtn || !resetBtn || !drops.length) return;

    const KEY = {
        folder:   "1",
        kumpul:   "2",
        perbaiki: "3",
        latih:    "4",
        uji:      "5",
    };

    let dragged = null;

    document.addEventListener("dragstart", (e) => {
        const item = e.target.closest(".dd-item");
        if (!item) return;
        dragged = item;
        e.dataTransfer.setData("text/plain", item.dataset.id);
        e.dataTransfer.effectAllowed = "move";
        item.classList.add("dragging");
    });

    document.addEventListener("dragend", (e) => {
        const item = e.target.closest(".dd-item");
        if (!item) return;
        item.classList.remove("dragging");
        dragged = null;
    });

    drops.forEach((zone) => {
        zone.addEventListener("dragover", (e) => {
            e.preventDefault();
            zone.classList.add("over");
        });
        zone.addEventListener("dragleave", () => { zone.classList.remove("over"); });
        zone.addEventListener("drop", (e) => {
            e.preventDefault();
            zone.classList.remove("over");

            const id   = e.dataTransfer.getData("text/plain");
            const item = document.querySelector(`.dd-item[data-id="${id}"]`) || dragged;
            if (!item) return;

            const existing = zone.querySelector(".dd-item");
            if (existing) bank.appendChild(existing);

            zone.appendChild(item);
            clearMarksDD();
        });
    });

    bank.addEventListener("dragover", (e) => e.preventDefault());
    bank.addEventListener("drop", (e) => {
        e.preventDefault();
        const id   = e.dataTransfer.getData("text/plain");
        const item = document.querySelector(`.dd-item[data-id="${id}"]`) || dragged;
        if (!item) return;
        bank.appendChild(item);
        clearMarksDD();
    });

    cekBtn.addEventListener("click", () => {
        clearMarksDD();

        const placedCount = [...drops].reduce((acc, z) => acc + z.querySelectorAll(".dd-item").length, 0);
        const totalCount  = placedCount + bank.querySelectorAll(".dd-item").length;

        if (placedCount !== Object.keys(KEY).length) {
            playIncomplete();
            showModal("error", "Belum Lengkap", "Masih ada kartu yang belum dipasang. Lengkapi dulu!");
            return;
        }

        let salah = 0;
        drops.forEach((zone) => {
            const step = zone.dataset.step;
            const item = zone.querySelector(".dd-item");
            if (!item) return;

            if (KEY[item.dataset.id] === step) {
                item.classList.add("correct");
            } else {
                salah++;
                item.classList.add("wrong");
            }
        });

        if (salah === 0) {
            playCorrect();
            showModal("success", "Benar", "Mantap! Urutannya sudah tepat: kumpulkan data → kelompokkan → latih → uji → perbaiki.");
        } else {
            playWrong();
            showModal("error", "Belum Tepat", `Masih ada <b>${salah}</b> yang salah. Cek lagi urutan proses belajarnya.`);
        }
    });

    resetBtn.addEventListener("click", () => {
        drops.forEach((z) => {
            const item = z.querySelector(".dd-item");
            if (item) bank.appendChild(item);
        });
        clearMarksDD();
    });

    function clearMarksDD(){
        document.querySelectorAll(".dd-item").forEach(el => el.classList.remove("correct", "wrong"));
    }
});
</script>

<script>
/* =========================
   KOMPONEN 2 – PENGENALAN POLA
========================= */
document.addEventListener("DOMContentLoaded", () => {
    const cekPolaBtn = document.getElementById("cekPola");
    if (!cekPolaBtn) return;

    cekPolaBtn.addEventListener("click", () => {
        const input   = document.getElementById("jawaban");
        const jawaban = (input?.value || "").trim().toLowerCase();

        if (jawaban === "patin") {
            playCorrect();
            showModal("success", "Benar", 'Benar! Label yang tepat adalah <b>Patin</b>.');
        } else if (jawaban === "") {
            playIncomplete();
            showModal("error", "Belum Diisi", "Silakan isi jawaban terlebih dahulu.");
        } else {
            playIncomplete();
            showModal("error", "Belum Tepat", "Belum tepat. Perhatikan ciri-cirinya lagi.");
        }
    });
});
</script>

<script>
/* =========================
   KOMPONEN 3 – ABSTRAKSI
========================= */
document.addEventListener("DOMContentLoaded", () => {
    const cekAbstraksiBtn = document.getElementById("cekAbstraksiBtn");
    if (!cekAbstraksiBtn) return;

    cekAbstraksiBtn.addEventListener("click", () => {
        const checked      = document.querySelectorAll('.abstraksi-box input[type="checkbox"]:checked');
        const jawabanBenar = ["telinga", "ekor", "kaki", "bulu"];

        if (checked.length === 0) {
            playIncomplete();
            showModal("error", "Belum Ada Pilihan", "Pilih beberapa informasi yang menurutmu penting dulu!");
            return;
        }

        let benar = 0;
        let salah = 0;

        checked.forEach(cb => {
            if (jawabanBenar.includes(cb.value)) benar++;
            else salah++;
        });

        if (salah > 0) {
            playWrong();
            showModal("error", "Belum Tepat", "Ingat, abstraksi itu memilih ciri utama dan mengabaikan detail yang tidak diperlukan.");
            return;
        }

        if (benar === jawabanBenar.length) {
            playCorrect();
            showModal("success", "Tepat!", "Kamu sudah memilih semua ciri penting yang relevan untuk mengenali hewan.");
        } else {
            playWrong();
            showModal("error", "Hampir Benar", "Kamu sudah memilih ciri yang tepat, tapi masih ada ciri penting yang belum dipilih.");
        }
    });
});
</script>

<script>
/* =========================
   KOMPONEN 4 – ALGORITMA
========================= */
document.addEventListener("DOMContentLoaded", () => {
    const root     = document.getElementById("activity4");
    if (!root) return;

    const bank      = root.querySelector("#bank4");
    const cekBtn    = root.querySelector("#cek4");
    const resetBtn  = root.querySelector("#reset4");
    const dropZones = root.querySelectorAll(".drop-zone");

    const ANSWER_BY_STEP = {
        "1": "collect",
        "2": "label",
        "3": "train",
        "4": "test",
        "5": "fix"
    };

    let draggedEl = null;

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

            const existing = zone.querySelector(".drag-item");
            if (existing) bank.appendChild(existing);

            zone.appendChild(item);
            clearMarksDrag();
        });
    });

    bank.addEventListener("dragover", (e) => e.preventDefault());
    bank.addEventListener("drop", (e) => {
        e.preventDefault();
        const id   = e.dataTransfer.getData("text/plain");
        const item = root.querySelector(`.drag-item[data-id="${id}"]`) || draggedEl;
        if (!item) return;
        bank.appendChild(item);
        clearMarksDrag();
    });

    cekBtn.addEventListener("click", () => {
        clearMarksDrag();

        const kosong = [];
        dropZones.forEach(z => {
            if (!z.querySelector(".drag-item")) kosong.push(z.dataset.step);
        });

        if (kosong.length) {
            playIncomplete();
            showModal("error", "Belum Lengkap", `Masih ada langkah yang kosong: <b>${kosong.join(", ")}</b>. Lengkapi dulu!`);
            return;
        }

        let salah = 0;
        dropZones.forEach((z) => {
            const step     = z.dataset.step;
            const item     = z.querySelector(".drag-item");
            const expected = ANSWER_BY_STEP[step];

            if (item && item.dataset.id === expected) {
                item.classList.add("correct");
            } else {
                salah++;
                if (item) item.classList.add("wrong");
            }
        });

        if (salah === 0) {
            playCorrect();
            showModal("success", "Benar", "Benar semua! Urutan prosesnya sudah tepat: kumpulkan data → beri label → latih → uji → perbaiki.");
        } else {
            playWrong();
            showModal("error", "Belum Tepat", `Masih ada <b>${salah}</b> langkah yang salah. Coba cek lagi urutan proses belajarnya!`);
        }
    });

    resetBtn.addEventListener("click", () => {
        root.querySelectorAll(".drop-zone .drag-item").forEach(item => bank.appendChild(item));
        clearMarksDrag();
    });

    function clearMarksDrag(){
        root.querySelectorAll(".drag-item").forEach(el => el.classList.remove("correct", "wrong"));
    }
});
</script>
@endpush