<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;

class JurusanController extends Controller
{
    public function index() {
        $jurusans = Jurusan::all();
        return view('admin.jurusan', compact('jurusans'));
    }

    public function simpanJurusan(Request $request) {
        if ($request->id) {
            $jurusan = Jurusan::find($request->id);
            $jurusan->jurusan = $request->nama;
            $jurusan->save();
        } else {
            Jurusan::create([
                'jurusan' => $request->nama,
            ]);
        }
        return back();
    }

    public function hapusJurusan(Request $request) {
        Jurusan::find($request->id)->delete();
        return back();
    }
}
