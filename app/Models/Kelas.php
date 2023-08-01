<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = "kelas";
    protected $fillable = ['nama_kelas','status','jurusan_id','guru_id'];

    public function jurusan() {
      return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    public function guru() {
      return $this->belongsTo(User::class, 'guru_id');
    }

    public function jadwal() {
      return $this->hasMany(Jadwal::class, 'kelas_id');
    }

    public function ulangan() {
      return $this->hasMany(Ulangan::class, 'kelas_id');
    }

    public function siswa() {
        return $this->hasMany(Siswa::class, 'kelas_id');
      }
}
