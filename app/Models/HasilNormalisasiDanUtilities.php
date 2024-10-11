<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilNormalisasiDanUtilities extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_siswa',
        'kd_ekskul',
        'id_hasil_bobot_total',
        'normalisasi_tinggi',
        'normalisasi_berat',
        'normalisasi_riwayat',
        'normalisasi_minat',
        'normalisasi_riwayat_ekskul',
        'normalisasi_prestasi',
        'hasil_utilities',
    ];

    public function rEkstrakurikuler()
    {
        return $this->belongsTo(Ekstrakurikuler::class, 'kd_ekskul', 'kode_ekskul');
    }

    public function rHasilBobotTotal()
    {
        return $this->belongsTo(HasilBobotTotal::class, 'id_hasil_bobot_total');
    }

    public function rSiswa()
    {
        return $this->belongsTo(User::class, 'id_siswa');
    }
}
