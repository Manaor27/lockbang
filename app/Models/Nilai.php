<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $table = "nilai";
    protected $fillable = ['kkm','deskripsi_a','deskripsi_b','deskripsi_c','deskripsi_d','mapel_id'];

    public function mapel() {
      return $this->belongsTo(Mapel::class, 'mapel_id');
    }
}
