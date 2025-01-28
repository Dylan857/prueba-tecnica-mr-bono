<?php

namespace App\Services;

use App\Repository\UserRepository;
use Illuminate\Support\Collection;

class UserService
{

    public function __construct(
        private readonly UserRepository $repository
    ) {}

    public function index(): Collection
    {
        return $this->repository->index();
    }

    public function search(int $id)
    {
        return $this->repository->search($id);
    }

    public function store(array $data): void
    {
        $this->repository->store($data);
    }

    public function update(int $id, array $data): void
    {
        $this->repository->update($id, $data);      
    }

}