@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h1 class="page-title">Halo, <span class="gradient-text">{{ $user->name }}</span> 👋</h1>
        <p class="page-subtitle">Berikut ringkasan proyek Anda hari ini</p>
    </div>
</div>

<!-- Bento Grid Stats -->
<div class="row g-3 mb-4">
    <div class="col-md-6 col-lg-3">
        <div class="glass-card h-100">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <div style="color: rgba(255,255,255,0.6); font-size: 0.85rem; font-weight: 500;">Total Proyek</div>
                    <div class="gradient-text" style="font-size: 2.5rem; font-weight: 800; line-height: 1;">{{ $totalProyek }}</div>
                </div>
                <div style="width: 48px; height: 48px; border-radius: 14px; background: linear-gradient(135deg, #8b5cf6, #ec4899); display: flex; align-items: center; justify-content: center;">
                    <i class="bi bi-folder-fill text-white" style="font-size: 1.4rem;"></i>
                </div>
            </div>
            <div style="color: rgba(255,255,255,0.5); font-size: 0.8rem;">
                <i class="bi bi-arrow-up-right"></i> Semua proyek Anda
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="glass-card h-100">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <div style="color: rgba(255,255,255,0.6); font-size: 0.85rem; font-weight: 500;">Perencanaan</div>
                    <div style="font-size: 2.5rem; font-weight: 800; line-height: 1; color: #fbbf24;">{{ $statusPerencanaan }}</div>
                </div>
                <div style="width: 48px; height: 48px; border-radius: 14px; background: rgba(251, 191, 36, 0.2); display: flex; align-items: center; justify-content: center;">
                    <i class="bi bi-lightbulb-fill" style="font-size: 1.4rem; color: #fbbf24;"></i>
                </div>
            </div>
            <div style="color: rgba(255,255,255,0.5); font-size: 0.8rem;">
                <i class="bi bi-clock"></i> Dalam tahap ide
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="glass-card h-100">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <div style="color: rgba(255,255,255,0.6); font-size: 0.85rem; font-weight: 500;">Proses / Revisi</div>
                    <div style="font-size: 2.5rem; font-weight: 800; line-height: 1; color: #60a5fa;">{{ $statusProsesRevisi }}</div>
                </div>
                <div style="width: 48px; height: 48px; border-radius: 14px; background: rgba(96, 165, 250, 0.2); display: flex; align-items: center; justify-content: center;">
                    <i class="bi bi-gear-fill" style="font-size: 1.4rem; color: #60a5fa;"></i>
                </div>
            </div>
            <div style="color: rgba(255,255,255,0.5); font-size: 0.8rem;">
                <i class="bi bi-activity"></i> Sedang dikerjakan
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="glass-card h-100">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <div style="color: rgba(255,255,255,0.6); font-size: 0.85rem; font-weight: 500;">Selesai</div>
                    <div style="font-size: 2.5rem; font-weight: 800; line-height: 1; color: #4ade80;">{{ $statusSelesai }}</div>
                </div>
                <div style="width: 48px; height: 48px; border-radius: 14px; background: rgba(74, 222, 128, 0.2); display: flex; align-items: center; justify-content: center;">
                    <i class="bi bi-check-circle-fill" style="font-size: 1.4rem; color: #4ade80;"></i>
                </div>
            </div>
            <div style="color: rgba(255,255,255,0.5); font-size: 0.8rem;">
                <i class="bi bi-trophy"></i> Proyek tuntas
            </div>
        </div>
    </div>
</div>

<!-- Bento: 5 Terbaru + Quick Action -->
<div class="row g-3">
    <div class="col-lg-8">
        <div class="glass-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold mb-1">Proyek Terbaru</h4>
                    <div style="color: rgba(255,255,255,0.5); font-size: 0.85rem;">5 proyek terakhir yang Anda kerjakan</div>
                </div>
                <a href="{{ route('proyek.index') }}" class="btn btn-glass btn-sm">
                    Lihat semua <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>

            @if($proyekTerbaru->isEmpty())
                <div class="empty-state">
                    <i class="bi bi-inbox"></i>
                    <div class="fw-semibold mb-1">Belum ada proyek</div>
                    <div style="color: rgba(255,255,255,0.5); font-size: 0.9rem;">Mulai dengan menambahkan proyek pertama Anda</div>
                    <a href="{{ route('proyek.create') }}" class="btn btn-gradient mt-3">
                        <i class="bi bi-plus-lg me-1"></i> Tambah Proyek
                    </a>
                </div>
            @else
                @foreach($proyekTerbaru as $p)
                    <div class="d-flex align-items-center justify-content-between py-3" style="border-bottom: 1px solid rgba(255,255,255,0.08);">
                        <div class="d-flex align-items-center gap-3 flex-grow-1">
                            <div style="width: 42px; height: 42px; border-radius: 12px; background: linear-gradient(135deg, #8b5cf6, #ec4899); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <i class="bi bi-code-slash text-white"></i>
                            </div>
                            <div class="flex-grow-1 min-w-0">
                                <div class="fw-semibold text-truncate">{{ $p->nama_proyek }}</div>
                                <div style="color: rgba(255,255,255,0.5); font-size: 0.8rem;">
                                    <i class="bi bi-tag me-1"></i>{{ $p->jenis_proyek }} · {{ $p->teknologi }}
                                </div>
                            </div>
                        </div>
                        <div class="text-end ms-3">
                            @php
                                $badgeClass = 'badge-perencanaan';
                                if (in_array($p->status_proyek, ['Proses'])) $badgeClass = 'badge-proses';
                                elseif ($p->status_proyek == 'Revisi') $badgeClass = 'badge-revisi';
                                elseif ($p->status_proyek == 'Selesai') $badgeClass = 'badge-selesai';
                            @endphp
                            <span class="badge-glass {{ $badgeClass }}">{{ $p->status_proyek }}</span>
                            <div style="color: rgba(255,255,255,0.4); font-size: 0.75rem; margin-top: 0.3rem;">
                                {{ \Carbon\Carbon::parse($p->tanggal_mulai)->format('d M Y') }}
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="col-lg-4">
        <div class="glass-card h-100">
            <h4 class="fw-bold mb-1">Aksi Cepat</h4>
            <div style="color: rgba(255,255,255,0.5); font-size: 0.85rem; margin-bottom: 1.5rem;">Menu yang sering digunakan</div>

            <a href="{{ route('proyek.create') }}" class="text-decoration-none">
                <div class="d-flex align-items-center gap-3 p-3 mb-2" style="background: rgba(255,255,255,0.05); border-radius: 14px; border: 1px solid rgba(255,255,255,0.08); transition: all 0.3s ease;">
                    <div style="width: 42px; height: 42px; border-radius: 12px; background: linear-gradient(135deg, #8b5cf6, #ec4899); display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-plus-lg text-white"></i>
                    </div>
                    <div class="flex-grow-1">
                        <div class="fw-semibold text-white">Tambah Proyek</div>
                        <div style="color: rgba(255,255,255,0.5); font-size: 0.8rem;">Catat proyek baru</div>
                    </div>
                    <i class="bi bi-chevron-right text-white-50"></i>
                </div>
            </a>

            <a href="{{ route('proyek.index') }}" class="text-decoration-none">
                <div class="d-flex align-items-center gap-3 p-3 mb-2" style="background: rgba(255,255,255,0.05); border-radius: 14px; border: 1px solid rgba(255,255,255,0.08); transition: all 0.3s ease;">
                    <div style="width: 42px; height: 42px; border-radius: 12px; background: linear-gradient(135deg, #3b82f6, #06b6d4); display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-folder text-white"></i>
                    </div>
                    <div class="flex-grow-1">
                        <div class="fw-semibold text-white">Kelola Proyek</div>
                        <div style="color: rgba(255,255,255,0.5); font-size: 0.8rem;">Edit dan hapus data</div>
                    </div>
                    <i class="bi bi-chevron-right text-white-50"></i>
                </div>
            </a>

            <a href="{{ route('laporan') }}" class="text-decoration-none">
                <div class="d-flex align-items-center gap-3 p-3" style="background: rgba(255,255,255,0.05); border-radius: 14px; border: 1px solid rgba(255,255,255,0.08); transition: all 0.3s ease;">
                    <div style="width: 42px; height: 42px; border-radius: 12px; background: linear-gradient(135deg, #10b981, #059669); display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-printer text-white"></i>
                    </div>
                    <div class="flex-grow-1">
                        <div class="fw-semibold text-white">Cetak Laporan</div>
                        <div style="color: rgba(255,255,255,0.5); font-size: 0.8rem;">Download PDF</div>
                    </div>
                    <i class="bi bi-chevron-right text-white-50"></i>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection