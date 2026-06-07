@extends('layouts.app')
@section('title', 'Tambah Proyek')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="mb-4">
            <a href="{{ route('proyek.index') }}" class="text-decoration-none" style="color: rgba(255,255,255,0.7); font-size: 0.9rem;">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke daftar
            </a>
            <h1 class="page-title mt-2">Tambah <span class="gradient-text">Proyek Baru</span></h1>
            <p class="page-subtitle mb-0">Isi detail proyek yang ingin Anda catat</p>
        </div>

        <div class="glass-card">
            <form action="{{ route('proyek.store') }}" method="POST">
                @csrf

                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Nama Proyek</label>
                        <input type="text" name="nama_proyek" class="form-control form-control-glass @error('nama_proyek') is-invalid @enderror" value="{{ old('nama_proyek') }}" placeholder="Contoh: Website Sekolah" required>
                        @error('nama_proyek') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jenis Proyek</label>
                        <select name="jenis_proyek" class="form-select form-select-glass @error('jenis_proyek') is-invalid @enderror" required>
                            <option value="">Pilih jenis</option>
                            <option value="Web" {{ old('jenis_proyek') == 'Web' ? 'selected' : '' }}>Website</option>
                            <option value="Mobile" {{ old('jenis_proyek') == 'Mobile' ? 'selected' : '' }}>Aplikasi Mobile</option>
                            <option value="Desktop" {{ old('jenis_proyek') == 'Desktop' ? 'selected' : '' }}>Aplikasi Desktop</option>
                            <option value="UI Design" {{ old('jenis_proyek') == 'UI Design' ? 'selected' : '' }}>UI/UX Design</option>
                        </select>
                        @error('jenis_proyek') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Teknologi</label>
                        <input type="text" name="teknologi" class="form-control form-control-glass @error('teknologi') is-invalid @enderror" value="{{ old('teknologi') }}" placeholder="Contoh: Laravel, Flutter" required>
                        @error('teknologi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Status Proyek</label>
                        <select name="status_proyek" class="form-select form-select-glass @error('status_proyek') is-invalid @enderror" required>
                            <option value="Perencanaan" {{ old('status_proyek') == 'Perencanaan' ? 'selected' : '' }}>Perencanaan</option>
                            <option value="Proses" {{ old('status_proyek') == 'Proses' ? 'selected' : '' }}>Proses</option>
                            <option value="Revisi" {{ old('status_proyek') == 'Revisi' ? 'selected' : '' }}>Revisi</option>
                            <option value="Selesai" {{ old('status_proyek') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                        @error('status_proyek') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" class="form-control form-control-glass @error('tanggal_mulai') is-invalid @enderror" value="{{ old('tanggal_mulai') }}" required>
                        @error('tanggal_mulai') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label">Tanggal Selesai (Opsional)</label>
                        <input type="date" name="tanggal_selesai" class="form-control form-control-glass" value="{{ old('tanggal_selesai') }}">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Deskripsi Proyek</label>
                        <textarea name="deskripsi" class="form-control form-control-glass @error('deskripsi') is-invalid @enderror" rows="4" placeholder="Ceritakan tentang proyek Anda..." required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-12 d-flex justify-content-end gap-2 pt-3">
                        <a href="{{ route('proyek.index') }}" class="btn btn-glass">Batal</a>
                        <button type="submit" class="btn btn-gradient">
                            <i class="bi bi-check-lg me-1"></i> Simpan Proyek
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection