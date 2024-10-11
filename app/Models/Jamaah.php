<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jamaah extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'nik',
        'tempat_lahir',
        'tgl_lahir',
        'alamat',
        'provinsi',
        'kab_kota',
        'kecamatan',
        'kelurahan_desa',
        'gender',
        'no_pasport',
        'tgl_pasport',
        'foto_ktp',
        'foto_kk',
        'foto_diri',
        'foto_pasport',
        'no_visa',
        'tgl_visa',
        'paket',
        'kamar',
    ];
}
