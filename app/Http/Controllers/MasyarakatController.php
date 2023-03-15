<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masyarakat;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MasyarakatController extends Controller
{
    public function index(){
        $masyarakat = Masyarakat::latest()->filter(request(['search']))->paginate(5)->withQueryString();
        return view('admin_petugas.masyarakat',[
            'masyarakats' => $masyarakat,
        ]);
    }

    public function validasi(Request $request,$nik){
        $validatedData = $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required',
            'password' => 'required',
            'telp' => 'required',
            'level' => 'required'
        ]);
        User::create($validatedData);
        Masyarakat::where('nik',$nik)->update(['isValidate' => 'Validated']);
        return redirect('/masyarakat')->with('sukses', 'User berhasil diValidasi! sekarang Akun sudah dapat digunakan');
    }


    public function create(){
        return view('admin_petugas.masyarakat-create');
    }
    public function push(Request $request){
        $validatedData = $request->validate([
            'nik' => 'required|numeric|max:9999999999999999|unique:masyarakats',
            'nama' => 'required|max:36',
            'username' => 'required|min:3|max:25|unique:users|unique:masyarakats',
            'password' => 'required|min:6|max:255',
            'ulangi_password' => 'required|min:6|max:255|same:password',
            'telp' => 'required|numeric',
        ],[
            'nik.require' => 'isi NIK terlebih dahulu',
            'nik.unique' => 'NIK sudah Terdaftar!',
            'nik.numeric' => 'NIK harus berupa angka!',
            'nik.max' => 'NIK tidak boleh lebih dari 16 nomor!',
            
            'nama.require' => 'isi nama terlebih dahulu',
            'nama.max' => 'Nama tidak boleh lebih dari 36 huruf!',
            
            'username.require' => 'isi nama terlebih dahulu',
            'username.min' => 'Username harus lebih dari 3 huruf!',
            'username.max' => 'Username tidak boleh lebih dari 25 huruf!',
            'username.unique' => 'Username sudah terdaftar!',
            
            'password.min' => 'Password harus lebih dari 6 karakter!',
            'password.required' => 'Password tidak boleh kosong!',
            'ulangi_password.min' => 'Password harus lebih dari 6 karakter!',
            'ulangi_password.same' => 'Password tidak serasi!',

            'telp.numeric' => 'nomor telepon harus berupa angka!',
        ]);
        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['isValidate'] = 'Validated';
        Masyarakat::create($validatedData);
        User::create([
            'nama_petugas' => $validatedData['nama'],
            'username' => $validatedData['username'],
            'password' => $validatedData['password'],
            'telp' => $validatedData['telp'],
            'level' => 'masyarakat'
        ]);

        // $request->session()->flash('success', 'Registration successfull! please Login');


        return redirect('/masyarakat')->with('sukses', 'Registration berhasil! Akun sudah dapat login');
    }
    
    public function destroy($username){
        Masyarakat::where('username',$username)->delete();
        User::where('username',$username)->delete();
        
        return redirect('/masyarakat')->with('sukses','Data Masyarakat berhasil diHapus!');
    }
}
