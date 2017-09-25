<?php
namespace  App\Http\Services;

use App\Http\Models\Users;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function isUserExist($user)
    {
        $tmpUser = Users::where("email", $user->email)->first();
        return empty($tmpUser) ? false : true;
    }

    public function getUser($email)
    {
        return Users::where("email", $email)->first();
    }

    public static function getUsers() {
        return Users::active()->get();
    }

    public function getParticipants($users)
    {
        $ids = $this->getUserIds($users);
        return Users::whereIn("id", $ids)->get();
    }

    private function getUserIds($userIds) {
        $ids = [];
        foreach ($userIds as $id) {
            $ids[]= $id->uid;
        }
        return $ids;
    }
}