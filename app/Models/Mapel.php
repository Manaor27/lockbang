<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $table = "mapel";
    protected $fillable = ['nama_mapel','kelompok','jurusan_id','guru_id'];

    public function jurusan() {
      return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    public function guru() {
        return $this->belongsTo(User::class, 'guru_id');
      }

    public function jadwal() {
      return $this->hasMany(Jadwal::class, 'mapel_id');
    }

    public function ulangan() {
      return $this->hasMany(Ulangan::class, 'mapel_id');
    }

    public function nilai() {
        return $this->hasMany(Nilai::class, 'mapel_id');
    }
}
