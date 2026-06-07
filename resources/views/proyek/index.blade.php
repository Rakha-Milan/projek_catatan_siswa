@extends('layouts.app')
@section('title', 'Daftar Proyek')
@section('content')
<div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-4">
    <div>
        <h1 class="page-title">Daftar <span class="gradient-text">Proyek</span></h1>
        <p class="page-subtitle mb-0">Kelola semua proyek yang telah Anda catat</p>
    </div>
    <a href="{{ route('proyek.create') }}" class="btn btn-gradient">
        <i class="bi bi-plus-lg me-1"></i> Tambah Proyek
    </a>
</div>

<div class="glass-card">
    @if($proyeks->isEmpty())
        <div class="empty-state">
            <i class="bi bi-inbox"></i>
            <div class="fw-semibold mb-1">Belum ada proyek</div>
            <div style="color: rgba(255,255,255,0.5); font-size: 0.9rem;">Klik tombol di atas untuk menambahkan proyek pertama Anda</div>
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-glass mb-0">
                <thead>
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th>Nama Proyek</th>
                        <th>Jenis</th>
                        <th>Teknologi</th>
                        <th>Status</th>
                        <th>Tanggal Mulai</th>
                        <th style="width: 120px;" class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($proyeks as $index => $p)
                        @php
                            $badgeClass = 'badge-perencanaan';
                            if ($p->status_proyek == 'Proses') $badgeClass = 'badge-proses';
                            elseif ($p->status_proyek == 'Revisi') $badgeClass = 'badge-revisi';
                            elseif ($p->status_proyek == 'Selesai') $badgeClass = 'badge-selesai';
                        @endphp
                        <tr>
                            <td>{{ $proyeks->firstItem() + $index }}</td>
                            <td>
                                <div class="fw-semibold">{{ $p->nama_proyek }}</div>
                                @if($p->deskripsi)
                                    <div style="color: rgba(255,255,255,0.5); font-size: 0.8rem; max-width: 250px;" class="text-truncate">
                                        {{ $p->deskripsi }}
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    @php
                                        $icon = 'bi-globe';
                                        if ($p->jenis_proyek == 'Mobile') $icon = 'bi-phone';
                                        elseif ($p->jenis_proyek == 'Desktop') $icon = 'bi-laptop';
                                        elseif ($p->jenis_proyek == 'UI Design') $icon = 'bi-palette';
                                    @endphp
                                    <i class="bi {{ $icon }}" style="color: #a78bfa;"></i>
                                    {{ $p->jenis_proyek }}
                                </div>
                            </td>
                            <td><span class="badge-glass" style="background: rgba(167, 139, 250, 0.15); color: #a78bfa; border-color: rgba(167, 139, 250, 0.3);">{{ $p->teknologi }}</span></td>
                            <td><span class="badge-glass {{ $badgeClass }}">{{ $p->status_proyek }}</span></td>
                            <td style="color: rgba(255,255,255,0.7);">{{ \Carbon\Carbon::parse($p->tanggal_mulai)->format('d M Y') }}</td>
                            <td class="text-end">
                                <a href="{{ route('proyek.edit', $p->id) }}" class="btn-icon btn-icon-edit me-1" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('proyek.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus proyek ini?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn-icon btn-icon-delete" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if($proyeks->hasPages())
            <div class="mt-3">
                {{ $proyeks->links() }}
            </div>
        @endif
    @endif
</div>
@endsection