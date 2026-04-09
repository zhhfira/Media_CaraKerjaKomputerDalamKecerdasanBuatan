<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Soal</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alata&family=Itim&family=Kumbh+Sans:wght,YOPQ@100..900,300&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

  <style>
  body{
    font-family:Poppins, Arial, sans-serif;
    background:#5c8ab7;
    padding:24px;
    margin:0;
  }

  /* kartu utama */
  .card{
    background:#fff;
    border:1px solid rgba(0,0,0,.08);
    border-radius:16px;
    padding:28px 28px;  
    max-width:720px;     
    margin:auto;
    box-shadow:0 8px 18px rgba(0,0,0,.08);
  }

  /* judul */
  .card h2{
    margin-top:0;
    margin-bottom:16px;
    font-size:18px;
    font-weight:700;
  }

  /* label */
  label{
    font-weight:600;
    margin:12px 0 5px;
    display:block;
  }

  /* input */
  .input,
  textarea,
  select{
    width:100%;
    padding:8px 10px;        /* diperkecil */
    border-radius:10px;
    border:1px solid rgba(0,0,0,.15);
    font-weight:500;
    font-size:12px;
    background:#fff;
  }

  /* tinggi textarea lebih proporsional */
  textarea{
    min-height:80px;
    resize:vertical;
  }

  /* efek fokus */
  .input:focus,
  textarea:focus,
  select:focus{
    outline:none;
    border-color:#006A67;
    box-shadow:0 0 0 2px rgba(0,106,103,.15);
  }

  /* grid opsi */
  .grid2{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:16px 30px; 
    margin-top:6px;
  }

  /* tombol */
  .btn{
    padding:8px 14px;
    border-radius:10px;
    border:0;
    cursor:pointer;
    font-weight:600;
    font-size:14px;
  }

  .btn-primary{
    background:#006A67;
    color:#fff;
  }

  .btn-primary:hover{
    background:#005552;
  }

  .btn-ghost{
    background:#fff;
    border:1px solid rgba(0,0,0,.15);
  }

  .btn-ghost:hover{
    background:#f2f2f2;
  }

  label{
    font-weight: 600;
    margin: 10px 0 6px;
    display: block;
  }
  .upload-area {
  border: 2px dashed rgba(0,106,103,.4);
  border-radius: 12px;
  padding: 20px;
  text-align: center;
  cursor: pointer;
  background: #f8fffe;
  margin-top: 6px;
  position: relative;
  transition: border-color .2s, background .2s;
}
.upload-area:hover { border-color: #006A67; background: #edf7f7; }
.upload-area input[type="file"] {
  position: absolute; inset: 0; opacity: 0;
  cursor: pointer; width: 100%; height: 100%;
}
.upload-icon { font-size: 28px; color: #006A67; margin-bottom: 6px; }
.upload-text  { font-size: 13px; color: #555; font-weight: 500; }
.upload-hint  { font-size: 11px; color: #999; margin-top: 4px; }

#preview-wrapper {
  margin-top: 12px;
  position: relative;
  text-align: center;
}
#img-preview {
  max-width: 100%; max-height: 220px;
  border-radius: 10px;
  border: 1px solid rgba(0,0,0,.12);
  object-fit: contain;
}
#btn-hapus-gambar {
  position: absolute; top: 6px; right: 6px;
  background: rgba(226,61,61,.85); color: #fff;
  border: none; border-radius: 50%;
  width: 28px; height: 28px; font-size: 13px;
  cursor: pointer; display: flex;
  align-items: center; justify-content: center;
}
#btn-hapus-gambar:hover { background: #c0392b; }
  </style>
</head>
<body>

  <div class="card">
    <h2 style="margin-top:0">Edit Soal - {{ $quiz->title }}</h2>

    @php
      // Ambil label jawaban yang benar dari DB
      $correctLabel = optional($question->options->firstWhere('is_correct', 1))->option_label;
      // Susun opsi agar gampang dipanggil: A..E
      $optByLabel = $question->options->keyBy('option_label');
      $labels = ['A','B','C','D','E'];
    @endphp

    @if ($errors->any())
      <div style="color:#e23d3d;font-weight:800;margin-bottom:12px">
        <ul style="margin:0;padding-left:18px">
          @foreach($errors->all() as $err)
            <li>{{ $err }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('guru.questions.update', [$quiz->id, $question->id]) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')

     <label>Soal Nomor {{ $question->order_no }}</label>
    <textarea name="question_text" rows="3" required>{{ old('question_text', $question->question_text) }}</textarea>

      <label>Gambar Soal
        <span style="font-weight:400;color:#888;font-size:12px">(opsional)</span>
      </label>

      @if($question->question_image)
        <div id="preview-wrapper" style="position:relative;text-align:center;margin-top:6px">
          <img id="img-preview"
              src="{{ asset('storage/' . $question->question_image) }}"
              style="max-width:100%;max-height:220px;border-radius:10px;
                      border:1px solid rgba(0,0,0,.12);object-fit:contain">
          <button type="button" id="btn-hapus-gambar" title="Hapus gambar"
                  style="position:absolute;top:6px;right:6px;
                        background:rgba(226,61,61,.85);color:#fff;
                        border:none;border-radius:50%;width:28px;height:28px;
                        font-size:13px;cursor:pointer">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>

        <div id="hapus-checkbox" style="display:none;margin-top:8px">
          <input type="checkbox" name="hapus_gambar" id="hapus_gambar" value="1" checked>
          <label for="hapus_gambar" style="display:inline;font-weight:400;font-size:13px;color:#e23d3d">
            Hapus gambar ini
          </label>
        </div>
      @endif

      {{-- Area upload gambar baru --}}
      <div class="upload-area" id="upload-area"
          style="{{ $question->question_image ? 'display:none' : '' }}">
        <input type="file" name="question_image" id="input-gambar"
              accept="image/jpeg,image/png,image/gif,image/webp">
        <div class="upload-icon"><i class="fa-regular fa-image"></i></div>
        <div class="upload-text">Klik atau seret gambar ke sini</div>
        <div class="upload-hint">Format: JPG, PNG, GIF, WEBP — Maks. 2 MB</div>
      </div>

      <div class="grid2">
        @foreach($labels as $i => $lab)
          @php
            $opt = $optByLabel->get($lab);
          @endphp

          <div>
            <label>Opsi {{ $lab }}</label>

            {{-- ini wajib untuk update: options.*.id --}}
            <input type="hidden" name="options[{{ $i }}][id]" value="{{ $opt?->id }}">

            {{-- labelnya tetap --}}
            <input type="hidden" name="options[{{ $i }}][label]" value="{{ $lab }}">

            {{-- teks opsi --}}
            <input class="input"
                   name="options[{{ $i }}][text]"
                   value="{{ old("options.$i.text", $opt?->option_text) }}"
                   required>
          </div>
        @endforeach
      </div>

      <label>Jawaban Benar</label>
      <select name="correct_label" class="input" required>
        <option value="">-- pilih --</option>
        @foreach($labels as $lab)
          <option value="{{ $lab }}"
            {{ old('correct_label', $correctLabel) === $lab ? 'selected' : '' }}>
            {{ $lab }}
          </option>
        @endforeach
      </select>

      <div style="display:flex;gap:10px;flex-wrap:wrap;margin-top:14px">
        <button class="btn btn-primary" type="submit">Update Soal</button>

        <a href="{{ route('guru.questions.index', $quiz->id) }}"
           class="btn btn-ghost"
           style="text-decoration:none;display:inline-flex;align-items:center">
          Batal
        </a>
      </div>
    </form>
  </div>
<script>
const inputGambar    = document.getElementById('input-gambar');
const previewWrapper = document.getElementById('preview-wrapper');
const imgPreview     = document.getElementById('img-preview');
const btnHapus       = document.getElementById('btn-hapus-gambar');
const hapusCheckbox  = document.getElementById('hapus-checkbox');
const uploadArea     = document.getElementById('upload-area');

// Tombol X → sembunyikan preview lama, tampilkan checkbox + area upload
if (btnHapus) {
  btnHapus.addEventListener('click', () => {
    previewWrapper.style.display = 'none';
    hapusCheckbox.style.display  = 'block';
    uploadArea.style.display     = 'block';
  });
}

// Preview gambar baru
if (inputGambar) {
  inputGambar.addEventListener('change', function () {
    tampilkanPreview(this.files[0]);
  });
}

function tampilkanPreview(file) {
  if (!file) return;
  if (file.size > 2 * 1024 * 1024) {
    alert('Ukuran gambar maksimal 2 MB.');
    inputGambar.value = '';
    return;
  }
  const reader = new FileReader();
  reader.onload = e => {
    if (imgPreview) {
      imgPreview.src = e.target.result;
      previewWrapper.style.display = 'block';
    } else {
      const wrap = document.createElement('div');
      wrap.style.cssText = 'text-align:center;margin-top:12px';
      wrap.innerHTML = `<img src="${e.target.result}"
        style="max-width:100%;max-height:220px;border-radius:10px;
               border:1px solid rgba(0,0,0,.12);object-fit:contain">`;
      uploadArea.insertAdjacentElement('afterend', wrap);
    }
    uploadArea.style.display = 'none';
  };
  reader.readAsDataURL(file);
}
</script>
</body>
</html>
