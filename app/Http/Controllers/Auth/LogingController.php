<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthenticateLoginRequest;
use App\Http\Requests\StoreRegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LogingController extends Controller
{
    public function Index(){
        return view('auth.login');
    }
    public function Authenticate(AuthenticateLoginRequest $request){


        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {
            $request->session()->regenerate();

            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }
}
