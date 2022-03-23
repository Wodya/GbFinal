<?php

namespace App\Services;

use App\Models\User;

class CommonService implements ICommonService
{
    public function getUser(int $userId): User
    {
        return User::where("id", $userId)->with("distributionPoint")->with("transportCompany")->first();
    }
}
