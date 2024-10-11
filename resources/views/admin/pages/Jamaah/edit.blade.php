@extends('admin.app')

@section('title', 'Edit Jamaah')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h6>Edit Jamaah</h6>
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('jamaah.show') }}" class="btn bg-gradient-primary">Kembali</a>
                        </div>
                    </div>
                    <div class="card-body px-5 pt-0 pb-2">
                        <form action="{{ route('jamaah.update', $jamaah->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <!-- Data Pribadi -->
                                                <fieldset class="p-2 mb-3">
                                                    <legend class="w-auto ">Data Pribadi</legend>
                                                    <div class="col col-12">
                                                        <x-admin.input type="text" placeholder="Nama"
                                                            label="Nama Lengkap" name="nama_lengkap" id="nama_lengkap"
                                                            value="{{ $jamaah->nama_lengkap ?? '' }}" />
                                                    </div>
                                                    <div class="col col-12">
                                                        <x-admin.input type="number" placeholder="NIK" label="NIK"
                                                            name="nik" id="nik"
                                                            value="{{ $jamaah->nik ?? '' }}" />
                                                    </div>
                                                    <div class="col col-12">
                                                        <x-admin.input type="text" placeholder="Tempat Lahir"
                                                            label="Tempat Lahir" name="tempat_lahir" id="tempat_lahir"
                                                            value="{{ $jamaah->tempat_lahir ?? '' }}" />
                                                    </div>
                                                    <div class="col col-12">
                                                        <x-admin.input type="date" placeholder="Tanggal Lahir"
                                                            label="Tanggal Lahir" name="tgl_lahir" id="tgl_lahir"
                                                            value="{{ $jamaah->tgl_lahir ?? '' }}" />
                                                    </div>
                                                    <div class="col col-12">
                                                        <Label>Jenis Kelamin</Label>
                                                        <div class="form">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="gender" id="inlineRadio1" value="Pria"
                                                                    {{ $jamaah->gender == 'Pria' ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="inlineRadio1">Pria</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="gender" id="inlineRadio2" value="Wanita"
                                                                    {{ $jamaah->gender == 'Wanita' ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="inlineRadio2">Wanita</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-12">
                                                <!-- Alamat -->
                                                <fieldset class="p-2 mb-3">
                                                    <legend class="w-auto">Alamat</legend>
                                                    <div class="col col-12">
                                                        <label>Alamat</label>
                                                        <textarea class="form-control mb-3" name="alamat" id="alamat" cols="20" rows="5">{{ $jamaah->alamat ?? '' }}</textarea>
                                                    </div>
                                                    <div class="col col-12">
                                                        <label for="provinsi" class="form-label">Provinsi</label>
                                                        <select class="form-select" id="provinsi" name="provinsi">
                                                            <option value="">Pilih Provinsi
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <div class="col col-12">
                                                        <label for="kabKota" class="form-label">Kabupaten/Kota</label>
                                                        <select class="form-select" id="kabKota" name="kab_kota" disabled>
                                                            <option value="">Pilih Kabupaten/Kota
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <div class="col col-12">
                                                        <label for="kecamatan" class="form-label">Kecamatan</label>
                                                        <select class="form-select" id="kecamatan" name="kecamatan"
                                                            disabled>
                                                            <option value="">Pilih Kecamatan
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <div class="col col-12">
                                                        <label for="kelurahan" class="form-label">Kelurahan/Desa</label>
                                                        <select class="form-select" id="kelurahan" name="kelurahan_desa"
                                                            disabled>
                                                            <option value="">Pilih Kelurahan/Desa
                                                            </option>
                                                        </select>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="col-12">
                                            <!-- Dokumen -->
                                            <fieldset class="p-2 mb-3">
                                                <legend class="w-auto">Dokumen</legend>
                                                <div class="col col-12">
                                                    <x-admin.input type="text" placeholder="Nomor Pasport"
                                                        label="Nomor Pasport" name="no_pasport" id="no_pasport"
                                                        value="{{ $jamaah->no_pasport ?? '' }}" />
                                                </div>
                                                <div class="col col-12">
                                                    <x-admin.input type="date" placeholder="Masa Berlaku Pasport"
                                                        label="Masa Berlaku Pasport" name="tgl_pasport" id="tgl_pasport"
                                                        value="{{ $jamaah->tgl_pasport ?? '' }}" />
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
                                                        <label for="formFile" class="form-label">Lampiran Foto
                                                            Diri</label>
                                                        <input class="form-control" type="file" id="formFile"
                                                            name="foto_diri">
                                                    </div>
                                                </div>
                                                <div class="col col-12">
                                                    <div class="mb-3">
                                                        <label for="formFile" class="form-label">Lampiran
                                                            Pasport</label>
                                                        <input class="form-control" type="file" id="formFile"
                                                            name="foto_pasport">
                                                    </div>
                                                </div>
                                                <div class="col col-12">
                                                    <x-admin.input type="text" placeholder="Nomor Visa"
                                                        label="Nomor Visa" name="no_visa" id="no_visa"
                                                        value="{{ $jamaah->no_visa ?? '' }}" />
                                                </div>
                                                <div class="col col-12">
                                                    <x-admin.input type="date" placeholder="Masa Berlaku Visa"
                                                        label="Masa Berlaku Visa" name="tgl_visa" id="tgl_visa"
                                                        value="{{ $jamaah->tgl_visa ?? '' }}" />
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-12">
                                            <!-- Paket Pilihan -->
                                            <fieldset class="p-2 mb-3">
                                                <legend class="w-auto">Paket Pilihan</legend>
                                                <div class="col col-12">
                                                    <Label>Paket Dipilih</Label>
                                                    <select class="form-select mb-3" name="paket" id="paket">
                                                        <option hidden>--- Pilih ---</option>
                                                        <option value="Paket Itikaf"
                                                            {{ $jamaah->paket == 'Paket Itikaf' ? 'selected' : '' }}>Paket
                                                            Itikaf
                                                        </option>
                                                        <option value="Paket Reguler"
                                                            {{ $jamaah->paket == 'Paket Reguler' ? 'selected' : '' }}>Paket
                                                            Reguler
                                                        </option>
                                                        <option value="Paket VIP"
                                                            {{ $jamaah->paket == 'Paket VIP' ? 'selected' : '' }}>Paket VIP
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col col-12">
                                                    <Label>Kamar Dipilih</Label>
                                                    <select class="form-select mb-3" name="kamar" id="kamar">
                                                        <option hidden>--- Pilih ---</option>
                                                        <option value="Quint"
                                                            {{ $jamaah->kamar == 'Quint' ? 'selected' : '' }}>Quint
                                                        </option>
                                                        <option value="Quad"
                                                            {{ $jamaah->kamar == 'Quad' ? 'selected' : '' }}>Quad</option>
                                                        <option value="Triple"
                                                            {{ $jamaah->kamar == 'Triple' ? 'selected' : '' }}>Triple
                                                        </option>
                                                        <option value="Double"
                                                            {{ $jamaah->kamar == 'Double' ? 'selected' : '' }}>Double
                                                        </option>
                                                        <option value="Single"
                                                            {{ $jamaah->kamar == 'Single' ? 'selected' : '' }}>Single
                                                        </option>
                                                    </select>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                // Fungsi untuk memuat data dari API
                function loadData(url, targetSelect, selectedValue = null) {
                    $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            let options = '<option value="">Pilih</option>';
                            $.each(data, function(key, value) {
                                options += '<option value="' + value.id + '"' +
                                    (selectedValue === value.id ? ' selected' : '') +
                                    '>' + value.name + '</option>';
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
                loadData('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json', '#provinsi',
                    "{{ $jamaah->provinsi }}");

                // Menampilkan data yang sudah ada di dropdown saat edit
                let provinsiId = "{{ $jamaah->provinsi }}"; // ambil nilai provinsi dari database
                let kabKotaId = "{{ $jamaah->kab_kota }}"; // ambil nilai kabupaten/kota dari database
                let kecamatanId = "{{ $jamaah->kecamatan }}"; // ambil nilai kecamatan dari database
                let kelurahanId = "{{ $jamaah->kelurahan_desa }}"; // ambil nilai kelurahan dari database

                if (provinsiId) {
                    loadData('https://www.emsifa.com/api-wilayah-indonesia/api/regencies/' + provinsiId + '.json',
                        '#kabKota', kabKotaId);
                    $('#kecamatan, #kelurahan').html('<option value="">Pilih</option>').prop('disabled', true);

                    // Memuat data kecamatan jika kabupaten/kota sudah ada
                    if (kabKotaId) {
                        loadData('https://www.emsifa.com/api-wilayah-indonesia/api/districts/' + kabKotaId + '.json',
                            '#kecamatan', kecamatanId);

                        // Memuat kelurahan setelah kecamatan dimuat
                        if (kecamatanId) {
                            loadData('https://www.emsifa.com/api-wilayah-indonesia/api/villages/' + kecamatanId +
                                '.json',
                                '#kelurahan', kelurahanId);
                        }
                    }
                }

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
                            '.json', '#kelurahan', kelurahanId);
                    } else {
                        $('#kelurahan').html('<option value="">Pilih</option>').prop('disabled', true);
                    }
                });
            });
        </script>
    </div>
@endsection
