<?php

namespace App\Services;

use App\Models\State;
use App\Models\User;

class CommonService implements ICommonService
{
    public function getUser(int $userId): User
    {
        return User::where("id", $userId)->with("distributionPoint")->with("transportCompany")->first();
    }
    public function getOrderStates(): array
    {
        $statesDb = State::get();
        $states = [];
        foreach ($statesDb as $stateDb)
            $states[] = ['id' => $stateDb->id, 'name' => $stateDb->name];
        return $states;
    }

}
