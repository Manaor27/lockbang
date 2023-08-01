<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;
use File;
use Auth;
use DB;

class SiswaController extends Controller
{
    public function index() {
        $siswa = Siswa::all();
        $kelass = Kelas::all();
        return view('admin.siswa', compact('siswa','kelass'));
    }

    public function siswa() {
        $kelass = Kelas::all();
        return view('guru.kelas', compact('kelass'));
    }

    public function detailSiswa($id) {
        $mapel = Mapel::where('guru_id',Auth::user()->id)->first();
        $siswas = Siswa::where('kelas_id',$id)->get();
        $nilais = DB::table('ulangan')->select('kelas_id', DB::raw('AVG((ulha_1 + ulha_2 + ulha_3 + ulha_4 + ulha_5 + ulha_6 + uts + uas + prak)/9) AS rata_rata'))->where('kelas_id', $id)->where('mapel_id',$mapel->id)->groupBy('kelas_id')->get();
        return view('guru.detail_siswa', compact('siswas', 'nilais'));
    }

    public function simpanSiswa(Request $request) {
        if ($request->id) {
            $siswa = Siswa::find($request->id);
            $siswa->nis = $request->nis;
            $siswa->nisn = $request->nisn;
            $siswa->nama_siswa = ucwords($request->nama);
            $siswa->jk = $request->jk;
            $siswa->telp = $request->telp;
            $siswa->tempat_lahir = $request->tempat_lahir;
            $siswa->agama = $request->agama;
            $siswa->tgl_lahir = $request->tgl_lahir;
            $siswa->kelas_id = $request->kelas;
            if ($request->file('foto')) {
                $foto = $request->file('foto');
                $fotoName = strtolower($request->nama).'.'.$request->foto->extension();
                $foto->move('foto/', $fotoName);
                $siswa->img = $fotoName;
            }
            $siswa->save();
        } else {
            $foto = $request->file('foto');
            $fotoName = strtolower($request->nama).'.'.$request->foto->extension();
            $foto->move('foto/', $fotoName);
            Siswa::create([
                'nis' => $request->nis,
                'nisn' => $request->nisn,
                'nama_siswa' => ucwords($request->nama),
                'jk' => $request->jk,
                'telp' => $request->telp,
                'tempat_lahir' => ucwords($request->tempat_lahir),
                'agama' => $request->agama,
                'tgl_lahir' => $request->tgl_lahir,
                'img' => $fotoName,
                'kelas_id' => $request->kelas
            ]);
        }
        return back();
    }

    public function hapusSiswa(Request $request) {
        $siswa = Siswa::find($request->id);
        File::delete('foto/'.$siswa->img);
        $siswa->delete();
        return back();
    }
}
