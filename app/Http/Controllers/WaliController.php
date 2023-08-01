<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Mapel;
use App\Models\Kelas;
use Auth;

class WaliController extends Controller
{
    public function index() {
        $mapel = Mapel::where('guru_id', Auth::user()->id)->first();
        $kelas = Kelas::where('guru_id', Auth::user()->id)->first();
        if ($kelas) {
            $siswa = Siswa::where('kelas_id', $kelas->id)->count();
        } else {
            $siswa = 0;
        }
        return view('wali.home', compact('mapel','kelas','siswa'));
    }

    public function wali() {
        $walis = User::where('level','Wali')->get();
        $gurus = User::where('level','<>','Admin')->get();
        return view('admin.wali', compact('walis','gurus'));
    }

    public function simpanWali(Request $request) {
        if ($request->id) {
            $wali = User::find($request->id);
            $wali->catatan = $request->catatan;
            if ($wali->id != $request->guru) {
                $wali->level = 'Guru';
                $wali->catatan = '';
                $user = User::find($request->guru);
                $user->level = 'Wali';
                $user->catatan = $request->catatan;
                $user->save();
            }
            $wali->save();
        } else {
            $wali = User::find($request->guru);
            $wali->catatan = $request->catatan;
            $wali->level = 'Wali';
            $wali->save();
        }
        return back();
    }

    public function hapusWali(Request $request) {
        $wali = User::find($request->id);
        $wali->level = 'Guru';
        $wali->catatan = '';
        $wali->save();
        return back();
    }
}
