<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class AnggotaController extends Controller
{
    public function index(): View
    {
       $dataAnggota = Anggota::latest()->paginate(10);
       return view('anggota.index',compact('dataAnggota'));
    }

    public function create(): View
    {
        return view('anggota.create');
    }

    public function store(Request $request): RedirectResponse
    {
       
        //validate form
        $request->validate([
            'nama'          => 'required|min:1|unique:anggota,nama',
            'no_hp'         => 'required',
            'alamat'        => 'required',
            'email'         => 'required|email|unique:anggota,email',
        ]);

        Anggota::create([
            'nama'          => $request->nama,
            'no_hp'         => $request->no_hp,
            'alamat'        => $request->alamat,
            'email'         => $request->email,
        ]);
        //redirect to index
        return redirect()->route('anggota.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        $dataAnggota = Anggota::findOrFail($id);
        return view('anggota.edit', compact('dataAnggota'));
    }

    public function show(string $id): View
    {
        $anggota = Anggota::findOrFail($id);

        return view('anggota.show', compact('anggota'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama'          => 'required|min:1|unique:anggota,nama',
            'no_hp'         => 'required',
            'alamat'        => 'required',
            'email'         => 'required|email|unique:anggota,email',
        ]);

        $dataAnggota = Anggota::findOrFail($id);
        $dataAnggota->update([
            'nama'          => $request->nama,
            'no_hp'         => $request->no_hp,
            'alamat'        => $request->alamat,
            'email'         => $request->email,
            ]);

        return redirect()->route('anggota.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();
        return redirect()->route('anggota.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
