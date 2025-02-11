<?php

namespace App\Services;

use App\Models\User;
use Carbon\Carbon;
use Exception;

class SampleService {

    public function getAUser() : User {
        $id = $this->getMaxId();
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

    private function getUserById(int $id) {
        return User::find($id);
    }

    private function getMaxId() {
        return User::max('id');
    }
}