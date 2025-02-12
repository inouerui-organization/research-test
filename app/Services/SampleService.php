<?php

namespace App\Services;

use App\Models\User;
use Carbon\Carbon;
use Exception;

class SampleService {

    public function getAUser(int $id) : User {
        $user = $this->getUserById($id);

        if ($user == null) {
            throw new Exception("User Not found");
        }
        return $user;
    }

    public function getDate(string $dateString) : string {
        $formattedDate = Carbon::parse($dateString)->format("Y年m月");
        return $formattedDate;
    }

    private function getUserById(int $id) : User {
        return User::find($id);
    }
}