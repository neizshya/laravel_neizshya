<?php

namespace App\Http\Controllers;

use App\Models\RumahSakit;
use Illuminate\Http\Request;


class RumahSakitController extends Controller
{
    public function index()
    {
        $rs = RumahSakit::all();
        $title = "List Rumah Sakit";
        return view('rumah_sakit.index', compact('rs', 'title'));
    }

    public function create()
    {
        return view('rumah_sakit.create');
    }

    public function store(Request $request)
    {
        RumahSakit::create($request->all());
        return redirect()->route('rumah-sakit.index');
    }

    public function edit(RumahSakit $rumahSakit)
    {
        return view('rumah_sakit.edit', compact('rumahSakit'));
    }

    public function update(Request $request, RumahSakit $rumahSakit)
    {
        $rumahSakit->update($request->all());
        return redirect()->route('rumah-sakit.index');
    }

    public function destroy(RumahSakit $rumahSakit)
    {
        $rumahSakit->delete();
        return redirect()->route('rumah-sakit.index');
    }

    public function destroyAjax($id)
    {
        $rs = RumahSakit::findOrFail($id);
        $rs->delete();

        return response()->json(['success' => true]);
    }
}
