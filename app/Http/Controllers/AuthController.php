<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{
    // Index Tampilan Login
    public function indexLogin(){
        return view('login');
    }

    // Proses Pengecekan Login
    public function checkLogin(Request $request){
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        // dd(Auth::attempt($credentials));
        // dd($credentials);
        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 'user') {
                // return redirect('/dashboard');
                return redirect('menu');
            }
            else {
                return redirect('/login')->withErrors(['Email atau password salah!','email atau password salah!']);
            }
        } 
        else {
            return redirect('/login')->withErrors(['Email atau password salah!','email atau password salah!']);
        }
        // return redirect('dashboard');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login')->with('alert-logout','Berhasil Logout!');
    }
}
