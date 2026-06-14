<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alata&family=Itim&family=Kumbh+Sans:wght@300;400;500;600;700;800;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Rubik:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        #finisher-background {
            position: fixed;
            inset: 0;
            z-index: 0;
            pointer-events: none;
        }

        body { 
            position: relative;
            z-index: 1;
            background: radial-gradient(circle at center, #0a192f, #050d1a 70%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #111827;
            font-family: 'Poppins', sans-serif;
        }
        
        .page-wrapper {
            width: 100%;
            max-width: 1200px;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
            align-items: stretch;
            gap: 40px;
        }

        .side-illustration { flex: 1; position: relative; display: none; }
        .side-illustration.left {
            background: url("img/left-illustration.svg") no-repeat center bottom;
            background-size: contain;
        }
        .side-illustration.right {
            background: url("img/right-illustration.svg") no-repeat center bottom;
            background-size: contain;
        }
        @media (min-width: 992px) { .side-illustration { display: block; } }

        .card {
            flex: 1.1;
            max-width: 480px;
            background: #ffffff;
            border-radius: 18px;
            box-shadow: 0 18px 45px rgba(15, 23, 42, 0.12);
            padding: 26px 32px 32px;
            display: flex;
            flex-direction: column;
            gap: 22px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: #4b5563;
            text-decoration: none;
            margin-bottom: 4px;
        }
        .back-link i { font-size: 14px; }
        .back-link:hover { color: #1f2937; }

        .card-title {
            font-size: 24px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 6px;
        }

        .alert {
            background: #fee2e2;
            border: 1px solid #fecaca;
            color: #991b1b;
            padding: 10px 12px;
            border-radius: 10px;
            font-size: 14px;
        }

        .form {
            margin-top: 6px;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .form-group { display: flex; flex-direction: column; gap: 6px; }
        .form-label { font-size: 14px; font-weight: 500; color: #374151; }

        .input-wrapper { position: relative; }
        .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 14px;
            color: #9ca3af;
        }

        .form-input {
            width: 100%;
            border-radius: 10px;
            border: 1px solid #d1d5db;
            padding: 10px 12px 10px 36px;
            font-size: 14px;
            color: #111827;
            outline: none;
            background-color: #f9fafb;
            transition: border-color 0.15s ease, background-color 0.15s ease, box-shadow 0.15s ease;
        }

        .form-input::placeholder { color: #9ca3af; }

        .form-input:focus {
            border-color: #2563eb;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
        }

        /* wrapper input + icon mata */
        .input-wrapper{
        position: relative;
        }

        .toggle-pass{
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        border: none;
        background: transparent;
        color: #9ca3af;
        cursor: pointer;
        font-size: 14px;
        padding: 6px;
        line-height: 1;
        }

        .toggle-pass:hover{
        color: #6b7280;
        }

        /* karena sekarang ada icon kiri + icon kanan */
        .form-input.has-eye{
        padding-right: 42px;
        }

        .btn-submit {
            width: 100%;
            border: none;
            border-radius: 10px;
            padding: 12px;
            margin-top: 8px;
            background: #000B58;
            color: #ffffff;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.15s ease, transform 0.1s ease, box-shadow 0.15s ease;
        }

        .btn-submit:hover {
            background: #003161;
            box-shadow: 0 10px 20px rgba(15, 23, 42, 0.25);
            transform: translateY(-1px);
        }

        .btn-submit:active {
            transform: translateY(0);
            box-shadow: none;
        }

        .login-text {
            text-align: center;
            font-size: 14px;
            margin-top: 4px;
            color: #6b7280;
        }

        .login-text a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 600;
        }
        .login-text a:hover { text-decoration: underline; }

        @media (max-width: 640px) {
            .card { padding: 20px 18px 24px; }
            .card-title { font-size: 20px; }
        }
    </style>
</head>
<body>
<div id="finisher-background"></div>

<div class="page-wrapper">
    <div class="side-illustration left"></div>

    <div class="card">
        <a href="{{ route('landing') }}" class="back-link">
            <i class="fa-solid fa-arrow-left-long"></i>
            <span>Kembali Ke Halaman Utama</span>
        </a>

        <h1 class="card-title">Daftar Akun</h1>

        @if ($errors->any())
            <div class="alert">
                <ul style="margin-left:16px">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="form" method="POST" action="{{ route('register.submit') }}">
            @csrf

            <div class="form-group">
                <label class="form-label" for="username">Nama Lengkap Siswa</label>
                <div class="input-wrapper">
                    <span class="input-icon"><i class="fa-regular fa-user"></i></span>
                    <input type="text" id="username" name="username" class="form-input"
                           placeholder="Cth Aulia" value="{{ old('username') }}" required>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="nis">NISN</label>
                <div class="input-wrapper">
                    <span class="input-icon"><i class="fa-regular fa-id-card"></i></span>
                    <input type="text" id="nisn" name="nisn" class="form-input"
                           placeholder="Cth 9990123456" value="{{ old('nisn') }}" required>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <div class="input-wrapper">
                    <span class="input-icon"><i class="fa-regular fa-envelope"></i></span>
                    <input type="email" id="email" name="email" class="form-input"
                           placeholder="example@gmail.com" value="{{ old('email') }}" required>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="kelas">Kelas</label>
                <div class="input-wrapper">
                <span style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#6c757d;font-size:14px;"><i class="fa-solid fa-school"></i></span>
                <select name="kelas" required style="width:100%;padding:10px 12px 10px 38px;border-radius:10px;border:1px solid rgba(0,0,0,.15);font-size:14px;background:#fff;outline:none;appearance:none;cursor:pointer;">                    <option value="">-- Pilih Kelas --</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                </select>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <div class="input-wrapper">
                    <span class="input-icon"><i class="fa-solid fa-lock"></i></span>

                    <input type="password"
                        id="password"
                        name="password"
                        class="form-input has-eye"
                        placeholder="Password"
                        required>

                    <button type="button"
                            class="toggle-pass"
                            data-target="password"
                            aria-label="Tampilkan password">
                        <i class="fa-regular fa-eye"></i>
                    </button>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="password_confirmation">Konfirmasi Password</label>
                <div class="input-wrapper">
                    <span class="input-icon"><i class="fa-solid fa-lock"></i></span>

                    <input type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        class="form-input has-eye"
                        placeholder="Ulangi Password"
                        required>

                    <button type="button"
                            class="toggle-pass"
                            data-target="password_confirmation"
                            aria-label="Tampilkan konfirmasi password">
                        <i class="fa-regular fa-eye"></i>
                    </button>
                </div>
            </div>

            <button type="submit" class="btn-submit">Register</button>
        </form>

        <p class="login-text">
            Punya akun?
            <a href="{{ route('login.lihat') }}">Masuk</a>
        </p>
    </div>

    <div class="side-illustration right"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/tsparticles@2/tsparticles.bundle.min.js"></script>

<script>
tsParticles.load("finisher-background", {
    background: {
        color: { value: "transparent" }
    },
    particles: {
        number: {
            value: 80
        },
        color: {
            value: ["#00f2ff", "#00c3ff", "#8affff"]
        },
        shape: {
            type: "circle"
        },
        opacity: {
            value: { min: 0.3, max: 0.8 },
            animation: {
                enable: true,
                speed: 0.8,
                minimumValue: 0.3,
                sync: false
            }
        },
        size: {
            value: { min: 1, max: 4 }
        },
        move: {
            enable: true,
            speed: 0.6,
            direction: "none",
            random: true,
            straight: false,
            outModes: {
                default: "out"
            }
        },
        links: {
            enable: false  
        }
    },
    detectRetina: true
});
</script>

<script>
document.querySelectorAll(".toggle-pass").forEach((btn) => {
  btn.addEventListener("click", () => {
    const targetId = btn.getAttribute("data-target");
    const input = document.getElementById(targetId);
    const icon = btn.querySelector("i");

    if (!input) return;

    const isPassword = input.type === "password";
    input.type = isPassword ? "text" : "password";

    // ganti icon eye / eye-slash
    icon.classList.toggle("fa-eye", !isPassword);
    icon.classList.toggle("fa-eye-slash", isPassword);

    // update aria-label
    btn.setAttribute("aria-label", isPassword ? "Sembunyikan password" : "Tampilkan password");
  });
});
</script>

</body>
</html>
