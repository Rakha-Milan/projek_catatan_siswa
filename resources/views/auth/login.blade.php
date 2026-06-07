<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ProyekRPL</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; }
        body {
            min-height: 100vh;
            background: linear-gradient(-45deg, #0f0c29, #302b63, #24243e, #1a1a2e);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            position: relative;
            overflow: hidden;
        }
        @keyframes gradientBG {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        body::before, body::after {
            content: '';
            position: fixed;
            border-radius: 50%;
            filter: blur(100px);
            opacity: 0.6;
            z-index: 0;
        }
        body::before {
            width: 500px; height: 500px;
            background: #7c3aed;
            top: -150px; right: -150px;
        }
        body::after {
            width: 450px; height: 450px;
            background: #ec4899;
            bottom: -150px; left: -150px;
        }
        .login-card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(30px);
            -webkit-backdrop-filter: blur(30px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 24px;
            padding: 2.5rem;
            max-width: 420px;
            width: 100%;
            position: relative;
            z-index: 1;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }
        .brand {
            font-weight: 800;
            font-size: 1.8rem;
            background: linear-gradient(135deg, #a78bfa, #f472b6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-align: center;
            margin-bottom: 0.5rem;
        }
        .brand-sub {
            text-align: center;
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
            margin-bottom: 2rem;
        }
        .form-control-glass {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #fff;
            padding: 0.9rem 1rem;
            border-radius: 12px;
            transition: all 0.3s ease;
        }
        .form-control-glass:focus {
            background: rgba(255, 255, 255, 0.1);
            border-color: #a78bfa;
            color: #fff;
            box-shadow: 0 0 0 3px rgba(167, 139, 250, 0.2);
        }
        .form-control-glass::placeholder { color: rgba(255, 255, 255, 0.4); }
        .form-label {
            color: rgba(255, 255, 255, 0.8);
            font-weight: 600;
            font-size: 0.85rem;
            margin-bottom: 0.5rem;
        }
        .btn-gradient {
            background: linear-gradient(135deg, #8b5cf6, #ec4899);
            border: none;
            color: #fff;
            font-weight: 600;
            padding: 0.85rem;
            border-radius: 12px;
            width: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(139, 92, 246, 0.4);
        }
        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(139, 92, 246, 0.6);
            color: #fff;
        }
        .link-custom {
            color: #a78bfa;
            text-decoration: none;
            font-weight: 600;
        }
        .link-custom:hover { color: #f472b6; }
        .alert-glass {
            background: rgba(239, 68, 68, 0.15);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #fca5a5;
            border-radius: 12px;
            padding: 0.8rem 1rem;
            font-size: 0.9rem;
        }
        .input-icon-wrapper {
            position: relative;
        }
        .input-icon-wrapper i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.4);
        }
        .input-icon-wrapper .form-control-glass {
            padding-left: 2.8rem;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="brand">
            <i class="bi bi-hexagon-fill"></i> ProyekRPL
        </div>
        <div class="brand-sub">Masuk ke akun siswa Anda</div>

        @if($errors->any())
            <div class="alert-glass mb-3">
                <i class="bi bi-exclamation-circle me-2"></i>{{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email</label>
                <div class="input-icon-wrapper">
                    <i class="bi bi-envelope"></i>
                    <input type="email" name="email" class="form-control form-control-glass" value="{{ old('email') }}" placeholder="nama@email.com" required autofocus>
                </div>
            </div>
            <div class="mb-4">
                <label class="form-label">Password</label>
                <div class="input-icon-wrapper">
                    <i class="bi bi-lock"></i>
                    <input type="password" name="password" class="form-control form-control-glass" placeholder="Masukkan password" required>
                </div>
            </div>
            <button type="submit" class="btn btn-gradient">
                Masuk <i class="bi bi-arrow-right ms-2"></i>
            </button>
        </form>

        <div class="text-center mt-4" style="color: rgba(255, 255, 255, 0.6); font-size: 0.9rem;">
            Belum punya akun? <a href="{{ route('register') }}" class="link-custom">Daftar sekarang</a>
        </div>
    </div>
</body>
</html>