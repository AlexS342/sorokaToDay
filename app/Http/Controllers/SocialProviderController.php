<?php

namespace App\Http\Controllers;

use App\Events\DefineLoginEvent;
use App\Services\Interfaces\Social;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialProviderController extends Controller
{
    public function redirect($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function callback(String $driver, Social $social)
    {
        try {
            $socialUser = Socialite::driver($driver)->user();
        }
        catch (\Exception $e)
        {
            return redirect(route('login'));
        }

        $user = $social->findOrCreateUser($socialUser);

        Auth::login($user, true);
        event(new DefineLoginEvent($user));

        return redirect(route('home'));
    }
}
