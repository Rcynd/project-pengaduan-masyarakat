<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index(){
        return view('login.login',[
            'title' => 'login',
            'active' => 'login',
        ]);
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Username atau password salah!')->with('loginEmpty','atau Username belum terdaftar');

    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password_lama' => 'required|current_password',
            'password_baru' => 'required|min:6|confirmed',
        ],[
            'password_lama.current_password' => 'Password lama Salah!',
            'password_baru.min' => 'Password harus lebih dari 6 karakter!',
            'password_baru.confirmed' => 'Password baru tidak serasi dengan password lama!',
        ]);
        User::find(Auth()->user()->id)->update([
            'password' => bcrypt($request->password_baru),
        ]);
        $request->session()->regenerate();
        return back()->with('change', 'Password berhasil diUbah!');
    }
}
