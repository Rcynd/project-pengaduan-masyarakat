<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\User;

class PengaduanController extends Controller
{
    public function index(){
        $pengaduan = Pengaduan::where('status','menunggu')->orWhere('status','diproses')->orWhere('status','ditolak')->latest()->filter(request(['search']))->paginate(5)->withQueryString();
        return view('admin_petugas.pengaduan',[
            'pengaduans' => $pengaduan,
        ]);
    }
    public function create(){
        return view('admin_petugas.register-create');
    }
    public function push(Request $request){
        $validateData = $request->validate([
            'nama_petugas' => 'required|max:255',
            'username' => 'required|unique:users',
            'password' => 'required|same:ulangi_password',
            'telp' => 'required|numeric|digits_between:11,13',
            'level' => 'required'
        ],[
            'nama_petgas.required' => 'Silahkan Isi nama terlebih dahulu!',

            'username.required' => 'Silahkan Isi username terlebih dahulu!',
            'username.uique' => 'Username sudah terdaftar!',

            'password.same' => 'Password dan Ulangi password harus sama!',

            'telp.numeric' => 'Nomor telepon harus berupa angka!',
            'telp.digits_between' => 'Nomor telepon harus diantara 10 - 13 nomor!',
        ]);
        $validateData['password'] = bcrypt($request->password);
        $validateData['email_verified_at'] = now();
        User::create($validateData);
        return redirect('/registrasi')->with('sukses','Data User berhasil diTambahkan!');
    }
    
    public function edit($username){
        $dataUser = User::where('username',$username)->first();
        return view('admin_petugas.register-edit',[
            'user' => $dataUser,
        ]);
    }
    public function update(Request $request , $username){
        $validateData = $request->validate([
            'nama_petugas' => 'required|max:255',
            'username' => 'required',
            'password' => 'same:ulangi_password',
            'telp' => 'required|numeric|digits_between:11,13',
            'level' => 'required'
        ],[
            'nama_petgas.required' => 'Silahkan Isi nama terlebih dahulu!',

            'username.required' => 'Silahkan Isi username terlebih dahulu!',
            'username.unique' => 'Username sudah terdaftar!',

            'password.same' => 'Password dan Ulangi password harus sama!',

            'telp.numeric' => 'Nomor telepon harus berupa angka!',
            'telp.digits_between' => 'Nomor telepon harus diantara 10 - 13 nomor!',
        ]);
        if (isset($validateData['password'])) {
            $validateData['password'] = bcrypt( $validateData['password']);
            User::where('username',$username)->update($validateData);
            return redirect('/registrasi')->with('sukses','Data User berhasil diUbah beserta Passwordnya!');
        }
        
        User::where('username',$username)->update([
            'nama_petugas' => $validateData['nama_petugas'],
            'username' => $validateData['username'],
            'telp' => $validateData['telp'],
            'level' => $validateData['level'],
            ]
        );
        return redirect('/registrasi')->with('sukses','Data User berhasil diUbah!');
    }


    public function detail($id){
        $pengaduan = Pengaduan::where('id',$id)->first();
        if($pengaduan->status != 'ditolak'){
            Pengaduan::where('id',$id)->update([
                'status' => 'diproses'
            ]);
        }
        return view('admin_petugas.pengaduan-detail',[
            'pengaduan' => $pengaduan,
        ]);
    }
    public function destroy($id){
        Pengaduan::where('id',$id)->delete();
        // Transaksi::where('id_siswa',$siswa[1])->delete();
        
        return redirect('/registrasi')->with('sukses','Data Pengaduan berhasil diHapus!');
    }


    public function selesai($id){
        Pengaduan::where('id',$id)->update([
            'status' => 'selesai',
        ]);
        // Transaksi::where('id_siswa',$siswa[1])->delete();
        
        return redirect('/tanggapan')->with('sukses','pengaduan berhasil diSelesaikan!');
    }
    public function proses($id){
        $p = Pengaduan::where('id',$id)->first();
        dd($p->status);
        if($p->status != 'ditolak'){
            Pengaduan::where('id',$id)->update([
                'status' => 'diproses',
            ]);
        }
        // Transaksi::where('id_siswa',$siswa[1])->delete();
        
        return redirect('/pengaduan');
    }
    public function ditolak($id){
        Pengaduan::where('id',$id)->update([
            'status' => 'ditolak',
        ]);
        // Transaksi::where('id_siswa',$siswa[1])->delete();
        
        return redirect('/pengaduan');
    }
    public function reset($id){
        Pengaduan::where('id',$id)->update([
            'status' => 'menunggu',
        ]);
        // Transaksi::where('id_siswa',$siswa[1])->delete();
        
        return redirect('/pengaduan');
    }
    
}
