<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulangan extends Model
{
    use HasFactory;
    protected $table = "ulangan";
    protected $fillable = ['siswa_id','kelas_id','guru_id','mapel_id','ulha_1','ulha_2','uts','ulha_3','ulha_4','ulha_5','ulha_6','uas','prak'];

    public function guru() {
      return $this->belongsTo(User::class, 'guru_id');
    }

    public function siswa() {
      return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function kelas() {
      return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function mapel() {
      return $this->belongsTo(Mapel::class, 'mapel_id');
    }
}
