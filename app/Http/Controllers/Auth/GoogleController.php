<?php
/**
 * Created by PhpStorm.
 * User: Tamas_Boros
 * Date: 7/17/2017
 * Time: 15:58
 */

namespace App\Http\Controllers;

use App\User;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Services\UserService;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;


class GoogleController extends Controller
{
    private $userService;

    /**
     * GoogleController constructor.
     * @param UserService $userService
     */
    public function __construct()
    {
        $this->userService = new UserService();
    }


    public function redirectToProvider()
    {
        return Socialite::driver("google")->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver("google")->stateless()->user();
        $existingUser = $this->userService->isUserExist($user);
        if (!$existingUser) {
            return view('auth.register')->with("user" , $user);
        }

        $loginUser = $this->userService->getUser($user->email);
        Auth::loginUsingId($loginUser->id);
        return redirect()->route("home");
    }
}