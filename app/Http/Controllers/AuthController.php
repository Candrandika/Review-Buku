<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Validator};
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request) {
        $messages = [
            'email.required' => 'Email perlu diisi',
            'email.unique' => 'Email sudah terdaftar',
            'email.email' =>'Email haruslah berformat email',
            'email.min' => 'Email minimal terdiri dari 5 karakter',
            'email.max' => 'Email maksimal terdiri dari 255 karakter',
            'name.min' => 'Nama minimal terdiri dari 3 karakter',
            'name.max' => 'Nama maksimal terdiri dari 255 karakter',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal terdiri dari 8 karakter',
            'password.max' => 'Password maksimal terdiri dari 255 karakter',
            'confirm_password.required' => 'Konfirmasi password harus diisi',
            'confirm_password.same' => 'Password dan konfirmasi password tidak sesuai'
        ];
        $validator = Validator::make($request->all(), [
            'email' => 'bail|required|unique:users|email|min:5|max:255',
            'name' => 'bail|required|min:3|max:255',
            'password' => 'bail|required|min:8|max:255',
            'confirm_password' => 'bail|required|same:password'
        ], $messages);

        if($validator->fails()){
            return response()->json([
                $validator->errors()
            ]);
        }

        User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'name' => $request->name
        ]);

        Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        return response()->json([
            'pendaftaran berhasil'
        ]);
    }
    public function login(Request $request) {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return response()->json([
                'login berhasil!!'
            ]);
        }else{
            return response()->json([
                'login gagal!!'
            ]);
        }

    }
    public function logout() {
        if(Auth::check()){
            Auth::logout();

            return response()->json([
                'logout berhasil'
            ]);
        }else{
            return response()->json([
                'anda belum login'
            ]);
        }
    }
    public function check_auth() {
        if(Auth::check()){
            return response()->json([
                'email' => Auth::user()->email,
                'name' => Auth::user()->name,
                'auth' => Auth::check()
            ]);
        }else{
            return response()->json([
                'auth' => Auth::check()
            ]);
        }
    }
}
