<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository
{
    public function getAll(): Collection
    {
        return User::all();
    }

    public function getById(int $id): ?User
    {
        return User::find($id);
    }

    public function create(array $data): User
    {
        return User::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $user = $this->getById($id);
        if ($user) {
            return $user->update($data);
        }
        return false;
    }

    public function delete(int $id): bool
    {
        $user = $this->getById($id);
        if ($user) {
            return $user->delete();
        }
        return false;
    }

    public function restore($id)
    {
        $user = User::onlyTrashed()->find($id);
        if (!$user) {
            return false;
        }
        return $user->restore();
    }

    public function forceDelete($id)
    {
        $user = User::withTrashed()->find($id);
        if (!$user) {
            return false;
        }
        return $user->forceDelete();
    }
}
