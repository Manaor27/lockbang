<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    protected $table = "jurusan";
    protected $fillable = ['jurusan'];

    public function mapel() {
      return $this->hasMany(Mapel::class, 'jurusan_id');
    }

    public function kelas() {
      return $this->hasMany(Kelas::class, 'jurusan_id');
    }

    public function jadwal() {
      return $this->hasMany(Jadwal::class, 'jurusan_id');
    }
}
