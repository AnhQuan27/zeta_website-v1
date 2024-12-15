<?php

namespace App\Repositories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;

class RoleRepository
{
    public function getAll(bool $withTrashed = false): Collection
    {
        if ($withTrashed) {
            return Role::withTrashed()->get();
        }
        return Role::all();
    }

    public function getById(int $id)
    {
        return Role::withTrashed()->find($id);
    }

    public function create(array $data)
    {
        return Role::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $role = $this->getById($id);
        if ($role) {
            return $role->update($data);
        }
        return false;
    }

    public function delete(int $id): bool
    {
        $role = $this->getById($id);
        if ($role) {
            return $role->delete();
        }
        return false;
    }

    public function restore($id): bool
    {
        $role = Role::onlyTrashed()->find($id);
        if ($role) {
            return $role->restore();
        }
        return false;
    }

    public function forceDelete($id): bool
    {
        $role = Role::withTrashed()->find($id);
        if ($role) {
            return $role->forceDelete();
        }
        return false;
    }
}
