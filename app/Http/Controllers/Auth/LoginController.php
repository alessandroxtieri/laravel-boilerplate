<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use ESolution\DBEncryption\Encrypter;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

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
     * Handle the user login request.
     */
    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $credentials['email'] = Encrypter::encrypt($credentials['email']);

        if (Auth::attempt($credentials)) {
            $url = '/home';

            /** @phpstan-ignore-next-line */
            switch (Auth::user()->roles()->first()->name) {
                case 'admin':
                    $url = '/admin/home';
                    break;
                case 'customer':
                    $url = '/customer/home';
                    break;
            }

            /** @phpstan-ignore-next-line */
            Auth::user()->last_login = Carbon::now();
            Auth::user()->save();

            return redirect($url);
        }

        return redirect('login')->withErrors('Email o password errati.');
    }
}
