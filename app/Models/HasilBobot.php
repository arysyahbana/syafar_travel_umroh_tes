<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilBobot extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_siswa',
        'id_hasil_bobot_total',
        'kd_ekskul',
        'bobot_tinggi',
        'bobot_berat',
        'bobot_riwayat',
        'bobot_minat',
        'bobot_riwayat_ekskul',
        'bobot_prestasi',
    ];

    public function rSiswa()
    {
        return $this->belongsTo(User::class, 'id_siswa');
    }

    public function rEkstrakurikuler()
    {
        return $this->belongsTo(Ekstrakurikuler::class, 'kd_ekskul', 'kode_ekskul');
    }

    public function rHasilBobotTotal()
    {
        return $this->belongsTo(HasilBobotTotal::class, 'id_hasil_bobot_total');
    }
}
