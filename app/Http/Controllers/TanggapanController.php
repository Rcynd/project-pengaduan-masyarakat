<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tanggapan;
use App\Models\Pengaduan;

class TanggapanController extends Controller
{
    public function index(){
        $tanggapan = Tanggapan::latest()->filter(request(['search']))->paginate(5)->withQueryString();
        return view('admin_petugas.tanggapan',[
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
            'status' => 'selesai'
        ]);
        // $request->session()->flash('success', 'Registration successfull! please Login');


        return redirect('/pengaduan')->with('sukses', 'Pengaduan sudah diTanggapi');
    }
    public function edit($id){
        $tanggapan = Tanggapan::where('id',$id)->first();
        return view('admin_petugas.tanggapan-edit',[
            'tanggapan' => $tanggapan,
        ]);
    }
    public function update(Request $request){
        $validatedData = $request->validate([
            'id_petugas' => '',
            'id_tanggapan' => '',
            'tgl_tanggapan' => '',
        ]);
        if (!isset($request->tangapan)) {
            return back()->with('sukses','mohon isi deskripsi laporan');
        }
        Tanggapan::where('id', $request->id_tanggapan)->update([
            'tanggapan' => $request->tangapan,
            'id_petugas' => $request->id_petugas,
            'tgl_tanggapan' => now(),
        ]);

        return redirect('/tanggapan')->with('sukses', 'Tanggapan Pengaduan berhasil diUbah');

    }

    public function detail($id){
        $tanggapan = Tanggapan::where('id',$id)->first();
        return view('admin_petugas.tanggapan-detail',[
            'tanggapan' => $tanggapan,
        ]);
    }
    public function destroy($id){
        $pengaduan = Tanggapan::where('id',$id)->first();

        Tanggapan::where('id',$id)->delete();

        Pengaduan::where('id',$pengaduan->id_pengaduan)->update([
            'status' => 'menunggu',
        ]);
        // Transaksi::where('id_siswa',$siswa[1])->delete();
        
        return redirect('/tanggapan')->with('sukses','Tanggapan berhasil diHapus!');
    }
}
