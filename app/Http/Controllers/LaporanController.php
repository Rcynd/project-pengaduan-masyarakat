<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tanggapan;
use App\Models\User;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use PDF;

class LaporanController extends Controller
{
    public function index(){
        $tanggapan = Tanggapan::latest()->filter(request(['search']))->paginate(5)->withQueryString();
        return view('admin_petugas.laporan',[
            'tanggapans' => $tanggapan,
            'petugass' => User::where('level','petugas')->orWhere('level','admin')->get(),
            'masyarakats' => User::where('level','masyarakat')->get(),
        ]);
    }
    public function filterPetugas(Request  $request){
        $petugas = User::where('username',$request->nama_petugas)->first();
        $tanggapan = Tanggapan::where('id_petugas',$petugas->id)->latest()->filter(request(['search']))->paginate(5)->withQueryString();
        return view('admin_petugas.laporan',[
            'tanggapans' => $tanggapan,
            'petugass' => User::where('level','petugas')->orWhere('level','admin')->get(),
            'masyarakats' => User::where('level','masyarakat')->get(),
        ]);
    }
    public function filterTanggal(Request  $request){
        $tanggapan = Tanggapan::whereBetween('tgl_tanggapan',[$request->tanggalStart,$request->tanggalEnd])->latest()->filter(request(['search']))->paginate(5)->withQueryString();
        return view('admin_petugas.laporan',[
            'tanggapans' => $tanggapan,
            'petugass' => User::where('level','petugas')->orWhere('level','admin')->get(),
            'masyarakats' => User::where('level','masyarakat')->get(),
        ]);
    }
    public function filterPengadu(Request  $request){
        $petugas = Masyarakat::where('username',$request->nama_pengadu)->first();
        $tanggapan = Pengaduan::where('id_masyarakat',$petugas->id)->latest()->filter(request(['search']))->paginate(5)->withQueryString();
        return view('admin_petugas.laporan',[
            'tanggapans' => $tanggapan,
            'petugass' => User::where('level','petugas')->orWhere('level','admin')->get(),
            'masyarakats' => User::where('level','masyarakat')->get(),
        ]);
    }
    public function cetakLaporan(){
        return view('cetak.data-laporan',[
            'laporans' => Tanggapan::get(),
        ]);
    }
    public function cetakLaporanPDF()
    {
    	$pegawai = Tanggapan::get();
 
    	$pdf = PDF::loadview('cetak.data-laporanPDF',['pegawais'=>$pegawai]);
    	return $pdf->stream();
    }
    public function cetakLaporanPetugas(Request $request){
        return view('cetak.data-laporan-petugas',[
            'laporans' => Tanggapan::get(),
            'UsPetugas' => $request->nama_petugas,
        ]);
    }
    public function cetakLaporanPetugasPDF(Request $request){
        $pegawai = Tanggapan::get();
 
    	$pdf = PDF::loadview('cetak.data-laporan-petugasPDF',[
            'pegawais'=>$pegawai,
            'UsPetugas' => $request->nama_petugas,
        ]);
    	return $pdf->stream();
    }
    public function cetakLaporanPengadu(Request $request){
        return view('cetak.data-laporan-pengadu',[
            'laporans' => Tanggapan::get(),
            'usPengadu' => $request->nama_pengadu,
        ]);
    }
    public function cetakLaporanPengaduPDF(Request $request){
        $pegawai = Tanggapan::get();
 
    	$pdf = PDF::loadview('cetak.data-laporan-pengaduPDF',[
            'pegawais'=>$pegawai,
            'UsPetugas' => $request->nama_pengadu,
        ]);
    	return $pdf->stream();
    }
    public function cetakLaporanTanggal(Request $request){
        return view('cetak.data-laporan-tanggal',[
            'laporans' => Tanggapan::whereBetween('tgl_tanggapan',[$request->tanggalStart,$request->tanggalEnd])->get(),
        ]);
    }
    public function cetakLaporanTanggalPDF(Request $request){
        $pegawai = Tanggapan::whereBetween('tgl_tanggapan',[$request->tanggalStart,$request->tanggalEnd])->get();
 
    	$pdf = PDF::loadview('cetak.data-laporan-tanggalPDF',[
            'pegawais'=>$pegawai,
        ]);
    	return $pdf->stream();
    }
    public function detail($id){
        $tanggapan = Tanggapan::where('id',$id)->first();
        return view('admin_petugas.laporan-detail',[
            'tanggapan' => $tanggapan,
        ]);
    }
    public function destroy($id){
        Tanggapan::where('id',$id)->delete();
        // Transaksi::where('id_siswa',$siswa[1])->delete();
        
        return redirect('/tanggapan')->with('sukses','Tanggapan berhasil diHapus!');
    }
}
