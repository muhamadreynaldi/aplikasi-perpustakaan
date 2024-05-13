<?php

namespace App\Http\Controllers;

use App\Models\Penulis;
use App\Models\Rak;
use App\Models\Buku;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class BukuController extends Controller
{
    public function index(): View
    {
       $dataBuku = Buku::latest()->paginate(10);
       return view('buku.index',compact('dataBuku'));
    }

    public function create(): View
    {
        $penulis = Penulis::all();
        $rak = Rak::all(); 
        return view('buku.create', compact('penulis','rak'));
    }

    public function store(Request $request): RedirectResponse
    {
       
        //validate form
        $request->validate([
            'id_penulis' => 'required|exists:penulis,id',
            'id_rak' => 'required|exists:rak,id',
            'no_buku' => 'required|unique:buku,no_buku',
            'judul' => 'required',
            'edisi' => 'required',
            'tahun' => 'required|date',
            'penerbit' => 'required',
        ]);

        Buku::create([
            'id_penulis' => $request->id_penulis,
            'id_rak' => $request->id_rak,
            'no_buku' => $request->no_buku,
            'judul' => $request->judul,
            'edisi' => $request->edisi,
            'tahun' => $request->tahun,
            'penerbit' => $request->penerbit,
        ]);
        //redirect to index
        $penulis = Penulis::all();
        $rak = Rak::all(); 
        return redirect()->route('buku.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $no_buku): View
    {
        $dataBuku = Buku::where('no_buku', $no_buku)->firstOrFail();
        $penulis = Penulis::all();
        $rak = Rak::all(); 
        return view('buku.edit', compact('dataBuku', 'penulis', 'rak'));
    }

    public function show(string $no_buku): View
    {
        $buku = Buku::where('no_buku', $no_buku)->firstOrFail();
        $penulis = Penulis::all();
        $rak = Rak::all(); 
        return view('buku.show', compact('buku', 'penulis', 'rak'));    
    }

    public function update(Request $request, $no_buku): RedirectResponse
    {
        //validate form
        $request->validate([
            'id_penulis' => 'required',
            'id_rak' => 'required',
            'judul' => 'required',
            'edisi' => 'required',
            'tahun' => 'required|date',
            'penerbit' => 'required',
        ]);

        $dataBuku = Buku::findOrFail($no_buku);
        $dataBuku->update([
            'id_penulis' => $request->id_penulis,
            'id_rak' => $request->id_rak,
            'judul' => $request->judul,
            'edisi' => $request->edisi,
            'tahun' => $request->tahun,
            'penerbit' => $request->penerbit,
            ]);

            $penulis = Penulis::all();
            $rak = Rak::all(); 
        return redirect()->route('buku.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($no_buku): RedirectResponse
    {
        $buku = Buku::where('no_buku', $no_buku)->firstOrFail();
        $buku->delete();
        return redirect()->route('buku.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}