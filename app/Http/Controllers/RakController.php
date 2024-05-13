<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class RakController extends Controller
{
    public function index(): View
    {
       $dataRak = Rak::latest()->paginate(10);
       return view('rak.index',compact('dataRak'));
    }

    public function create(): View
    {
        return view('rak.create');
    }

    public function store(Request $request): RedirectResponse
    {
       
        //validate form
        $request->validate([
            'lokasi'      => 'required|min:2|unique:rak,lokasi'
        ]);

        Rak::create([
            'lokasi'        => $request->lokasi,
        ]);
        //redirect to index
        return redirect()->route('rak.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        $dataRak = Rak::findOrFail($id);
        return view('rak.edit', compact('dataRak'));
    }

    public function show(string $id): View
    {
        $rak = Rak::findOrFail($id);

        return view('rak.show', compact('rak'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'lokasi'      => 'required|min:2'
        ]);

        $dataRak = Rak::findOrFail($id);
        $dataRak->update([
             'lokasi'  => $request->lokasi
            ]);

        return redirect()->route('rak.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $rak = Rak::findOrFail($id);
        $rak->delete();
        return redirect()->route('rak.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
