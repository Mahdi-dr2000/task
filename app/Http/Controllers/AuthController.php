<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Login;
use Exception;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function loginpage()
    {
        return view('login');
    }
    public function login(login $request)
    {



        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('dashboard');
        } else {
            $errorlogin = "email or password not coorect";
            return back()->with('errorlogin', $errorlogin);
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return view('login');
    }
}
