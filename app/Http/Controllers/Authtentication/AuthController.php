<?php

namespace App\Http\Controllers\Authtentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('Authentication.login');
    }

    // process login yang ini manual dan sudah tidak di pakai di karenakan sudah menggunakan login bawaan dari laravel ui
    public function login(Request $request)
    {
        // sistem login manual tidak menggunakan fitur bawaan laravel
        // pencocokan data email yang ada di kolom database dengan inputan email di login
        // $data = User::where('email', $request->email)->first();
        // // dd($data);
        // // langkah 1 pengecekan jika $data->email ada maka lanjut langkah 2
        // if ($data) {
        //     // langkah 2 akan mencocokan password dengan yang ada di dalam inputan ($request->password), dengan yang ada di dalam database ($data->password)
        //     if (Hash::check($request->password, $data->password)) {
        //         // langkah 3 jika email dan password sudah sesuai maka akan di arahkan ke dashboard
        //         session(['berhasil_login' => true]);
        //         return redirect('/dashboard');
        //     } else {
        //         // jika tidak password tidak sesuai dengan di database maka akan di lemparkan kembali ke halaman login
        //         return redirect('/')->with('wrong_pasword', 'Password anda salah lah');
        //     }
        // } else {
        //     // jika email tidak ada dalam database maka lempar ke halaman login dan tampilkan message di bawah ini
        //     return redirect('/')->with('email_wrong', 'Email anda tidak terdaftar');
        // }

        // menggunakan fitur dari laravel itu sendiri
        // if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        //     return redirect('/dashboard');
        // }
        // return redirect('/')->with('wrong_pasword', 'Email atau Password anda salah lah');
    }

    public function logout(Request $request)
    {
        // $request->session()->flush();
        // Auth::logout();
        // return redirect('/')->with('logout_message', 'Anda telah logout');
    }
}
