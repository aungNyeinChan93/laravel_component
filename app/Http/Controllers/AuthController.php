<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Summary of login
     * @return \Illuminate\Contracts\View\View
     */
    public function login(){
        return view('auth.login');
    }

    /**
     * Summary of loginProcess
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginProcess(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->route('home')->with('success', 'Login successful!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->except('password'));
    }

    /**
     * Summary of register
     * @return \Illuminate\Contracts\View\View
     */
    public function register(){
        return view('auth.register');
    }

    /**
     * Summary of registerProcess
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registerProcess(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);

        auth()->login($user);

        return redirect()->route('home')->with('success', 'Register successful!');
    }

    /**
     * Summary of logout
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(){
        auth()->logout();
        return redirect()->route('home')->with('success', 'Logout successful!');
    }
}
