<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulangan;
use App\Models\Mapel;

class UlanganController extends Controller
{
    public function simpanUlangan(Request $request) {
        if ($request->id) {
            $mapel = Mapel::find($request->mapel);
            $ul = Ulangan::find($request->id);
            $ul->mapel_id = $request->mapel;
            $ul->guru_id = $mapel->guru->id;
            $ul->ulha_1 = $request->ulangan1;
            $ul->ulha_2 = $request->ulangan2;
            $ul->ulha_3 = $request->ulangan3;
            $ul->ulha_4 = $request->ulangan4;
            $ul->ulha_5 = $request->ulangan5;
            $ul->ulha_6 = $request->ulangan6;
            $ul->prak = $request->praktikum;
            $ul->uts = $request->uts;
            $ul->uas = $request->uas;
            $ul->save();
        } else {
            $mapel = Mapel::find($request->mapel);
            Ulangan::create([
                'mapel_id' => $request->mapel,
                'siswa_id' => $request->siswa_id,
                'kelas_id' => $request->kelas,
                'guru_id' => $mapel->guru->id,
                'ulha_1' => $request->ulangan1,
                'ulha_2' => $request->ulangan2,
                'ulha_3' => $request->ulangan3,
                'ulha_4' => $request->ulangan4,
                'ulha_5' => $request->ulangan5,
                'ulha_6' => $request->ulangan6,
                'prak' => $request->praktikum,
                'uts' => $request->uts,
                'uas' => $request->uas
            ]);
        }
        return back();
    }
}
