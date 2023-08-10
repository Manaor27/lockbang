<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Mapel;
use App\Models\Ulangan;
use App\Models\Siswa;
use App\Models\Kelas;
use DB;
use Auth;

class NilaiController extends Controller
{
    public function index() {
        $mapels = Mapel::all();
        $predikats = Nilai::all();
        return view('admin.predikat', compact('mapels','predikats'));
    }

    public function simpanPredikat(Request $request) {
        if ($request->id) {
            $predikat = Nilai::find($request->id);
            $predikat->kkm = $request->kkm;
            $predikat->deskripsi_a = $request->a;
            $predikat->deskripsi_b = $request->b;
            $predikat->deskripsi_c = $request->c;
            $predikat->deskripsi_d = $request->d;
            $predikat->mapel_id = $request->mapel;
            $predikat->save();
        } else {
            Nilai::create([
                'kkm' => $request->kkm,
                'mapel_id' => $request->mapel,
                'deskripsi_a' => $request->a,
                'deskripsi_b' => $request->b,
                'deskripsi_c' => $request->c,
                'deskripsi_d' => $request->d
            ]);
        }
        return back();
    }

    public function hapusPredikat(Request $request) {
        Nilai::find($request->id)->delete();
        return back();
    }

    public function detailNilai($id) {
        $siswa = Siswa::find($id);
        $mapels = Mapel::all();
        $ulangans = Ulangan::where('siswa_id',$id)->get();
        $nilais = Nilai::all();
        $predikats = Nilai::all();
        return view('wali.detail_ulangan', compact('siswa','predikats','mapels','ulangans','nilais'));
    }

    public function detailPenilaian($id) {
        $siswa = Siswa::find($id);
        $mapel = Mapel::where('guru_id',Auth::user()->id)->first();
        $nilais = Nilai::all();
        $u = Ulangan::where('siswa_id',$id)->first();
        if ($u == null) {
            Ulangan::create([
                'siswa_id' => $id,
                'mapel_id' => $mapel->id,
                'kelas_id' => $siswa->kelas_id,
                'guru_id' => $mapel->guru_id
            ]);
        }
        $predikats = Nilai::where('mapel_id',$mapel->id)->get();
        $ulangans = Ulangan::where('siswa_id',$id)->where('mapel_id',$mapel->id)->get();
        return view('guru.detail_nilai', compact('siswa','mapel','predikats','ulangans','nilais'));
    }

    public function nilai() {
        $kelass = Kelas::all();
        return view('wali.nilai', compact('kelass'));
    }
}
