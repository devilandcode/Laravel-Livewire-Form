<?php

namespace App\Contracts\User;

use App\Models\User;

interface UserRepositoryInterface
{
    public function store(string $name, string $lastName, string $dob): User;
}
