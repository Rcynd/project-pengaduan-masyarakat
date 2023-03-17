@extends('cetak.cetak-data')
@section('conten')
 
		<thead>
			<tr>
				<th>No</th>
				{{-- <th>foto</th> --}}
                <th>Nama Petugas</th>
                <th>Nama Pengadu</th>
                <th>Tgl diTanggapi</th>
                <th>isi tanggapan</th>
                <th>status</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($pegawais as $p)
			@if ($p->pengaduan->masyarakat->username == $UsPetugas)
			<tr>
				<td>{{ $i++ }}</td>
				{{-- <td style="display:flex; justify-content:center; align-items:center;">
                    <img src="adminlte/img/avatar.png" alt="">
                </td> --}}
				<td>{{ $p->petugas->nama_petugas }}</td>
                <td>{{ $p->pengaduan->masyarakat->nama }}</td>
                <td>{{ $p->tgl_tanggapan }}</td>
                <td>{{ $p->tanggapan }}</td>
                <td class="text-success">{{ $p->pengaduan->status }}</td>
			</tr>
			@endif
			@endforeach
		</tbody>
    @endsection
    