<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = "siswa";
    protected $fillable = ['nis','nisn','nama_siswa','jk','telp','tempat_lahir','tgl_lahir','agama','img','kelas_id'];

    public function ulangan() {
      return $this->hasMany(Ulangan::class, 'siswa_id');
    }

    public function kelas() {
        return $this->belongsTo(Kelas::class, 'kelas_id');
      }
}
