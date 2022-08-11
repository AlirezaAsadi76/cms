<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegistrationRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function Create(){

    }
    public function Store(StoreRegistrationRequest $request){
//        $user=User::create([
//            'name'=>$request->name,
//            'email'=>$request->email,
//            'password'=>$request->password,
//        ]);
//        event(new Registered($user));
    }
}
