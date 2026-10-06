<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $query = Kategori::query();

        if ($request->filled('nama')) {
            $query->where('nama', 'LIKE', '%' . $request->nama . '%');
        }

        if ($request->filled('kode')) {
            $query->where('kode', 'LIKE', '%' . $request->kode . '%');
        }

        $data = $query->orderBy('id', 'desc')->get();

        return view('kategoris.index', compact('data'));
    }

    public function formView($method, $id = 0)
    {
        if ($method == 'new') {
            $kategori = new Kategori();
        } else {
            $kategori = Kategori::findOrFail($id);
        }

        return view('kategoris.form', [
            'kategori' => $kategori,
            'method' => $method
        ]);
    }

    public function formSubmit(Request $request, $method, $id = 0)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|max:255|unique:kategoris,kode,' . $id,
        ]);

        if ($method == 'new') {
            $kategori = new Kategori();
        } else {
            $kategori = Kategori::findOrFail($id);
        }

        $kategori->nama = $request->nama;
        $kategori->kode = $request->kode;
        $kategori->save();

        return redirect('kategoris');
    }

    public function singleView($id)
    {
        $kategori = Kategori::with('masterItems')->findOrFail($id);

        return view('kategoris.single', compact('kategori'));
    }

    public function delete($id)
    {
        Kategori::findOrFail($id)->delete();

        return redirect('kategoris');
    }

    public function pdf($id)
    {
        $kategori = Kategori::with('masterItems')->findOrFail($id);

        $pdf = Pdf::loadView('kategoris.pdf', [
            'kategori' => $kategori
        ]);

        return $pdf->download(
            'kategori-' . $kategori->kode . '.pdf'
        );
    }
}
