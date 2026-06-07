@extends('layouts.app')
@section('title', 'Laporan Proyek')
@section('content')
<div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-4 no-print">
    <div>
        <h1 class="page-title">Laporan <span class="gradient-text">Proyek</span></h1>
        <p class="page-subtitle mb-0">Cetak atau simpan laporan proyek Anda</p>
    </div>
    <div class="d-flex gap-2">
        <button onclick="window.print()" class="btn btn-gradient">
            <i class="bi bi-printer me-1"></i> Cetak Laporan
        </button>
        <a href="{{ route('proyek.index') }}" class="btn btn-glass">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>

<div class="glass-card print-area">
    <div class="text-center mb-4 pb-3" style="border-bottom: 2px solid rgba(255,255,255,0.1);">
        <h2 class="fw-bold gradient-text mb-1">LAPORAN CATATAN PROYEK SISWA RPL</h2>
        <div style="color: rgba(255,255,255,0.6); font-size: 0.9rem;">Sistem Informasi Manajemen Proyek Siswa</div>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="mb-2">
                <div style="color: rgba(255,255,255,0.5); font-size: 0.8rem; font-weight: 600; text-transform: uppercase;">Nama Siswa</div>
                <div class="fw-semibold">{{ $user->name }}</div>
            </div>
            <div>
                <div style="color: rgba(255,255,255,0.5); font-size: 0.8rem; font-weight: 600; text-transform: uppercase;">Email</div>
                <div class="fw-semibold">{{ $user->email }}</div>
            </div>
        </div>
        <div class="col-md-6 text-md-end">
            <div>
                <div style="color: rgba(255,255,255,0.5); font-size: 0.8rem; font-weight: 600; text-transform: uppercase;">Tanggal Cetak</div>
                <div class="fw-semibold">{{ \Carbon\Carbon::now()->locale('id')->isoFormat('D MMMM YYYY') }}</div>
            </div>
            <div class="mt-2">
                <div style="color: rgba(255,255,255,0.5); font-size: 0.8rem; font-weight: 600; text-transform: uppercase;">Total Proyek</div>
                <div class="fw-semibold gradient-text" style="font-size: 1.5rem;">{{ $proyeks->count() }} Proyek</div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-glass">
            <thead>
                <tr>
                    <th style="width: 5%;">No</th>
                    <th>Nama Proyek</th>
                    <th>Jenis</th>
                    <th>Teknologi</th>
                    <th>Status</th>
                    <th>Tgl Mulai</th>
                    <th>Tgl Selesai</th>
                </tr>
            </thead>
            <tbody>
                @forelse($proyeks as $index => $p)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td class="fw-semibold">{{ $p->nama_proyek }}</td>
                        <td>{{ $p->jenis_proyek }}</td>
                        <td>{{ $p->teknologi }}</td>
                        <td><span class="badge-glass badge-{{ strtolower($p->status_proyek) }}">{{ $p->status_proyek }}</span></td>
                        <td>{{ \Carbon\Carbon::parse($p->tanggal_mulai)->format('d/m/Y') }}</td>
                        <td>{{ $p->tanggal_selesai ? \Carbon\Carbon::parse($p->tanggal_selesai)->format('d/m/Y') : '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4" style="color: rgba(255,255,255,0.5);">
                            <i class="bi bi-inbox" style="font-size: 2rem; display: block; margin-bottom: 0.5rem;"></i>
                            Tidak ada data proyek
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="row mt-5 pt-3">
        <div class="col-md-4 offset-md-8 text-end">
            <div style="color: rgba(255,255,255,0.6); font-size: 0.9rem;">{{ \Carbon\Carbon::now()->locale('id')->isoFormat('D MMMM YYYY') }}</div>
            <div class="mb-5" style="color: rgba(255,255,255,0.6); font-size: 0.9rem;">Mengetahui,</div>
            <div class="fw-bold gradient-text" style="font-size: 1.1rem;">{{ $user->name }}</div>
            <div style="color: rgba(255,255,255,0.5); font-size: 0.85rem;">Siswa RPL</div>
        </div>
    </div>
</div>

<style>
    @media print {
        body {
            background: white !important;
            color: black !important;
        }
        body::before, body::after { display: none; }
        .glass-nav, .no-print, .btn, .alert { display: none !important; }
        .glass-card, .print-area {
            background: white !important;
            border: none !important;
            box-shadow: none !important;
            color: black !important;
        }
        .gradient-text {
            -webkit-text-fill-color: #7c3aed !important;
            color: #7c3aed !important;
        }
        .table-glass thead th {
            background: #1a1a2e !important;
            color: white !important;
            -webkit-print-color-adjust: exact;
        }
        .table-glass tbody td {
            color: black !important;
            border-color: #ddd !important;
        }
        .badge-glass {
            background: #f3f4f6 !important;
            color: #374151 !important;
            border-color: #d1d5db !important;
        }
        .main-wrapper { padding: 0; }
    }
</style>
@endsection