<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\Masyarakat;
use Illuminate\Support\Facades\Storage;

class AduanController extends Controller
{
    
    public function index(){
        $us = Masyarakat::where('username' , auth()->user()->username)->first();
        $pengaduan = Pengaduan::where('id_masyarakat',$us->id)->latest()->filter(request(['search']))->paginate(5)->withQueryString();
        $arrayPengaduan = Pengaduan::where('id_masyarakat',$us->id)->get();
        return view('admin_petugas.aduan-masyarakat',[
            'pengaduans' => $pengaduan,
            'arrPengaduan' => $arrayPengaduan,
        ]);
    }
    public function detail($id){
        $pengaduan = Pengaduan::where('id',$id)->first();
        $tanggapan = Tanggapan::where('id_pengaduan',$id)->first();
        
        return view('admin_petugas.aduan-masyarakat-detail',[
            'pengaduan' => $pengaduan,
            'tanggapan' => $tanggapan,
        ]);
    }
    public function create(){
        $us = Masyarakat::where('username' , auth()->user()->username)->first();
        return view('admin_petugas.aduan-masyarakat-create',[
            'id_masyarakat' => $us->id,
            'nik' => $us->nik,

        ]);
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nik' => 'required',
            'id_masyarakat' => 'required',
            'status' => 'required',
            'foto' => 'image|file|max:20000 ',
            'isi_laporan' => 'required'
        ]);
        $validateData['tgl_pengaduan'] = now();

        if ($request->file('foto')) {
            $validateData['foto'] = $request->file('foto')->store('pengaduan-fotos');
        }

        Pengaduan::create($validateData);

        return redirect('/aduan')->with('sukses', 'laporan pengaduan berhasil terkirim! mohon tunggu untuk diTanggapi');

    }
    public function destroy($id)
    {
        $pengaduan = Pengaduan::where('id',$id)->first();
        if ($pengaduan->foto) {
            Storage::delete($pengaduan->foto);
        }
        Pengaduan::where('id',$id)->delete();

        return redirect('/aduan')->with('sukses', 'pengaduan berhasil dihapus!');
    }

}
