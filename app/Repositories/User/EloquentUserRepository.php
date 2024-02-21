<?php

namespace App\Repositories\User;

use App\Contracts\User\UserRepositoryInterface;
use App\Models\User;
use Carbon\Carbon;
use Symfony\Component\Yaml\Yaml;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function store(string $name, string $lastName, string $dob): User
    {
        return $user = User::query()->create([
            'name' =>  $name,
            'last_name' => $lastName,
            'dob' => $dob
        ]);
    }
}
