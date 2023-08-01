<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hari;

class HariController extends Controller
{
    public function index() {
        $haris = Hari::all();
        return view('admin.hari', compact('haris'));
    }

    public function simpanHari(Request $request) {
        if ($request->id) {
            $hari = Hari::find($request->id);
            $hari->nama_hari = $request->nama;
            $hari->save();
        } else {
            Hari::create([
                'nama_hari' => $request->nama
            ]);
        }
        return back();
    }

    public function hapusHari(Request $request) {
        Hari::find($request->id)->delete();
        return back();
    }
}
