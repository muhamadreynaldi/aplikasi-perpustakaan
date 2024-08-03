<?php

namespace App\Http\Controllers;

use App\Models;
use App\Models\Sanksi;
use App\Models\Peminjaman;
use App\Models\Anggota;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class SanksiController extends Controller
{
    public function index(): View
    {
       $dataSanksi = Sanksi::latest()->paginate(10);
       return view('sanksi.index',compact('dataSanksi'));
    }

    public function create(): View
    {
        $anggota = Anggota::all();
        $peminjaman = Peminjaman::all(); 
        return view('sanksi.create', compact('anggota','peminjaman'));
    }

    public function store(Request $request): RedirectResponse
    {
       
        //validate form
        $request->validate([
            'id_anggota' => 'required|exists:anggota,id',
            'id_peminjaman' => 'required|exists:peminjaman,id',
            'jumlah_denda' => 'required|integer',
            'status' => 'required|in:tunggakan,lunas',
        ]);

        Sanksi::create([
            'id_anggota' => $request->id_anggota,
            'id_peminjaman' => $request->id_peminjaman,
            'jumlah_denda' => $request->jumlah_denda,
            'status' => $request->status,
        ]);
        //redirect to index
        $anggota = Anggota::all();
        $peminjaman = Peminjaman::all(); 
        return redirect()->route('sanksi.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        $dataSanksi = Sanksi::where('id', $id)->firstOrFail();
        $anggota = Anggota::all();
        $peminjaman = Peminjaman::all(); 
        return view('sanksi.edit', compact('dataSanksi', 'anggota', 'peminjaman'));
    }

    public function show(string $id): View
    {
        $sanksi = Sanksi::where('id', $id)->firstOrFail();
        $anggota = Anggota::all();
        $peminjaman = Peminjaman::all(); 
        return view('sanksi.show', compact('sanksi', 'anggota', 'peminjaman'));    
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'id_anggota' => 'required|exists:anggota,id',
            'id_peminjaman' => 'required|exists:peminjaman,id',
            'jumlah_denda' => 'required|integer',
            'status' => 'required|in:tunggakan,lunas',
        ]);

        $dataSanksi = Sanksi::findOrFail($id);
        $dataSanksi->update([
            'id_anggota' => $request->id_anggota,
            'id_peminjaman' => $request->id_peminjaman,
            'jumlah_denda' => $request->jumlah_denda,
            'status' => $request->status,
            ]);

            $anggota = Anggota::all();
            $peminjaman = Peminjaman::all(); 
        return redirect()->route('sanksi.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $sanksi = Sanksi::where('id', $id)->firstOrFail();
        $sanksi->delete();
        return redirect()->route('sanksi.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}