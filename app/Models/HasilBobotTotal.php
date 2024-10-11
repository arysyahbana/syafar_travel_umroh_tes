<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilBobotTotal extends Model
{
    use HasFactory;

    protected $fillable = [
        'bobot_tinggi_total',
        'bobot_berat_total',
        'bobot_riwayat_total',
        'bobot_minat_total',
        'bobot_riwayat_ekskul_total',
        'bobot_prestasi_total',
    ];

    // public function rHasilBobot()
    // {
    //     return $this->belongsTo(HasilBobot::class, 'key_bobot_total');
    // }
}
