<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Auth;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Mapel;
use DB;

class AdminController extends Controller
{
    public function index() {
        $countSiswa = Siswa::count();
        $countGuru = User::where('level','<>','Admin')->count();
        $countKelas = Kelas::count();
        $countJurusan = Jurusan::count();
        $countMapel = Mapel::count();
        $countLaki = Siswa::where('jk', 'Laki-Laki')->count();
        $countPerempuan = Siswa::where('jk', 'Perempuan')->count();
        $nilai = DB::table('ulangan')->join('kelas','ulangan.kelas_id','=','kelas.id')->select('kelas.nama_kelas AS nama_kelas', DB::raw('AVG((ulangan.ulha_1 + ulangan.ulha_2 + ulangan.ulha_3 + ulangan.ulha_4 + ulangan.ulha_5 + ulangan.ulha_6 + ulangan.uts + ulangan.uas + ulangan.prak)/9) AS rata_rata'))->groupBy('kelas.nama_kelas')->get();
        $dataNilai = [];
        $dataLabel = [];
        foreach ($nilai as $key) {
            $dataNilai[] = $key->rata_rata;
            $dataLabel[] = $key->nama_kelas;
        }
        $dt = json_encode($dataNilai);
        $lbl = json_encode($dataLabel);
        return view('admin.home', compact('countSiswa', 'countGuru', 'countKelas', 'countJurusan', 'countMapel', 'countLaki', 'countPerempuan','dt','lbl'));
    }
}
