<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapel;
use App\Models\Jurusan;
use App\Models\User;

class MapelController extends Controller
{
    public function index() {
        $mapels = Mapel::all();
        $jurusans = Jurusan::all();
        $gurus = User::where('level','<>','Admin')->get();
        return view('admin.mapel', compact('mapels','jurusans','gurus'));
    }

    public function simpanMapel(Request $request) {
        if ($request->id) {
            $mapel = Mapel::find($request->id);
            $mapel->nama_mapel = ucwords($request->nama);
            $mapel->jurusan_id = $request->jurusan;
            $mapel->guru_id = $request->guru;
            $mapel->kelompok = $request->kelompok;
            $mapel->save();
        } else {
            Mapel::create([
                'nama_mapel' => ucwords($request->nama),
                'jurusan_id' => $request->jurusan,
                'guru_id' => $request->guru,
                'kelompok' => $request->kelompok
            ]);
        }
        return back();
    }

    public function hapusMapel(Request $request) {
        Mapel::find($request->id)->delete();
        return back();
    }
}
