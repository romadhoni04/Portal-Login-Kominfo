<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Anhskohbo\NoCaptcha\Facades\NoCaptcha;
use App\Models\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $credentials = $request->only('email', 'password');

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Check if the user's role matches
            if ($user->role === 'superadmin') {
                return redirect()->route('superadmin.dashboard');
            } elseif ($user->role === 'administrator') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        }

        // If authentication fails
        return redirect()->back()->withErrors([
            'email' => 'These credentials do not match our records.',
        ])->withInput($request->except('password'));
    }

    /**
     * Get the path the user should be redirected to after login.
     *
     * @return string
     */
    protected function redirectPath()
    {
        // This method is not needed anymore as we handle redirection in the login method directly
    }
}
