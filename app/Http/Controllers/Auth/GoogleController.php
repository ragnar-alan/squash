<?php
/**
 * Created by PhpStorm.
 * User: Tamas_Boros
 * Date: 7/17/2017
 * Time: 15:58
 */

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{

    public function redirectToProvider()
    {
        return Socialite::driver("google")->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver("google")->stateless()->user();
        dd($user);
    }
}