<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RumahSakit;
use Illuminate\Http\Request;


class PasienController extends Controller
{
    public function index()
    {
        $rumahSakits = RumahSakit::all();
        return view('pasien.index', compact('rumahSakits'));
    }

    public function filter($id = null)
    {
        $pasiens = Pasien::with('rumahSakit')
            ->when($id, fn($q) => $q->where('rumah_sakit_id', $id))
            ->get();

        return view('pasien.partial_table', compact('pasiens'));
    }

    public function destroyAjax($id)
    {
        Pasien::destroy($id);
        return response()->json(['success' => true]);
    }

    public function create()
    {
        $rumahSakits = RumahSakit::all();
        return view('pasien.create', compact('rumahSakits'));
    }

    public function store(Request $request)
    {
        Pasien::create($request->all());
        return redirect()->route('pasien.index');
    }

    public function edit(Pasien $pasien)
    {
        $rumahSakits = RumahSakit::all();
        return view('pasien.edit', compact('pasien', 'rumahSakits'));
    }

    public function update(Request $request, Pasien $pasien)
    {
        $pasien->update($request->all());
        return redirect()->route('pasien.index');
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->delete();
        return redirect()->route('pasien.index');
    }
}
