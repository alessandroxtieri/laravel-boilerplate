<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
     * Processes the user login attempt.
     *
     * @param  Request  $request  The HTTP request.
     * @return RedirectResponse The redirection response.
     */
    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $this->getEncryptedCredentials($request);
        $authenticated = $this->attemptLogin($credentials);

        if ($authenticated) {
            $url = $this->getRedirectUrl();

            $this->updateLastLogin(Auth::user());

            return redirect($url);
        }

        return redirect('login')->withErrors('Incorrect email or password.');
    }

    /**
     * Retrieves the user credentials encrypting the email.
     *
     * @param  Request  $request  The HTTP request.
     * @return array The encrypted credentials.
     */
    private function getEncryptedCredentials(Request $request): array
    {
        $credentials = $request->only('email', 'password');
        $credentials['email'] = Encrypter::encrypt($credentials['email']);

        return $credentials;
    }

    /**
     * Attempts user login.
     *
     * @param  array  $credentials  The user credentials.
     * @return bool True if login is successful, false otherwise.
     */
    private function attemptLogin(array $credentials): bool
    {
        return Auth::attempt($credentials);
    }

    /**
     * Gets the redirection URL based on user's role.
     *
     * @return string The redirection URL.
     */
    private function getRedirectUrl(): string
    {
        $role = Auth::user()->roles()->first()->name ?? '';

        switch ($role) {
            case 'admin':
                return '/admin/home';
            case 'customer':
                return '/customer/home';
            default:
                return '/home';
        }
    }

    /**
     * Updates the user's last login timestamp.
     *
     * @param  User  $user  The user to update last login for.
     */
    private function updateLastLogin(User $user): void
    {
        $user->last_login = Carbon::now();
        $user->save();
    }
}
