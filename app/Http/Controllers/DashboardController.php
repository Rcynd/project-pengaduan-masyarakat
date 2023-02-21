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
        $pengaduan = Pengaduan::get();
        $tanggapan = tanggapan::get();


        return view('dashboard',[
            'jml_masyarakat' => $masyarakat->count(),
            'jml_petugas'=> $petugas->count(),
            'jml_pengaduan'=> $pengaduan->count(),
            'jml_tanggapan'=> $tanggapan->count(),
        ]);
    }
}
