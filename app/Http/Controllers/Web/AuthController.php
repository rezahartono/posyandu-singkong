<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        if ($request->method() == "POST") {
            try {
                $validator = Validator::make($request->all(), [
                    'email' => 'required|email|max:255',
                    'password' => 'required|max:255',
                ]);

                //if validation fails
                if ($validator->fails()) {
                    Alert::error('Error Occured!', 'Silahkan Cek kembali permintaan anda');
                    return back();
                }

                if (Auth::attempt($request->only('email', 'password'))) {
                    $request->session()->regenerate();

                    session(['user' => Auth::user()]);

                    return redirect()->intended('/');
                } else {
                    Alert::error('Error Occured!', 'can\'t find user');
                    return back();
                }
            } catch (\Throwable $th) {
                Alert::error('Error Occured!', $th);
                return back();
            }
        } else {
            return view('authentication.login');
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/');
        } catch (\Throwable $th) {
            Alert::error('Error Occured!', $th);
            return back();
        }
    }
}
