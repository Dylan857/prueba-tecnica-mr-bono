<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRepository
{

    public function index(): Collection
    {
        return DB::table('users as use')
        ->select('use.id', 'use.name', 'use.email', 'use.role')
        ->where('use.is_active', true)
        ->get();
    }

    public function search(int $id): object|null
    {
        return DB::table('users as use')
        ->select('use.id', 'use.name', 'use.email', 'use.role')
        ->where('use.id', $id)
        ->where('use.is_active', true)
        ->first();
    }

    public function store(array $data): void
    {
        $data['password'] = Hash::make($data['password']);
        User::create($data);
    }

    public function update(int $id, array $data): void
    {
        User::where('id', $id)->first()->update($data);
    }

}