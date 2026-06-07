<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProyekController extends Controller
{
    public function index()
    {
        $proyeks = Proyek::where('user_id', Auth::id())->latest()->paginate(10);
        return view('proyek.index', compact('proyeks'));
    }

    public function create()
    {
        return view('proyek.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_proyek' => 'required|string|max:100',
            'jenis_proyek' => 'required|string|max:100',
            'teknologi' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'status_proyek' => 'required|in:Perencanaan,Proses,Revisi,Selesai',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
        ]);

        Proyek::create([
            'user_id' => Auth::id(),
            'nama_proyek' => $request->nama_proyek,
            'jenis_proyek' => $request->jenis_proyek,
            'teknologi' => $request->teknologi,
            'deskripsi' => $request->deskripsi,
            'status_proyek' => $request->status_proyek,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
        ]);

        return redirect()->route('proyek.index')->with('success', 'Proyek berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $proyek = Proyek::where('id', $id)->where('user_id', Auth::id())->first();

        if (!$proyek) {
            return redirect()->route('proyek.index')->with('error', 'Data tidak ditemukan atau Anda tidak memiliki akses!');
        }

        return view('proyek.edit', compact('proyek'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_proyek' => 'required|string|max:100',
            'jenis_proyek' => 'required|string|max:100',
            'teknologi' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'status_proyek' => 'required|in:Perencanaan,Proses,Revisi,Selesai',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
        ]);

        $proyek = Proyek::where('id', $id)->where('user_id', Auth::id())->first();

        if (!$proyek) {
            return redirect()->route('proyek.index')->with('error', 'Data tidak ditemukan atau Anda tidak memiliki akses!');
        }

        $proyek->update([
            'nama_proyek' => $request->nama_proyek,
            'jenis_proyek' => $request->jenis_proyek,
            'teknologi' => $request->teknologi,
            'deskripsi' => $request->deskripsi,
            'status_proyek' => $request->status_proyek,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
        ]);

        return redirect()->route('proyek.index')->with('success', 'Proyek berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $proyek = Proyek::where('id', $id)->where('user_id', Auth::id())->first();

        if (!$proyek) {
            return redirect()->route('proyek.index')->with('error', 'Data tidak ditemukan atau Anda tidak memiliki akses!');
        }

        $proyek->delete();

        return redirect()->route('proyek.index')->with('success', 'Proyek berhasil dihapus!');
    }

    public function laporan()
    {
        $proyeks = Proyek::where('user_id', Auth::id())->latest()->get();
        $user = Auth::user();
        
        return view('laporan', compact('proyeks', 'user'));
    }
}