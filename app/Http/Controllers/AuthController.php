<?php

namespace App\Http\Controllers;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginShow()
    {
        return view("auth.login");
    }
    public function registrShow()
    {
        return view("auth.register");
    }

    public function login(Request $request)
    {
        
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            
            return redirect()
                ->route('home')
                ->with('success', 'Вы вошли в личный кабинет');
        }

        
        return redirect()
            ->route('login')
            ->withErrors('Неверный логин или пароль');
    }

    public function registr(RegistrationRequest $request)
    {
        $user = new User;
        $password = Hash::make($request->password);
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = $password;
        $user->save();
        return redirect()->route('login');
    }

    public function logout() {
        Auth::logout();

        return redirect()
            ->route('login')
            ->with('success', 'Вы вышли из личного кабинета');
    }
}
