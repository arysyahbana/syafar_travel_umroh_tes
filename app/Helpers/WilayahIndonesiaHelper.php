<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class WilayahIndonesiaHelper
{
    private static $baseUrl = 'https://www.emsifa.com/api-wilayah-indonesia/api/';

    public static function getProvinsi($id = null)
    {
        $data = self::getData('provinces.json');
        return $id ? self::findById($data, $id) : $data;
    }

    public static function getKabKota($provinsiId, $id = null)
    {
        $data = self::getData("regencies/{$provinsiId}.json");
        return $id ? self::findById($data, $id) : $data;
    }

    public static function getKecamatan($kabKotaId, $id = null)
    {
        $data = self::getData("districts/{$kabKotaId}.json");
        return $id ? self::findById($data, $id) : $data;
    }

    public static function getKelurahan($kecamatanId, $id = null)
    {
        $data = self::getData("villages/{$kecamatanId}.json");
        return $id ? self::findById($data, $id) : $data;
    }

    private static function getData($endpoint)
    {
        $response = Http::get(self::$baseUrl . $endpoint);
        return $response->json();
    }

    private static function findById($data, $id)
    {
        foreach ($data as $item) {
            if ($item['id'] == $id) {
                return $item['name'];
            }
        }
        return null;
    }
}
