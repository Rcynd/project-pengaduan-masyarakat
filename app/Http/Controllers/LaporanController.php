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
    public function cetakLaporan(){
        return view('cetak.data-laporan',[
            'laporans' => Tanggapan::get(),
        ]);
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
