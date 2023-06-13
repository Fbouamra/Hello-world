<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginform(){
        return view('loginform');
    }
    public function logincheck(AuthRequest $request){
        $credentials = $request->validated();
       if (Auth::attempt($credentials)){
           $request->session()->regenerate();

            return redirect()->intended(route('admin.property.index'));
        }
       return back()->withErrors([
           'email'=>'Authentification non valide'
       ])->withInput();
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

}
