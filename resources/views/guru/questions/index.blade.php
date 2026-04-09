<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Soal - {{ $quiz->title }}</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alata&family=Itim&family=Kumbh+Sans:wght,YOPQ@100..900,300&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

  <style>
body{
  font-family:Poppins,Arial;
  background:#5c8ab7; 
  padding:20px
}
.card{
  background:#fff;
  border:1px solid rgba(0,0,0,.12);
  border-radius:14px;
  padding:16px;
  margin-bottom:12px
}
.btn{
  padding:10px 12px;
  border-radius:12px;
  border:0;
  cursor:pointer;
  font-weight:600
}
.btn-primary{
  background:#006A67;
  color:#fff
}
.btn-danger{
  background:#e23d3d;
  color:#fff
}
.btn-ghost{
  background:#fff;
  border:1px solid rgba(0,0,0,.15)
}
.row{
  display:flex;
  gap:10px;
  flex-wrap:wrap
}
table{
  width:100%;
  border-collapse:collapse
}
td,th{
  padding:10px;
  border-bottom:1px solid rgba(0,0,0,.08);
  text-align:left
}

.popup{
  position:fixed;
  inset:0;
  background:rgba(0,0,0,.5);
  display:flex;
  justify-content:center;
  align-items:center;
}

.popup-box{
  position:relative;
  background:#fff;
  width:450px;
  max-width:90%;
  padding:45px 35px;
  border-radius:18px;
  text-align:center;
}

.close-btn{
  position:absolute;
  top:15px;
  right:20px;
  background:none;
  border:none;
  color:#666;
  cursor:pointer;
  font-size:14px;
}

.popup-box h3{
  margin:0;
  font-size:20px;
  font-weight:600;
}

.popup-box p{
  margin:15px 0 30px;
  font-size:14px;
  color:#555;
}

.ok-btn{
  padding:10px 35px;
  border:none;
  border-radius:8px;
  background:#006A67;
  color:#fff;
  font-weight:600;
  cursor:pointer;
}
.success-icon{
  width:70px;
  height:70px;
  margin:0 auto 25px;
  border-radius:50%;
  background:#1e8e5a;
  position:relative;
}

.success-icon::after{
  content:'';
  position:absolute;
  left:22px;
  top:18px;
  width:18px;
  height:30px;
  border:4px solid #fff;
  border-top:none;
  border-left:none;
  transform:rotate(45deg);
}

</style>
</head>
<body>
@if(session('success'))
<div class="popup">
  <div class="popup-box">

    <div class="success-icon"></div>
    <p>{{ session('success') }}</p>

    <button class="ok-btn"
      onclick="this.closest('.popup').style.display='none'">
      Tutup
    </button>

  </div>
</div>
@endif

  <div class="card">
    <h2 style="margin:0">Soal {{ $quiz->title }}</h2>
    <div style="margin-top:10px" class="row">
      <a href="{{ route('guru.questions.create', $quiz->id) }}">
        <button class="btn btn-primary">+ Tambah Soal</button>
      </a>
      <a href="{{ route('guru.quizzes.index') }}">        
        <button class="btn btn-ghost">Kembali ke Daftar Quiz</button>
      </a>
    </div>
  </div>

  <div class="card">
    <table>
      <thead>
        <tr>
          <th style="width:60px">No</th>
          <th>Soal</th>
          <th style="width:220px">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($quiz->questions as $i => $q)
          <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $q->question_text }}</td>
            <td>
              <div class="row">
                <a href="{{ route('guru.questions.edit', [$quiz->id, $q->id]) }}">
                  <button class="btn btn-ghost">Edit</button>
                </a>

                <form method="POST" action="{{ route('guru.questions.destroy', [$quiz->id, $q->id]) }}"
                      onsubmit="return confirm('Hapus soal ini?')">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger">Hapus</button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="3" style="color:#666">Belum ada soal.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

</body>
</html>
