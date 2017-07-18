<?php


class UserService
{
    public static function isUserExist($user)
    {
        $tmpUser = User::where("email", $user["email"]);
        return empty($tmpUser) ? false : true;
    }
}