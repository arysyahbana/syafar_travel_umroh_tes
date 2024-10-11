<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>NIk</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Provinsi</th>
            <th>Kabupaten/Kota</th>
            <th>Kecamatan</th>
            <th>Kelurahan/Desa</th>
            <th>Nomor Pasport</th>
            <th>Masa Berlaku Pasport</th>
            <th>Lampiran KTP</th>
            <th>Lampiran KK</th>
            <th>Lampiran Foto Diri</th>
            <th>Lampiran Pasport</th>
            <th>Nomor Visa</th>
            <th>Masa Berlaku Visa</th>
            <th>Paket Dipilih</th>
            <th>Kamar Dipilih</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jamaah as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data['item']->nama_lengkap ?? '' }}</td>
                <td>{{ $data['item']->nik ?? '' }}</td>
                <td>{{ $data['item']->tempat_lahir ?? '' }}</td>
                <td>{{ $data['item']->tgl_lahir ?? '' }}</td>
                <td>{{ $data['item']->gender ?? '' }}</td>
                <td>{{ $data['item']->alamat ?? '' }}</td>
                <td>{{ $data['provinsi'] ?? '' }}</td>
                <td>{{ $data['kabKota'] ?? '' }}</td>
                <td>{{ $data['kecamatan'] ?? '' }}</td>
                <td>{{ $data['kelurahan'] ?? '' }}</td>
                <td>{{ $data['item']->no_pasport ?? '' }}</td>
                <td>{{ $data['item']->tgl_pasport ?? '' }}</td>
                <td>{{ $data['item']->foto_ktp ?? '' }}</td>
                <td>{{ $data['item']->foto_kk ?? '' }}</td>
                <td>{{ $data['item']->foto_diri ?? '' }}</td>
                <td>{{ $data['item']->foto_pasport ?? '' }}</td>
                <td>{{ $data['item']->no_visa ?? '' }}</td>
                <td>{{ $data['item']->tgl_visa ?? '' }}</td>
                <td>{{ $data['item']->paket ?? '' }}</td>
                <td>{{ $data['item']->kamar ?? '' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
