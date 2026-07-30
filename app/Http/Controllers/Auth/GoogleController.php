<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**
     * Redirect ke halaman login Google
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Callback dari Google
     */
    public function callback()
    {
        try {

            $googleUser = Socialite::driver('google')->user();

            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {

                $user = User::create([
                    'name'       => $googleUser->getName(),
                    'email'      => $googleUser->getEmail(),
                    'google_id'  => $googleUser->getId(),
                    'avatar'     => $googleUser->getAvatar(),
                    'password'   => bcrypt(Str::random(16)),
                ]);

            } else {

                $user->google_id = $googleUser->getId();
                $user->avatar = $googleUser->getAvatar();
                $user->save();

            }

            Auth::login($user);

            return redirect()->route('home')
                    ->with('success', 'Login Google berhasil.');

        } catch (\Exception $e) {

            return redirect()->route('login')
                    ->with('error', 'Login Google gagal.');
        }
    }
}