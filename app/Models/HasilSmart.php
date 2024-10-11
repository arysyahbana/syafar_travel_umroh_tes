<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilSmart extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_siswa',
        'id_hasil_bobot_total',
        'hasil_smart',
        'id_ekskul',
        // 'kd_ekskul_dipilih'
    ];

    public function rSiswa()
    {
        return $this->belongsTo(User::class, 'id_siswa');
    }

    public function rEkstrakurikuler()
    {
        return $this->belongsTo(Ekstrakurikuler::class, 'id_ekskul', 'kode_ekskul');
    }
}
