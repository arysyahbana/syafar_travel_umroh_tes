@extends('admin.app')

@section('title', 'Daftar Jamaah')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h6>Daftar Jamaah</h6>
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <a href="#" class="btn bg-gradient-warning" data-bs-toggle="modal" data-bs-target="#addJamaah"><i
                                class="bi bi-plus-circle"></i><span class="text-capitalize ms-1">Tambah</span></a>
                        <a href="{{ route('jamaah.download') }}" class="btn bg-gradient-success"><i
                                class="bi bi-plus-circle"></i><span class="text-capitalize ms-1">Unduh Rekap Data</span></a>
                    </div>
                    <div class="card-body px-5 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <x-admin.table id="datatable">
                                @slot('header')
                                    <tr>
                                        <x-admin.th>No</x-admin.th>
                                        <x-admin.th>Nama Lengkap</x-admin.th>
                                        <x-admin.th>NIK</x-admin.th>
                                        <x-admin.th>Jenis Kelamin</x-admin.th>
                                        <x-admin.th>Foto</x-admin.th>
                                        <x-admin.th>Action</x-admin.th>
                                    </tr>
                                @endslot

                                @foreach ($jamaah as $item)
                                    <tr>
                                        <x-admin.td class="text-center">{{ $loop->iteration }}</x-admin.td>
                                        <x-admin.td class="text-center">{{ $item->nama_lengkap ?? '-' }}</x-admin.td>
                                        <x-admin.td class="text-center">{{ $item->nik ?? '-' }}</x-admin.td>
                                        <x-admin.td class="text-center">{{ $item->gender ?? '-' }}</x-admin.td>
                                        <x-admin.td class="text-center">
                                            <img src="{{ asset('dist/assets/img/diri/' . $item->foto_diri) }}"
                                                alt="" class="img-fluid w-25 img-thumbnail">
                                        </x-admin.td>
                                        <x-admin.td class="text-center">
                                            <a href="{{ route('jamaah.preview', $item->id) }}"
                                                class="btn bg-gradient-success"><i class="fa fa-eye"
                                                    aria-hidden="true"></i><span
                                                    class="text-capitalize ms-1">Preview</span></a>
                                            <a href="{{ route('jamaah.edit', $item->id) }}" class="btn bg-gradient-info"><i
                                                    class="fa fa-pencil" aria-hidden="true"></i><span
                                                    class="text-capitalize ms-1">Edit</span></a>
                                            <a href="#" class="btn bg-gradient-danger" data-bs-toggle="modal"
                                                data-bs-target="#hapus{{ $item->id }}"><i class="fa fa-trash"
                                                    aria-hidden="true"></i><span
                                                    class="text-capitalize ms-1">Hapus</span></a>
                                        </x-admin.td>

                                        <!-- Modal Hapus -->
                                        <div class="modal fade" id="hapus{{ $item->id }}" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="hapusLabel">Hapus Data
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <img src="{{ asset('dist/assets/img/bin.gif') }}" alt=""
                                                            class="img-fluid w-25">
                                                        <p>Yakin ingin menghapus data {{ $item->name }}?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{ route('jamaah.destroy', $item->id) }}" type="submit"
                                                            class="btn btn-sm btn-danger">Hapus</a>
                                                        <button type="button" class="btn btn-sm btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                @endforeach
                            </x-admin.table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Add -->
        <div class="modal fade" id="addJamaah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="addLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addLabel">Tambah Data User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('jamaah.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <!-- Data Pribadi -->
                                    <fieldset class="p-2 mb-3">
                                        <legend class="w-auto px-2">Data Pribadi</legend>
                                        <div class="col col-12">
                                            <x-admin.input type="text" placeholder="Nama" label="Nama Lengkap"
                                                name="nama_lengkap" id="nama_lengkap" />
                                        </div>
                                        <div class="col col-12">
                                            <x-admin.input type="number" placeholder="NIK" label="NIK"
                                                name="nik" id="nik" />
                                        </div>
                                        <div class="col col-12">
                                            <x-admin.input type="text" placeholder="Tempat Lahir" label="Tempat Lahir"
                                                name="tempat_lahir" id="tempat_lahir" />
                                        </div>
                                        <div class="col col-12">
                                            <x-admin.input type="date" placeholder="Tanggal Lahir"
                                                label="Tanggal Lahir" name="tgl_lahir" id="tgl_lahir" />
                                        </div>
                                        <div class="col col-12">
                                            <Label>Jenis Kelamin</Label>
                                            <div class="form">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                        id="inlineRadio1" value="Pria">
                                                    <label class="form-check-label" for="inlineRadio1">Pria</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                        id="inlineRadio2" value="Wanita">
                                                    <label class="form-check-label" for="inlineRadio2">Wanita</label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-6">
                                    <!-- Alamat -->
                                    <fieldset class="p-2 mb-3">
                                        <legend class="w-auto px-2">Alamat</legend>
                                        <div class="col col-12">
                                            <label>Alamat</label>
                                            <textarea class="form-control mb-3" name="alamat" id="alamat" cols="20" rows="5"></textarea>
                                        </div>
                                        <div class="col col-12">
                                            <label for="provinsi" class="form-label">Provinsi</label>
                                            <select class="form-select" id="provinsi" name="provinsi">
                                                <option value="">Pilih Provinsi</option>
                                            </select>
                                        </div>

                                        <div class="col col-12">
                                            <label for="kabKota" class="form-label">Kabupaten/Kota</label>
                                            <select class="form-select" id="kabKota" name="kab_kota" disabled>
                                                <option value="">Pilih Kabupaten/Kota</option>
                                            </select>
                                        </div>

                                        <div class="col col-12">
                                            <label for="kecamatan" class="form-label">Kecamatan</label>
                                            <select class="form-select" id="kecamatan" name="kecamatan" disabled>
                                                <option value="">Pilih Kecamatan</option>
                                            </select>
                                        </div>

                                        <div class="col col-12">
                                            <label for="kelurahan" class="form-label">Kelurahan/Desa</label>
                                            <select class="form-select" id="kelurahan" name="kelurahan_desa" disabled>
                                                <option value="">Pilih Kelurahan/Desa</option>
                                            </select>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-6">
                                    <!-- Dokumen -->
                                    <fieldset class="p-2 mb-3">
                                        <legend class="w-auto px-2">Dokumen</legend>
                                        <div class="col col-12">
                                            <x-admin.input type="text" placeholder="Nomor Pasport"
                                                label="Nomor Pasport" name="no_pasport" id="no_pasport" />
                                        </div>
                                        <div class="col col-12">
                                            <x-admin.input type="date" placeholder="Masa Berlaku Pasport"
                                                label="Masa Berlaku Pasport" name="tgl_pasport" id="tgl_pasport" />
                                        </div>
                                        <div class="col col-12">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Lampiran KTP</label>
                                                <input class="form-control" type="file" id="formFile"
                                                    name="foto_ktp">
                                            </div>
                                        </div>
                                        <div class="col col-12">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Lampiran KK</label>
                                                <input class="form-control" type="file" id="formFile"
                                                    name="foto_kk">
                                            </div>
                                        </div>
                                        <div class="col col-12">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Lampiran Foto Diri</label>
                                                <input class="form-control" type="file" id="formFile"
                                                    name="foto_diri">
                                            </div>
                                        </div>
                                        <div class="col col-12">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Lampiran Pasport</label>
                                                <input class="form-control" type="file" id="formFile"
                                                    name="foto_pasport">
                                            </div>
                                        </div>
                                        <div class="col col-12">
                                            <x-admin.input type="text" placeholder="Nomor Visa" label="Nomor Visa"
                                                name="no_visa" id="no_visa" />
                                        </div>
                                        <div class="col col-12">
                                            <x-admin.input type="date" placeholder="Masa Berlaku Visa"
                                                label="Masa Berlaku Visa" name="tgl_visa" id="tgl_visa" />
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-6">
                                    <!-- Paket Pilihan -->
                                    <fieldset class="p-2 mb-3">
                                        <legend class="w-auto px-2">Paket Pilihan</legend>
                                        <div class="col col-12">
                                            <Label>Paket Dipilih</Label>
                                            <select class="form-select mb-3" name="paket" id="paket">
                                                <option hidden>--- Pilih ---</option>
                                                <option value="Paket Itikaf">Paket Itikaf</option>
                                                <option value="Paket Reguler">Paket Reguler</option>
                                                <option value="Paket VIP">Paket VIP</option>
                                            </select>
                                        </div>
                                        <div class="col col-12">
                                            <Label>Kamar Dipilih</Label>
                                            <select class="form-select mb-3" name="kamar" id="kamar">
                                                <option hidden>--- Pilih ---</option>
                                                <option value="Quint">Quint</option>
                                                <option value="Quad">Quad</option>
                                                <option value="Triple">Triple</option>
                                                <option value="Double">Double</option>
                                                <option value="Single">Single</option>
                                            </select>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                            <button type="button" class="btn btn-sm btn-secondary"
                                data-bs-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                // Fungsi untuk memuat data dari API
                function loadData(url, targetSelect) {
                    $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            let options = '<option value="">Pilih</option>';
                            $.each(data, function(key, value) {
                                options += '<option value="' + value.id + '">' + value.name +
                                    '</option>';
                            });
                            $(targetSelect).html(options).prop('disabled', false);
                        },
                        error: function(xhr, status, error) {
                            console.error("Error loading data:", error);
                            $(targetSelect).html('<option value="">Error loading data</option>').prop(
                                'disabled', true);
                        }
                    });
                }

                // Memuat data provinsi
                loadData('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json', '#provinsi');

                // Event listener untuk perubahan provinsi
                $('#provinsi').change(function() {
                    let provinsiId = $(this).val();
                    if (provinsiId) {
                        loadData('https://www.emsifa.com/api-wilayah-indonesia/api/regencies/' + provinsiId +
                            '.json', '#kabKota');
                        $('#kecamatan, #kelurahan').html('<option value="">Pilih</option>').prop('disabled',
                            true);
                    } else {
                        $('#kabKota, #kecamatan, #kelurahan').html('<option value="">Pilih</option>').prop(
                            'disabled', true);
                    }
                });

                // Event listener untuk perubahan kabupaten/kota
                $('#kabKota').change(function() {
                    let kabKotaId = $(this).val();
                    if (kabKotaId) {
                        loadData('https://www.emsifa.com/api-wilayah-indonesia/api/districts/' + kabKotaId +
                            '.json', '#kecamatan');
                        $('#kelurahan').html('<option value="">Pilih</option>').prop('disabled', true);
                    } else {
                        $('#kecamatan, #kelurahan').html('<option value="">Pilih</option>').prop('disabled',
                            true);
                    }
                });

                // Event listener untuk perubahan kecamatan
                $('#kecamatan').change(function() {
                    let kecamatanId = $(this).val();
                    if (kecamatanId) {
                        loadData('https://www.emsifa.com/api-wilayah-indonesia/api/villages/' + kecamatanId +
                            '.json', '#kelurahan');
                    } else {
                        $('#kelurahan').html('<option value="">Pilih</option>').prop('disabled', true);
                    }
                });
            });
        </script>
    </div>
@endsection
