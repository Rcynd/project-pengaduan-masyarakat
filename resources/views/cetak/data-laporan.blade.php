@extends('cetak.cetak-data')
@section('conten')
<tr>
    <th>foto</th>
    <th>Nama Petugas</th>
    <th>Nama Pengadu</th>
    <th>Tgl diTanggapi</th>
    <th>isi tanggapan</th>
    <th>status</th>
</tr>
    
@foreach ($laporans as $laporan)
@if ($laporan->pengaduan->status == 'selesai')
<tr>
    <td style="display:flex; justify-content:center; align-items:center; border:none;">
        <img src="{{ asset('storage/'.$laporan->pengaduan->foto) }}" width="50" height="50" alt="{{ $laporan->pengaduan->foto }}">
    </td>
    <td>{{ $laporan->petugas->nama_petugas }}</td>
    <td>{{ $laporan->pengaduan->masyarakat->nama }}</td>
    <td>{{ $laporan->tgl_tanggapan }}</td>
    <td>{{ $laporan->tanggapan }}</td>
    <td class="text-success">{{ $laporan->pengaduan->status }}</td>
</tr>
@endif
@endforeach
@endsection