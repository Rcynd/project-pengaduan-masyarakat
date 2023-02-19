<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('login.register',[
            'title' => 'Register',
            'active' => 'register'
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
}
