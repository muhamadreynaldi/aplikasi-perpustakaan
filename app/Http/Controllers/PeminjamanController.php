<?php

namespace App\Http\Controllers;

use App\Models;
use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\Anggota;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PeminjamanController extends Controller
{
    public function index(): View
    {
       $dataPeminjaman = Peminjaman::latest()->paginate(10);
       return view('peminjaman.index',compact('dataPeminjaman'));
    }

    public function create(): View
    {
        $buku = Buku::all();
        $anggota = Anggota::all(); 
        return view('peminjaman.create', compact('buku','anggota'));
    }

    public function store(Request $request): RedirectResponse
    {
        // Validasi form
        $request->validate([
            'no_buku' => 'required|exists:buku,no_buku',
            'id_anggota' => 'required|exists:anggota,id',
            'tgl_peminjaman' => 'required|date',
            'tgl_pengembalian' => 'required|date',
        ]);
    
        $status = 'belum'; // Default status saat buku dipinjam
        if (strtotime($request->tgl_pengembalian) < time()) {
            $status = 'sanksi';
        }
    
        Peminjaman::create([
            'no_buku' => $request->no_buku,
            'id_anggota' => $request->id_anggota,
            'tgl_peminjaman' => $request->tgl_peminjaman,
            'tgl_pengembalian' => $request->tgl_pengembalian,
            'status' => $status,
        ]);

        //redirect to index
        $buku = Buku::all();
        $anggota = Anggota::all(); 
        return redirect()->route('peminjaman.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        $dataPeminjaman = Peminjaman::where('id', $id)->firstOrFail();
        $buku = Buku::all();
        $anggota = Anggota::all(); 
        return view('peminjaman.edit', compact('dataPeminjaman', 'buku', 'anggota'));
    }

    public function show(string $id): View
    {
        $peminjaman = Peminjaman::where('id', $id)->firstOrFail();
        $buku = Buku::all();
        $anggota = Anggota::all(); 
        return view('peminjaman.show', compact('peminjaman', 'buku', 'anggota'));    
    }

    public function update(Request $request, $id): RedirectResponse
    {
        // Validasi input
        $request->validate([
            'no_buku' => 'required|exists:buku,no_buku',
            'id_anggota' => 'required|exists:anggota,id',
            'tgl_peminjaman' => 'required|date',
            'tgl_pengembalian' => 'required|date',
        ]);
    
        // Temukan data peminjaman
        $dataPeminjaman = Peminjaman::findOrFail($id);
    
        // Perbarui data
        $dataPeminjaman->update([
            'no_buku' => $request->no_buku,
            'id_anggota' => $request->id_anggota,
            'tgl_peminjaman' => $request->tgl_peminjaman,
            'tgl_pengembalian' => $request->tgl_pengembalian,
            'status' => $this->getStatus($request->tgl_pengembalian), // Menentukan status
        ]);
    
        // Redirect ke halaman index dengan pesan sukses
        $buku = Buku::all();
        $anggota = Anggota::all(); 
        return redirect()->route('peminjaman.index')->with('success', 'Data Berhasil Diubah!');
    }
    
    // Metode untuk menentukan status
    private function getStatus($tgl_pengembalian)
    {
        $currentDate = now()->format('Y-m-d');
        return $currentDate > $tgl_pengembalian ? 'sanksi' : 'belum';
    }
    
    

    public function destroy($id): RedirectResponse
    {
        $peminjaman = Peminjaman::where('id', $id)->firstOrFail();
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
