<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tanggapan;

class LaporanController extends Controller
{
    public function index(){
        $tanggapan = Tanggapan::latest()->filter(request(['search']))->paginate(8)->withQueryString();
        return view('admin_petugas.laporan',[
            'tanggapans' => $tanggapan,
        ]);
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'tanggapan' => 'require',
            'id_petugas' => '',
            'id_pengaduan' => '',
            'tgl_tanggapan' => '',
        ],[
            'nik.require' => 'isi form Tanggapan terlebih dahulu',
        ]);

        Tanggapan::create([
            'id_petugas' => $request->id_petugas,
            'id_pengaduan' => $request->id_pengaduan,
            'tgl_tanggapan' => now(),
            'tanggapan' => $request->tangapan,
        ]);
        Pengaduan::where('id', $request->id_pengaduan)->update([
            'status' => 'proses'
        ]);
        // $request->session()->flash('success', 'Registration successfull! please Login');


        return redirect('/pengaduan')->with('sukses', 'Pengaduan sudah diTanggapi');
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