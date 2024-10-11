@extends('admin.app')

@section('title', 'Detail Jamaah')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h6>Detail Jamaah</h6>
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('jamaah.show') }}" class="btn bg-gradient-success">Kembali</a>
                        </div>
                    </div>
                    <div class="card-body px-5">
                        <div class="table-responsive p-0">
                            <div class="row mx-3">
                                <div class="col col-12 col-lg-6">
                                    <div class="col col-12">
                                        <legend class="mb-3">Data Pribadi</legend>
                                        <table>
                                            <tr>
                                                <td>Nama Lengkap</td>
                                                <td class="px-3">:</td>
                                                <td>{{ $jamaah->nama_lengkap ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td>NIK</td>
                                                <td class="px-3">:</td>
                                                <td>{{ $jamaah->nik ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tempat Lahir</td>
                                                <td class="px-3">:</td>
                                                <td>{{ $jamaah->tempat_lahir ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tempat Lahir</td>
                                                <td class="px-3">:</td>
                                                <td>{{ $jamaah->tgl_lahir ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kelamin</td>
                                                <td class="px-3">:</td>
                                                <td>{{ $jamaah->gender ?? '-' }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col col-12 mt-3">
                                        <legend class="mb-3">Alamat</legend>
                                        <table class="me-5">
                                            <tr>
                                                <td>Alamat</td>
                                                <td class="px-3">:</td>
                                                <td>{{ $jamaah->alamat ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Provinsi</td>
                                                <td class="px-3">:</td>
                                                <td>{{ $provinsi ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Kabupaten / Kota</td>
                                                <td class="px-3">:</td>
                                                <td>{{ $kabKota ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Kecamatan</td>
                                                <td class="px-3">:</td>
                                                <td>{{ $kecamatan ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Kelurahan</td>
                                                <td class="px-3">:</td>
                                                <td>{{ $kelurahan ?? '-' }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col col-12 mt-3">
                                        <legend class="mb-3">Paket Pilihan</legend>
                                        <table class="me-5">
                                            <tr>
                                                <td>Paket Dipilih</td>
                                                <td class="px-3">:</td>
                                                <td>{{ $jamaah->paket ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Kamar Dipilih</td>
                                                <td class="px-3">:</td>
                                                <td>{{ $jamaah->kamar ?? '-' }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col col-12 col-lg-6">
                                    <legend class="mb-3">Dokumen</legend>
                                    <table>
                                        <tr>
                                            <td style="min-width: 150px">No Pasport</td>
                                            <td class="px-3">:</td>
                                            <td>{{ $jamaah->no_pasport ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Masa Berlaku Pasport</td>
                                            <td class="px-3">:</td>
                                            <td>{{ $jamaah->tgl_pasport ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Lampiran KTP</td>
                                            <td class="px-3">:</td>
                                            <td class="p-2">
                                                <a href="{{ asset('dist/assets/img/ktp/' . $jamaah->foto_ktp) }}"
                                                    target="_blank">
                                                    <img src="{{ asset('dist/assets/img/ktp/' . $jamaah->foto_ktp) }}"
                                                        alt="{{ $jamaah->foto_ktp ?? '' }}" class="img-fluid w-25">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Lampiran KK</td>
                                            <td class="px-3">:</td>
                                            <td class="p-2">
                                                <a href="{{ asset('dist/assets/img/kk/' . $jamaah->foto_kk) }}"
                                                    target="_blank">
                                                    <img src="{{ asset('dist/assets/img/kk/' . $jamaah->foto_kk) }}"
                                                        alt="{{ $jamaah->foto_kk ?? '' }}" class="img-fluid w-25">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Lampiran Foto Diri</td>
                                            <td class="px-3">:</td>
                                            <td class="p-2">
                                                <a href="{{ asset('dist/assets/img/diri/' . $jamaah->foto_diri) }}"
                                                    target="_blank">
                                                    <img src="{{ asset('dist/assets/img/diri/' . $jamaah->foto_diri) }}"
                                                        alt="{{ $jamaah->foto_diri ?? '' }}" class="img-fluid w-25">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Lampiran Pasport</td>
                                            <td class="px-3">:</td>
                                            <td class="p-2">
                                                <a href="{{ asset('dist/assets/img/pasport/' . $jamaah->foto_pasport) }}"
                                                    target="_blank">
                                                    <img src="{{ asset('dist/assets/img/pasport/' . $jamaah->foto_pasport) }}"
                                                        alt="{{ $jamaah->foto_pasport ?? '' }}" class="img-fluid w-25">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No Visa</td>
                                            <td class="px-3">:</td>
                                            <td>{{ $jamaah->no_visa ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Masa Berlaku Visa</td>
                                            <td class="px-3">:</td>
                                            <td>{{ $jamaah->tgl_visa ?? '-' }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
