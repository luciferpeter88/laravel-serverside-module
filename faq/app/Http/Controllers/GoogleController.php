<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'google_id' => $googleUser->getId(),
                'role' => 'user',
                'profilePicturePath' => $googleUser->getAvatar(),
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
            ]
        );

        Auth::login($user);

        return redirect('/dashboard/posts');
    }
}
