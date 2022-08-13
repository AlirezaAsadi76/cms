<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegistrationRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function Create(){
        return view('auth.Register');
    }
    public function Store(StoreRegistrationRequest $request){


        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        auth()->login($user);
        //event(new Registered($user));
        return redirect()->route('dashboard');

    }
    public function test(){
        return view('auth.logout');
    }
}
