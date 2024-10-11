<?php

namespace App\Exports;

use App\Helpers\WilayahIndonesiaHelper;
use App\Models\Jamaah;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class JamaahExport implements FromView
{
    protected $jamaah;

    public function __construct($jamaah)
    {
        $this->jamaah = $jamaah;
    }

    public function view(): View
    {
        $jamaahData = $this->jamaah->map(function ($item) {
            return [
                'item' => $item,
                'provinsi' => WilayahIndonesiaHelper::getProvinsi($item->provinsi),
                'kabKota' => WilayahIndonesiaHelper::getKabKota($item->provinsi, $item->kab_kota),
                'kecamatan' => WilayahIndonesiaHelper::getKecamatan($item->kab_kota, $item->kecamatan),
                'kelurahan' => WilayahIndonesiaHelper::getKelurahan($item->kecamatan, $item->kelurahan_desa),
            ];
        });

        return view('admin.exports.jamaah', [
            'jamaah' => $jamaahData
        ]);
    }
}
