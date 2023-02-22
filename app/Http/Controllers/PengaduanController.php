<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\User;

class PengaduanController extends Controller
{
    public function index(){
        $pengaduan = Pengaduan::latest()->filter(request(['search']))->paginate(8)->withQueryString();
        return view('admin_petugas.pengaduan',[
            'pengaduans' => $pengaduan,
        ]);
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'nik' => 'required|numeric|max:9999999999999999',
            'nama' => 'required|max:36',
            'username' => 'required|min:3|max:25|unique:users|unique:masyarakats',
            'password' => 'required|min:6|max:255',
            'ulangi_password' => 'required|min:6|max:255|same:password',
            'telp' => 'required|numeric',
        ],[
            'nik.require' => 'isi NIK terlebih dahulu',
            'nik.numeric' => 'NIK harus berupa angka!',
            'nik.max' => 'NIK tidak boleh lebih dari 16 nomor!',
            
            'nama.require' => 'isi nama terlebih dahulu',
            'nama.max' => 'Nama tidak boleh lebih dari 36 huruf!',
            
            'username.require' => 'isi nama terlebih dahulu',
            'username.min' => 'Username harus lebih dari 3 huruf!',
            'username.max' => 'Username tidak boleh lebih dari 25 huruf!',
            'username.unique' => 'Username sudah terdaftar!',
            
            'password.min' => 'Password harus lebih dari 6 karakter!',
            'ulangi_password.min' => 'Password harus lebih dari 6 karakter!',
            'ulangi_password.same' => 'Password tidak serasi!',

            'telp.numeric' => 'nomor telepon harus berupa angka!',
        ]);
        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        Masyarakat::create($validatedData);
        User::create([
            'nama_petugas' => $validatedData['nama'],
            'username' => $validatedData['username'],
            'password' => $validatedData['password'],
            'telp' => $validatedData['telp'],
            'level' => 'masyarakat'
        ]);

        // $request->session()->flash('success', 'Registration successfull! please Login');


        return redirect('/login')->with('sukses', 'Registration berhasil! silahkan Login');
    }
    public function admin(){
        $user = User::latest()->filter(request(['search']))->paginate(8)->withQueryString();
        return view('admin_petugas.register',[
            'users' => $user,
            'title' => 'Register',
            'active' => 'register'
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
        
        return redirect('/tanggapan');
    }
    public function proses($id){
        Pengaduan::where('id',$id)->update([
            'status' => 'proses',
        ]);
        // Transaksi::where('id_siswa',$siswa[1])->delete();
        
        return redirect('/pengaduan');
    }
    public function reset($id){
        Pengaduan::where('id',$id)->update([
            'status' => '0',
        ]);
        // Transaksi::where('id_siswa',$siswa[1])->delete();
        
        return redirect('/pengaduan');
    }
    
}
