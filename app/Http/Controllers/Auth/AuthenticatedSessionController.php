<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Laravel\Socialite\Socialite;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    function loginWithGithub(){

        // return github user -->
        // if not exist:  will be used to create new user then login
        // if exists ==? login with github

        return Socialite::driver('github')->redirect();
    }
     function callbackGithub () {
//            $user = Socialite::driver('github')->user();
//            dd($user);
//            return $user->getName();
//         return "I am the call back ";
         // if user not exists --> create user then login

         // if users exists --> login directly
         $githubUser = Socialite::driver('github')->user();
//         dd($githubUser->id);

         $user = User::updateOrCreate([
             'github_id' => $githubUser->id,
         ], [
             'name' => $githubUser->name,
             'email' => $githubUser->email,
             "password"=> $githubUser->token,
             'github_token' => $githubUser->token,
             'github_refresh_token' => $githubUser->refreshToken,
         ]);

         Auth::login($user);

         return redirect('/dashboard');

    }
}
