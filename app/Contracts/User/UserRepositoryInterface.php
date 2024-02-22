<?php

namespace App\Contracts\User;

use App\Models\User;

interface UserRepositoryInterface
{
    public function store(array $validated): User;
}
