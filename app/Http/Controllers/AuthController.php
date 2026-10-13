<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //

    public function showSignUp(Request $request)
    {
        return view("auth.register");
    }
    public function showLogin(Request $request)
    {
        return view("auth.login");
    }
    public function signup(SignupRequest $request)
    {
        $user = new User();
        $user->name = $request->input("name");
        $user->email = $request->input("email");
        $user->password = $request->input("password");
        $user->save();
        auth()->login($user);
        return redirect("/");
    }
    public function login(LoginRequest $request)
    {

        $credentials = $request->only("email", "password");
        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect("/");
        }
        return back()->withErrors([
            "email" => "The provided credentials are not correct",
        ])->withInput();

    }
    public function logout(Request $request)
    {
        auth()->logout();
        return redirect("/");
    }
}
