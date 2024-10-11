<?php

namespace App\Http\Controllers\Admin;

use App\Exports\JamaahExport;
use App\Helpers\WilayahIndonesiaHelper;
use App\Http\Controllers\Controller;
use App\Models\Jamaah;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class JamaahController extends Controller
{
    private function validasiJamaah(Request $request, $imageRule)
    {
        $request->validate(
            [
                'nama_lengkap' => 'required',
                'nik' => 'required|numeric',
                'foto_ktp' => $imageRule . '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'foto_kk' => $imageRule . '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'foto_diri' => $imageRule . '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'foto_pasport' => $imageRule . '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'nama_lengkap.required' => 'Nama lengkap wajib diisi',
                'nik.required' => 'NIK wajib diisi',
                'nik.numeric' => 'NIK harus berupa angka',
                'foto_ktp.required' => 'Gambar KTP wajib diisi',
                'foto_ktp.image' => 'File harus berupa gambar',
                'foto_ktp.mimes' => 'Gambar KTP harus berupa jpeg, png, jpg, gif, svg',
                'foto_ktp.max' => 'Gambar KTP tidak boleh lebih dari 2 MB',
                'foto_kk.image' => 'File KK harus berupa gambar',
                'foto_diri.image' => 'File foto diri harus berupa gambar',
                'foto_pasport.image' => 'File pasport harus berupa gambar',
            ],
        );
    }

    private function getImage($image, $name)
    {
        if ($image == null) {
            return null;
        }
        $extension = $image->getClientOriginalExtension();
        $filename = $name . '.' . $extension;
        // Mengatur folder penyimpanan sesuai jenis gambar
        $directory = '';
        if (strpos($name, 'kt_') === 0) {
            $directory = 'ktp';
        } elseif (strpos($name, 'kk_') === 0) {
            $directory = 'kk';
        } elseif (strpos($name, 'fd_') === 0) {
            $directory = 'diri';
        } elseif (strpos($name, 'ps_') === 0) {
            $directory = 'pasport';
        }
        $path = public_path('dist/assets/img/' . $directory);
        $image->move($path, $filename);
        return $filename;
    }

    private function deleteImage($folder, $filename)
    {
        $path = public_path("dist/assets/img/$folder/$filename");
        if (file_exists($path)) {
            unlink($path);
        }
    }

    public function index()
    {
        $page = 'Jamaah';
        $jamaah = Jamaah::get();
        return view('admin.pages.Jamaah.index', compact('page', 'jamaah'));
    }

    public function store(Request $request)
    {
        $this->validasiJamaah($request, 'required');

        // Simpan data pengguna
        $jamaah = new Jamaah();
        $jamaah->nama_lengkap = $request->input('nama_lengkap');
        $jamaah->nik = $request->input('nik');
        $jamaah->tempat_lahir = $request->input('tempat_lahir');
        $jamaah->tgl_lahir = $request->input('tgl_lahir');
        $jamaah->gender = $request->input('gender');
        $jamaah->alamat = $request->input('alamat');
        $jamaah->provinsi = $request->input('provinsi');
        $jamaah->kab_kota = $request->input('kab_kota');
        $jamaah->kecamatan = $request->input('kecamatan');
        $jamaah->kelurahan_desa = $request->input('kelurahan_desa');
        $jamaah->no_pasport = $request->input('no_pasport');
        $jamaah->tgl_pasport = $request->input('tgl_pasport');
        $jamaah->no_visa = $request->input('no_visa');
        $jamaah->tgl_visa = $request->input('tgl_visa');
        $jamaah->paket = $request->input('paket');
        $jamaah->kamar = $request->input('kamar');

        // Mengambil dan menyimpan gambar
        $jamaah->foto_ktp = $this->getImage($request->file('foto_ktp'), 'kt_' . $request->input('nama_lengkap') . '_' . date('Ymd'));
        $jamaah->foto_kk = $this->getImage($request->file('foto_kk'), 'kk_' . $request->input('nama_lengkap') . '_' . date('Ymd'));
        $jamaah->foto_diri = $this->getImage($request->file('foto_diri'), 'fd_' . $request->input('nama_lengkap') . '_' . date('Ymd'));
        $jamaah->foto_pasport = $this->getImage($request->file('foto_pasport'), 'ps_' . $request->input('nama_lengkap') . '_' . date('Ymd'));

        // Simpan data ke database
        $jamaah->save();

        // Redirect atau return response sesuai kebutuhan
        return redirect()->back()->with('success', 'Data jamaah berhasil disimpan.');
    }

    public function show($id)
    {
        $page = 'Jamaah';

        $jamaah = Jamaah::findOrFail($id);

        $provinsi = WilayahIndonesiaHelper::getProvinsi($jamaah->provinsi);
        $kabKota = WilayahIndonesiaHelper::getKabKota($jamaah->provinsi, $jamaah->kab_kota);
        $kecamatan = WilayahIndonesiaHelper::getKecamatan($jamaah->kab_kota, $jamaah->kecamatan);
        $kelurahan = WilayahIndonesiaHelper::getKelurahan($jamaah->kecamatan, $jamaah->kelurahan_desa);

        return view('admin.pages.Jamaah.show', compact('page', 'jamaah', 'provinsi', 'kabKota', 'kecamatan', 'kelurahan'));
    }

    public function edit($id)
    {
        $page = 'Jamaah';

        $jamaah = Jamaah::findOrFail($id);

        $provinsi = WilayahIndonesiaHelper::getProvinsi($jamaah->provinsi);
        $kabKota = WilayahIndonesiaHelper::getKabKota($jamaah->provinsi, $jamaah->kab_kota);
        $kecamatan = WilayahIndonesiaHelper::getKecamatan($jamaah->kab_kota, $jamaah->kecamatan);
        $kelurahan = WilayahIndonesiaHelper::getKelurahan($jamaah->kecamatan, $jamaah->kelurahan_desa);

        return view('admin.pages.Jamaah.edit', compact('page', 'jamaah', 'provinsi', 'kabKota', 'kecamatan', 'kelurahan'));
    }

    public function update(Request $request, $id)
    {
        $this->validasiJamaah($request, 'sometimes');

        $jamaah = Jamaah::findOrFail($id);

        $jamaah->nama_lengkap = $request->input('nama_lengkap');
        $jamaah->nik = $request->input('nik');
        $jamaah->tempat_lahir = $request->input('tempat_lahir');
        $jamaah->tgl_lahir = $request->input('tgl_lahir');
        $jamaah->gender = $request->input('gender');
        $jamaah->alamat = $request->input('alamat');
        $jamaah->provinsi = $request->input('provinsi');
        $jamaah->kab_kota = $request->input('kab_kota');
        $jamaah->kecamatan = $request->input('kecamatan');
        $jamaah->kelurahan_desa = $request->input('kelurahan_desa');
        $jamaah->no_pasport = $request->input('no_pasport');
        $jamaah->tgl_pasport = $request->input('tgl_pasport');
        $jamaah->no_visa = $request->input('no_visa');
        $jamaah->tgl_visa = $request->input('tgl_visa');
        $jamaah->paket = $request->input('paket');
        $jamaah->kamar = $request->input('kamar');

        if ($request->hasFile('foto_ktp')) {
            $this->deleteImage('ktp', $jamaah->foto_ktp);
            $jamaah->foto_ktp = $this->getImage($request->file('foto_ktp'), 'kt_' . $request->input('nama_lengkap') . '_' . date('Ymd'));
        }

        if ($request->hasFile('foto_kk')) {
            $this->deleteImage('kk', $jamaah->foto_kk);
            $jamaah->foto_kk = $this->getImage($request->file('foto_kk'), 'kk_' . $request->input('nama_lengkap') . '_' . date('Ymd'));
        }

        if ($request->hasFile('foto_diri')) {
            $this->deleteImage('diri', $jamaah->foto_diri);
            $jamaah->foto_diri = $this->getImage($request->file('foto_diri'), 'fd_' . $request->input('nama_lengkap') . '_' . date('Ymd'));
        }

        if ($request->hasFile('foto_pasport')) {
            $this->deleteImage('pasport', $jamaah->foto_pasport);
            $jamaah->foto_pasport = $this->getImage($request->file('foto_pasport'), 'ps_' . $request->input('nama_lengkap') . '_' . date('Ymd'));
        }

        $jamaah->save();

        return redirect()->route('jamaah.show')->with('success', 'Data jamaah berhasil diupdate.');
    }

    public function destroy($id)
    {
        $jamaah = Jamaah::findOrFail($id);

        $this->deleteImage('ktp', $jamaah->foto_ktp);
        $this->deleteImage('kk', $jamaah->foto_kk);
        $this->deleteImage('diri', $jamaah->foto_diri);
        $this->deleteImage('pasport', $jamaah->foto_pasport);

        $jamaah->delete();
        return redirect()->route('jamaah.show')->with('success', 'Data jamaah berhasil dihapus.');
    }

    public function downloadExcel()
    {
        $jamaahData = Jamaah::all();
        return Excel::download(new JamaahExport($jamaahData), 'jamaah.xlsx');
    }
}
