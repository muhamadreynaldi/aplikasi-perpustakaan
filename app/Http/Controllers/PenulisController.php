<?php

namespace App\Http\Controllers;

use App\Models\Penulis;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PenulisController extends Controller
{
    public function index(): View
    {
       $dataPenulis = Penulis::latest()->paginate(10);
       return view('penulis.index',compact('dataPenulis'));
    }

    public function create(): View
    {
        return view('penulis.create');
    }

    public function store(Request $request): RedirectResponse
    {
       
        //validate form
        $request->validate([
            'nama_penulis'      => 'required|min:1|unique:penulis,nama_penulis',
            'tempat_lahir'      => 'required',
            'tanggal_lahir'     => 'required|date',
            'email'             => 'required|email|unique:penulis,email',
        ]);

        Penulis::create([
            'nama_penulis'      => $request->nama_penulis,
            'tempat_lahir'      => $request->tempat_lahir,
            'tanggal_lahir'     => $request->tanggal_lahir,
            'email'             => $request->email,
        ]);
        //redirect to index
        return redirect()->route('penulis.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        $dataPenulis = Penulis::findOrFail($id);
        return view('penulis.edit', compact('dataPenulis'));
    }

    public function show(string $id): View
    {
        $penulis = Penulis::findOrFail($id);

        return view('penulis.show', compact('penulis'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama_penulis'      => 'required|min:1|unique:penulis,nama_penulis',
            'tempat_lahir'      => 'required',
            'tanggal_lahir'     => 'required|date',
            'email'             => 'required|email|unique:penulis,email',
        ]);

        $dataPenulis = Penulis::findOrFail($id);
        $dataPenulis->update([
            'nama_penulis'      => $request->nama_penulis,
            'tempat_lahir'      => $request->tempat_lahir,
            'tanggal_lahir'     => $request->tanggal_lahir,
            'email'             => $request->email,
            ]);

        return redirect()->route('penulis.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $penulis = Penulis::findOrFail($id);
        $penulis->delete();
        return redirect()->route('penulis.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}