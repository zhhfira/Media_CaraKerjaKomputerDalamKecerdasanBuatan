<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tambah Soal</title>
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
    font-weight:600;
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
    padding:8px 10px;        
    border-radius:10px;
    border:1px solid rgba(0,0,0,.15);
    font-weight:600;
    font-size:13px;
    background:#fff;
  }

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

  /* jarak tombol */
  .card form > div:last-child{
    margin-top:18px;
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
<body>

    {{-- NOTIFIKASI SUCCESS --}}
    @if(session('success'))
        <div class="bubble-success" id="notif">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')

  <div class="card">
    <h2 style="margin-top:0">Tambah Soal - {{ $quiz->title }}</h2>

    @if ($errors->any())
      <div style="color:#e23d3d;font-weight:600;margin-bottom:12px">
        <ul style="margin:0;padding-left:18px">
          @foreach($errors->all() as $err)
            <li>{{ $err }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('guru.questions.store', $quiz->id) }}" enctype="multipart/form-data">
      @csrf

    <label>Soal Nomor {{ $nomorSoal }}</label>
    <textarea name="question_text" rows="3" required>{{ old('question_text') }}</textarea>

      <label>Gambar Soal 
        <span style="font-weight:400;color:#888;font-size:12px">(opsional)</span>
      </label>

      <div class="upload-area" id="upload-area">
        <input type="file" name="question_image" id="input-gambar"
              accept="image/jpeg,image/png,image/gif,image/webp">
        <div class="upload-icon"><i class="fa-regular fa-image"></i></div>
        <div class="upload-text">Klik atau seret gambar ke sini</div>
        <div class="upload-hint">Format: JPG, PNG, GIF, WEBP — Maks. 2 MB</div>
      </div>

      <div id="preview-wrapper" style="display:none">
        <img id="img-preview" src="" alt="Preview Gambar Soal">
        <button type="button" id="btn-hapus-gambar" title="Hapus gambar">
          <i class="fa-solid fa-xmark"></i>
        </button>
      </div>

      <div class="grid2">
        {{-- Opsi A --}}
        <div>
          <label>Opsi A</label>
          <input type="hidden" name="options[0][label]" value="A">
          <input class="input" name="options[0][text]" value="{{ old('options.0.text') }}" required>
        </div>

        {{-- Opsi B --}}
        <div>
          <label>Opsi B</label>
          <input type="hidden" name="options[1][label]" value="B">
          <input class="input" name="options[1][text]" value="{{ old('options.1.text') }}" required>
        </div>

        {{-- Opsi C --}}
        <div>
          <label>Opsi C</label>
          <input type="hidden" name="options[2][label]" value="C">
          <input class="input" name="options[2][text]" value="{{ old('options.2.text') }}" required>
        </div>

        {{-- Opsi D --}}
        <div>
          <label>Opsi D</label>
          <input type="hidden" name="options[3][label]" value="D">
          <input class="input" name="options[3][text]" value="{{ old('options.3.text') }}" required>
        </div>

        {{-- Opsi E --}}
        <div>
          <label>Opsi E</label>
          <input type="hidden" name="options[4][label]" value="E">
          <input class="input" name="options[4][text]" value="{{ old('options.4.text') }}" required>
        </div>
      </div>

      <label>Jawaban Benar</label>
      <select name="correct_label" class="input" required>
        <option value="">-- pilih --</option>
        @foreach(['A','B','C','D','E'] as $x)
          <option value="{{ $x }}" {{ old('correct_label')===$x ? 'selected' : '' }}>{{ $x }}</option>
        @endforeach
      </select>

      <div style="display:flex;gap:10px;flex-wrap:wrap;margin-top:14px">
        <button class="btn btn-primary" type="submit">Simpan Soal</button>

        <a href="{{ route('guru.questions.index', $quiz->id) }}" class="btn btn-ghost" style="text-decoration:none;display:inline-flex;align-items:center">
          Batal
        </a>
      </div>
    </form>
  </div>
<script>
setTimeout(function(){
    const notif = document.getElementById('notif');
    if(notif){
        notif.style.display = 'none';
    }
}, 3000);
</script>
<script>
const inputGambar    = document.getElementById('input-gambar');
const previewWrapper = document.getElementById('preview-wrapper');
const imgPreview     = document.getElementById('img-preview');
const btnHapus       = document.getElementById('btn-hapus-gambar');
const uploadArea     = document.getElementById('upload-area');

inputGambar.addEventListener('change', function () {
  tampilkanPreview(this.files[0]);
});

uploadArea.addEventListener('dragover', e => {
  e.preventDefault();
  uploadArea.classList.add('drag-over');
});
uploadArea.addEventListener('dragleave', () => uploadArea.classList.remove('drag-over'));
uploadArea.addEventListener('drop', e => {
  e.preventDefault();
  uploadArea.classList.remove('drag-over');
  const file = e.dataTransfer.files[0];
  if (file) {
    const dt = new DataTransfer();
    dt.items.add(file);
    inputGambar.files = dt.files;
    tampilkanPreview(file);
  }
});

function tampilkanPreview(file) {
  if (!file) return;
  if (file.size > 2 * 1024 * 1024) {
    alert('Ukuran gambar maksimal 2 MB.');
    inputGambar.value = '';
    return;
  }
  const reader = new FileReader();
  reader.onload = e => {
    imgPreview.src = e.target.result;
    previewWrapper.style.display = 'block';
    uploadArea.style.display = 'none';
  };
  reader.readAsDataURL(file);
}

btnHapus.addEventListener('click', () => {
  inputGambar.value = '';
  imgPreview.src = '';
  previewWrapper.style.display = 'none';
  uploadArea.style.display = 'block';
});
</script>
</body>
</html>
