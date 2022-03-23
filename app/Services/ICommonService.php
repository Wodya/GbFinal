<?php

namespace App\Services;

use App\Models\User;

interface ICommonService
{
    public function getUser(int $userId) : User;

}
