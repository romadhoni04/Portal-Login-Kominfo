<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
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
        $credentials = $request->only('email', 'password');
        Log::info('Login attempt:', $credentials);

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            Log::info('Login successful for:', ['email' => $user->email]);

            $redirectPath = $this->redirectPath();
            Log::info('Redirecting to:', ['redirect_path' => $redirectPath]);

            return redirect()->intended($redirectPath);
        }

        return redirect()->back()->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }

    /**
     * Get the path the user should be redirected to after login.
     *
     * @return string
     */
    protected function redirectPath()
    {
        $user = Auth::user();

        if ($user->role === 'superadmin') {
            return route('superadmin.dashboard');
        } elseif ($user->role === 'admin') {
            return route('admin.dashboard');
        } else {
            return route('user.dashboard');
        }
    }
}
