@extends('layouts.app')
@section('title', 'Edit Proyek')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="mb-4">
            <a href="{{ route('proyek.index') }}" class="text-decoration-none" style="color: rgba(255,255,255,0.7); font-size: 0.9rem;">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke daftar
            </a>
            <h1 class="page-title mt-2">Edit <span class="gradient-text">Proyek</span></h1>
            <p class="page-subtitle mb-0">Perbarui informasi proyek Anda</p>
        </div>

        <div class="glass-card">
            <form action="{{ route('proyek.update', $proyek->id) }}" method="POST">
                @csrf @method('PUT')

                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Nama Proyek</label>
                        <input type="text" name="nama_proyek" class="form-control form-control-glass" value="{{ old('nama_proyek', $proyek->nama_proyek) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jenis Proyek</label>
                        <select name="jenis_proyek" class="form-select form-select-glass" required>
                            <option value="Web" {{ old('jenis_proyek', $proyek->jenis_proyek) == 'Web' ? 'selected' : '' }}>Website</option>
                            <option value="Mobile" {{ old('jenis_proyek', $proyek->jenis_proyek) == 'Mobile' ? 'selected' : '' }}>Aplikasi Mobile</option>
                            <option value="Desktop" {{ old('jenis_proyek', $proyek->jenis_proyek) == 'Desktop' ? 'selected' : '' }}>Aplikasi Desktop</option>
                            <option value="UI Design" {{ old('jenis_proyek', $proyek->jenis_proyek) == 'UI Design' ? 'selected' : '' }}>UI/UX Design</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Teknologi</label>
                        <input type="text" name="teknologi" class="form-control form-control-glass" value="{{ old('teknologi', $proyek->teknologi) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Status Proyek</label>
                        <select name="status_proyek" class="form-select form-select-glass" required>
                            <option value="Perencanaan" {{ old('status_proyek', $proyek->status_proyek) == 'Perencanaan' ? 'selected' : '' }}>Perencanaan</option>
                            <option value="Proses" {{ old('status_proyek', $proyek->status_proyek) == 'Proses' ? 'selected' : '' }}>Proses</option>
                            <option value="Revisi" {{ old('status_proyek', $proyek->status_proyek) == 'Revisi' ? 'selected' : '' }}>Revisi</option>
                            <option value="Selesai" {{ old('status_proyek', $proyek->status_proyek) == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" class="form-control form-control-glass" value="{{ old('tanggal_mulai', $proyek->tanggal_mulai) }}" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Tanggal Selesai (Opsional)</label>
                        <input type="date" name="tanggal_selesai" class="form-control form-control-glass" value="{{ old('tanggal_selesai', $proyek->tanggal_selesai) }}">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Deskripsi Proyek</label>
                        <textarea name="deskripsi" class="form-control form-control-glass" rows="4" required>{{ old('deskripsi', $proyek->deskripsi) }}</textarea>
                    </div>

                    <div class="col-12 d-flex justify-content-end gap-2 pt-3">
                        <a href="{{ route('proyek.index') }}" class="btn btn-glass">Batal</a>
                        <button type="submit" class="btn btn-gradient">
                            <i class="bi bi-check-lg me-1"></i> Update Proyek
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection