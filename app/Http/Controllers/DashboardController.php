<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\Tanggapan;

class DashboardController extends Controller
{
    public function index(){
        $petugas = User::where('level','admin')->orWhere('level','petugas')->get();
        $masyarakat = Masyarakat::get();
        $pengaduan = Pengaduan::where('status','menunggu')->get();
        $proses = Pengaduan::where('status','diproses')->get();
        $tanggapan = tanggapan::get();
        $masyarakata = Masyarakat::where('username',auth()->user()->username)->first();
        if(isset($masyarakata)){
            $pengaduanku = Pengaduan::where('id_masyarakat',$masyarakata->id)->get();
            $pengaduanku = $pengaduanku->count();
        } else {
            $pengaduanku = 0;
        }

        return view('dashboard',[
            'jml_masyarakat' => $masyarakat->count(),
            'jml_petugas'=> $petugas->count(),
            'jml_pengaduan'=> $pengaduan->count(),
            'jml_tanggapan'=> $tanggapan->count(),
            'jml_proses'=> $proses->count(),
            'jml_pengaduan_ku'=> $pengaduanku,
        ]);
    }
}
