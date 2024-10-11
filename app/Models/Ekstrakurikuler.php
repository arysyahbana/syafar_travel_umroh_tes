<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_ekskul',
        'nama_ekskul',
        'image',
        'informasi_ekskul',
        'prestasi',
        'dokumentasi'
    ];

    public function rHasilSmart(){
        return $this->hasMany(HasilSmart::class, 'kode_ekskul');
    }

    public function rPrestasi(){
        return $this->hasMany(Prestasi::class, 'kd_ekskul', 'kode_ekskul');
    }

    public function rDokumentasi(){
        return $this->hasMany(Dokumentasi::class, 'kd_ekskul', 'kode_ekskul');
    }
}
