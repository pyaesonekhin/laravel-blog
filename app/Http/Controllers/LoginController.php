<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {

        // $request->validate([
        //     'email' => 'required',
        //     'password' => 'required'
        // ]);

        
        $user = User::where('email', $request->email)->first();
        
        if(! $user) {
            return redirect('login');
        }

        $credentials = [
            'email' => $user->email,
            'password' => $request->password,
        ];

        if(! Auth::attempt($credentials)) {
            return redirect('login');
        }

        return redirect('posts');
    }

    public function destroy()
    {
        Auth::logout();
        

        return redirect('login');
    }
}