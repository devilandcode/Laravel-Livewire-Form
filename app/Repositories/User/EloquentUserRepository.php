<?php

namespace App\Repositories\User;

use App\Contracts\User\UserRepositoryInterface;
use App\Models\User;
use Carbon\Carbon;
use Symfony\Component\Yaml\Yaml;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function store(array $validated): User
    {
        return User::query()->create($validated);
    }
}
