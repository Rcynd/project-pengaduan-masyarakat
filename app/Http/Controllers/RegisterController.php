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
            'nik' => 'required|max:255',
            'nama' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users|unique:masyarakats',
            'password' => 'required|min:6|max:255',
            'ulangi_password' => 'required|min:6|max:255|same:password',
            'telp' => 'required',
        ],[
            'nik.require' => 'isi NIK terlebih dahulu',
            'nama.require' => 'isi nama terlebih dahulu',
            'username.require' => 'isi nama terlebih dahulu',
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


        return redirect('/login')->with('success', 'Registration successfull! please Login');
    }
}
