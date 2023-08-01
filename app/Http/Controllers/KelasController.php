<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Siswa;
use DB;
use Auth;

class KelasController extends Controller
{
    public function index() {
        $jurusans = Jurusan::all();
        $walis = User::where('level','<>','Admin')->get();
        $kelass = Kelas::all();
        return view('admin.kelas', compact('jurusans','walis','kelass'));
    }

    public function kelas() {
        $kelass = Kelas::where('guru_id',Auth::user()->id)->where('status','wali')->get();
        return view('wali.kelas', compact('kelass'));
    }

    public function detailKelas($id) {
        $siswas = Siswa::where('kelas_id',$id)->get();
        $nilais = DB::table('ulangan')->select('kelas_id', DB::raw('AVG((ulha_1 + ulha_2 + ulha_3 + ulha_4 + ulha_5 + ulha_6 + uts + uas + prak)/9) AS rata_rata'))->where('kelas_id', $id)->groupBy('kelas_id')->get();
        return view('wali.detail_kelas', compact('siswas', 'nilais'));
    }

    public function simpanKelas(Request $request) {
        if ($request->id) {
            $kelas = Kelas::find($request->id);
            $kelas->nama_kelas = $request->nama;
            $kelas->status = $request->status;
            $kelas->guru_id = $request->wali;
            $kelas->jurusan_id = $request->jurusan;
            $kelas->save();
        } else {
            Kelas::create([
                'nama_kelas' => $request->nama,
                'guru_id' => $request->wali,
                'status' => $request->status,
                'jurusan_id' => $request->jurusan
            ]);
        }
        return back();
    }

    public function hapusKelas(Request $request) {
        Kelas::find($request->id)->delete();
        return back();
    }
}
