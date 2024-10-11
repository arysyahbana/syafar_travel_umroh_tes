<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ekskulExport;
use App\Http\Controllers\Controller;
use App\Models\Dokumentasi;
use App\Models\Ekstrakurikuler;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class EkskulController extends Controller
{
    private function validasiInputData(Request $request, $imageRule)
    {
        $request->validate(
            [
                'kode' => 'required',
                'nama' => 'required',
                'image' => $imageRule . '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'info' => 'required',
            ],
            [
                'kode.required' => 'Kode ekskul wajib diisi',
                'nama.required' => 'Nama ekskul wajib diisi',
                'image.required' => 'Gambar ekskul wajib diisi',
                'image.image' => 'File harus berupa gambar',
                'image.mimes' => 'Gambar harus berupa jpeg, png, jpg, gif, svg',
                'image.max' => 'Gambar tidak boleh lebih dari 2 MB',
            ],
        );
    }

    private function getImage($image, $name, $directory = '')
    {
        if ($image == null) {
            return null;
        }
        $extension = $image->getClientOriginalExtension();
        $filename = $name . '.' . $extension;
        $path = public_path('dist/assets/img/ekskul/' . $directory);
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
        $page = 'Ekskul';
        $ekskul = Ekstrakurikuler::with('rPrestasi', 'rDokumentasi')->get();
        // return $ekskul;
        return view('admin.pages.Ekskul.index', compact('page', 'ekskul'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // $prestasiArray = $request->input('prestasi', []);
        // dd($prestasiArray);
        $this->validasiInputData($request, 'required');
        $prestasi = $request->prestasi;
        $image = $this->getImage($request->file('image'), $request->nama);
        $dokumentasiFiles = $request->file('dokumentasi');

        Ekstrakurikuler::create([
            'kode_ekskul' => $request->kode,
            'nama_ekskul' => $request->nama,
            'image' => $image,
            'informasi_ekskul' => trim($request->info),
        ]);
        // dd($prestasi);
        if ($prestasi != null) {
            foreach ($prestasi as $item) {
                if (!empty($item)) {
                    // Check if the item is not null or empty
                    Prestasi::create([
                        'kd_ekskul' => $request->kode,
                        'prestasi' => $item,
                    ]);
                }
            }
        }

        if ($dokumentasiFiles) {
            foreach ($dokumentasiFiles as $key => $file) {
                $dokumentasi = $this->getImage($file, $request->nama . '_dokumentasi_' . ($key + 1), 'dokumentasi');
                Dokumentasi::create([
                    'kd_ekskul' => $request->kode,
                    'dokumentasi' => $dokumentasi,
                ]);
            }
        }

        return back()->with('success', 'Data ekskul berhasil ditambahkan');
    }

    public function edit($id)
    {
        $page = 'Ekskul';
        $ekskul = Ekstrakurikuler::with('rPrestasi', 'rDokumentasi')->findOrFail($id);
        // return $ekskul;
        return view('admin.pages.Ekskul.edit', compact('page', 'ekskul'));
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        // $prestasiArray = $request->input('prestasi', []);
        // dd($prestasiArray);
        $this->validasiInputData($request, 'sometimes');
        $ekskul = Ekstrakurikuler::findOrFail($id);

        // Update data ekstrakurikuler
        $data = [
            'kode_ekskul' => $request->kode,
            'nama_ekskul' => $request->nama,
            'informasi_ekskul' => trim($request->info),
        ];

        // Handle image update
        $image = $this->getImage($request->file('image'), $request->nama);
        if ($image) {
            if ($request->nama != $ekskul->nama_ekskul) {
                $this->deleteImage('ekskul', $ekskul->image);
            }
            $data['image'] = $image;
        }

        $ekskul->update($data);

        // Update prestasi
        $prestasi = $request->prestasi ?? [];

        if ($prestasi != null) {
            Prestasi::where('kd_ekskul', $ekskul->kode_ekskul)->delete();
            foreach ($prestasi as $item) {
                if (!empty($item)) {
                    // Check if the item is not null or empty
                    Prestasi::create([
                        'kd_ekskul' => $request->kode,
                        'prestasi' => $item,
                    ]);
                }
            }
        }
        // Delete old prestasi

        // Update dokumentasi
        $dokumentasiFiles = $request->file('dokumentasi');
        // dd($dokumentasiFiles);die;
        if ($dokumentasiFiles) {
            // Delete old dokumentasi
            $oldDokumentasi = Dokumentasi::where('kd_ekskul', $ekskul->kode_ekskul)->get();
            foreach ($oldDokumentasi as $dok) {
                $this->deleteImage('dokumentasi', $dok->dokumentasi);
                $dok->delete();
            }
            // Create new dokumentasi
            foreach ($dokumentasiFiles as $key => $file) {
                $dokumentasi = $this->getImage($file, $request->nama . '_dokumentasi_' . ($key + 1), 'dokumentasi');
                Dokumentasi::create([
                    'kd_ekskul' => $ekskul->kode_ekskul,
                    'dokumentasi' => $dokumentasi,
                ]);
            }
        }

        return redirect()->route('ekskul.show')->with('success', 'Data ekskul berhasil diubah');
    }

    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            $ekskul = Ekstrakurikuler::findOrFail($id);

            // Delete related prestasi records
            Prestasi::where('kd_ekskul', $ekskul->kode_ekskul)->delete();

            // Delete related dokumentasi records and files
            $dokumentasiFiles = Dokumentasi::where('kd_ekskul', $ekskul->kode_ekskul)
                ->pluck('dokumentasi')
                ->map(function ($file) {
                    return public_path('dist/assets/img/ekskul/dokumentasi/' . $file);
                })
                ->filter(function ($path) {
                    return File::exists($path);
                })
                ->toArray();

            File::delete($dokumentasiFiles);
            Dokumentasi::where('kd_ekskul', $ekskul->kode_ekskul)->delete();

            // Delete ekskul image if it exists
            $imagePath = public_path('dist/assets/img/ekskul/' . $ekskul->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }

            // Delete the ekskul record
            $ekskul->delete();
        });
        return back()->with('success', 'Data ekskul berhasil dihapus');
    }

    public function download()
    {
        $today = date('d-m-Y');
        return Excel::download(new ekskulExport(), 'ekskul - ' . $today . '.xlsx');
    }
}
