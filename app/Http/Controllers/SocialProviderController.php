<?php

namespace App\Http\Controllers;

use App\Events\DefineLoginEvent;
use App\Models\User;
use App\Services\Interfaces\Social;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialProviderController extends Controller
{
    public function vkRedirect()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function vkCallback()
    {
        try {
            $socialUser = Socialite::driver('vkontakte')->user();
        }
        catch (\Exception $e)
        {
            return redirect(route('login'));
        }

        $user = User::query()->where('email', '=', $socialUser->getEmail())->first();
        if(!$user){
            $user = User::create([
                'email' => $socialUser->getEmail(),
                'name' => $socialUser->getName(),
                'avatar' => $socialUser->getAvatar(),
                'password' => Hash::make('secret'),
            ]);
        }
        $user->avatar = $socialUser->getAvatar();
        $user->save();
        Auth::login($user, true);
        event(new DefineLoginEvent($user));

        return redirect(route('home'));
    }

    public function ghRedirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function ghCallback(Social $social)
    {
        try {
            $socialUser = Socialite::driver('github')->user();
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
