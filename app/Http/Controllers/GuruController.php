<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use File;

class GuruController extends Controller
{
    public function index() {
        return view('guru.home');
    }

    public function guru() {
        $gurus = User::where('level', '!=', 'Admin')->get();
        return view('admin.guru', compact('gurus'));
    }

    public function simpanGuru(Request $request) {
        if ($request->id) {
            $guru = User::find($request->id);
            $guru->nip = $request->nip;
            $guru->name = ucwords($request->nama);
            $guru->jk = $request->jk;
            $guru->telp = $request->telp;
            $guru->tmp_lahir = $request->tempat_lahir;
            $guru->agama = $request->agama;
            $guru->tgl_lahir = $request->tgl_lahir;
            if ($request->file('foto')) {
                $foto = $request->file('foto');
                $fotoName = strtolower($request->nama).'.'.$request->foto->extension();
                $foto->move('foto/', $fotoName);
                $guru->foto = $fotoName;
            }
            $guru->save();
        } else {
            $foto = $request->file('foto');
            $fotoName = strtolower($request->nama).'.'.$request->foto->extension();
            $foto->move('foto/', $fotoName);
            User::create([
                'nip' => $request->nip,
                'name' => ucwords($request->nama),
                'jk' => $request->jk,
                'telp' => $request->telp,
                'tmp_lahir' => ucwords($request->tempat_lahir),
                'agama' => $request->agama,
                'tgl_lahir' => $request->tgl_lahir,
                'foto' => $fotoName,
                'email' => $request->nip.'@gmail.com',
                'password' => bcrypt('123456'),
                'level' => 'Guru'
            ]);
        }
        return back();
    }

    public function hapusGuru(Request $request) {
        $guru = User::find($request->id);
        File::delete('foto/'.$guru->foto);
        $guru->delete();
        return back();
    }
}
