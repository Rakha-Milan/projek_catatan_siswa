<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Catatan Proyek RPL')</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(-45deg, #0f0c29, #302b63, #24243e, #1a1a2e);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            color: #fff;
            overflow-x: hidden;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Floating orbs background */
        body::before,
        body::after {
            content: '';
            position: fixed;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.5;
            z-index: 0;
            pointer-events: none;
        }

        body::before {
            width: 400px;
            height: 400px;
            background: #7c3aed;
            top: -100px;
            right: -100px;
            animation: float 8s ease-in-out infinite;
        }

        body::after {
            width: 350px;
            height: 350px;
            background: #ec4899;
            bottom: -100px;
            left: -100px;
            animation: float 10s ease-in-out infinite reverse;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0); }
            50% { transform: translate(30px, 30px); }
        }

        /* Glass Navbar */
        .glass-nav {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-brand {
            font-weight: 800;
            font-size: 1.4rem;
            background: linear-gradient(135deg, #a78bfa, #f472b6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-link-custom {
            color: rgba(255, 255, 255, 0.7);
            font-weight: 500;
            padding: 0.5rem 1.2rem;
            border-radius: 12px;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link-custom:hover,
        .nav-link-custom.active {
            color: #fff;
            background: rgba(255, 255, 255, 0.1);
        }

        .nav-link-custom.active::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 50%;
            transform: translateX(-50%);
            width: 20px;
            height: 3px;
            background: linear-gradient(90deg, #a78bfa, #f472b6);
            border-radius: 3px;
        }

        /* Glass Card */
        .glass-card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 20px;
            padding: 1.8rem;
            transition: all 0.3s ease;
        }

        .glass-card:hover {
            background: rgba(255, 255, 255, 0.12);
            border-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        /* Main content */
        .main-wrapper {
            position: relative;
            z-index: 1;
            padding: 2rem 0 4rem;
        }

        /* Page title */
        .page-title {
            font-weight: 800;
            font-size: 2.2rem;
            margin-bottom: 0.3rem;
        }

        .page-subtitle {
            color: rgba(255, 255, 255, 0.6);
            font-size: 1rem;
        }

        /* Gradient text */
        .gradient-text {
            background: linear-gradient(135deg, #a78bfa, #f472b6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Buttons */
        .btn-gradient {
            background: linear-gradient(135deg, #8b5cf6, #ec4899);
            border: none;
            color: #fff;
            font-weight: 600;
            padding: 0.7rem 1.5rem;
            border-radius: 12px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(139, 92, 246, 0.3);
        }

        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(139, 92, 246, 0.5);
            color: #fff;
        }

        .btn-glass {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #fff;
            font-weight: 500;
            padding: 0.6rem 1.2rem;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .btn-glass:hover {
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        /* Form controls */
        .form-control-glass,
        .form-select-glass {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #fff;
            padding: 0.8rem 1rem;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .form-control-glass:focus,
        .form-select-glass:focus {
            background: rgba(255, 255, 255, 0.1);
            border-color: #a78bfa;
            color: #fff;
            box-shadow: 0 0 0 3px rgba(167, 139, 250, 0.2);
        }

        .form-control-glass::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .form-label {
            color: rgba(255, 255, 255, 0.8);
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        /* Table */
        .table-glass {
            color: #fff;
        }

        .table-glass thead th {
            background: rgba(255, 255, 255, 0.05);
            border: none;
            color: rgba(255, 255, 255, 0.7);
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 1rem;
        }

        .table-glass tbody td {
            border-color: rgba(255, 255, 255, 0.08);
            padding: 1rem;
            vertical-align: middle;
        }

        .table-glass tbody tr {
            transition: all 0.3s ease;
        }

        .table-glass tbody tr:hover {
            background: rgba(255, 255, 255, 0.05);
        }

        /* Status badges */
        .badge-glass {
            padding: 0.4rem 0.9rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.75rem;
            border: 1px solid;
        }

        .badge-perencanaan {
            background: rgba(251, 191, 36, 0.15);
            color: #fbbf24;
            border-color: rgba(251, 191, 36, 0.3);
        }

        .badge-proses {
            background: rgba(59, 130, 246, 0.15);
            color: #60a5fa;
            border-color: rgba(59, 130, 246, 0.3);
        }

        .badge-revisi {
            background: rgba(249, 115, 22, 0.15);
            color: #fb923c;
            border-color: rgba(249, 115, 22, 0.3);
        }

        .badge-selesai {
            background: rgba(34, 197, 94, 0.15);
            color: #4ade80;
            border-color: rgba(34, 197, 94, 0.3);
        }

        /* Alerts */
        .alert-glass {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 16px;
            color: #fff;
        }

        .alert-success-glass {
            border-left: 4px solid #4ade80;
        }

        .alert-danger-glass {
            border-left: 4px solid #f87171;
        }

        /* User chip */
        .user-chip {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            padding: 0.4rem 1rem 0.4rem 0.4rem;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, #8b5cf6, #ec4899);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: #fff;
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }
        ::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* Action buttons */
        .btn-icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-icon-edit {
            background: rgba(59, 130, 246, 0.15);
            color: #60a5fa;
        }

        .btn-icon-edit:hover {
            background: rgba(59, 130, 246, 0.3);
            color: #fff;
        }

        .btn-icon-delete {
            background: rgba(239, 68, 68, 0.15);
            color: #f87171;
        }

        .btn-icon-delete:hover {
            background: rgba(239, 68, 68, 0.3);
            color: #fff;
        }

        /* Empty state */
        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
        }

        .empty-state i {
            font-size: 4rem;
            color: rgba(255, 255, 255, 0.2);
            margin-bottom: 1rem;
        }

        @media (max-width: 768px) {
            .page-title {
                font-size: 1.6rem;
            }
            .glass-card {
                padding: 1.2rem;
            }
        }
    </style>
</head>
<body>

    @auth
    <nav class="glass-nav">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('dashboard') }}" class="nav-brand text-decoration-none">
                    <i class="bi bi-hexagon-fill me-2"></i>ProyekRPL
                </a>

                <div class="d-flex align-items-center gap-3">
                    <a href="{{ route('dashboard') }}" class="nav-link-custom {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="bi bi-grid me-1"></i> Dashboard
                    </a>
                    <a href="{{ route('proyek.index') }}" class="nav-link-custom {{ request()->routeIs('proyek.*') ? 'active' : '' }}">
                        <i class="bi bi-folder me-1"></i> Proyek
                    </a>
                    <a href="{{ route('laporan') }}" class="nav-link-custom {{ request()->routeIs('laporan') ? 'active' : '' }}">
                        <i class="bi bi-file-earmark-text me-1"></i> Laporan
                    </a>

                    <div class="user-chip">
                        <div class="user-avatar">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <div class="d-none d-md-block">
                            <div class="fw-semibold" style="font-size: 0.85rem;">{{ Auth::user()->name }}</div>
                        </div>
                    </div>

                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-glass btn-sm">
                            <i class="bi bi-box-arrow-right"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    @endauth

    <div class="main-wrapper">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-glass alert-success-glass alert-dismissible fade show">
                    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-glass alert-danger-glass alert-dismissible fade show">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>