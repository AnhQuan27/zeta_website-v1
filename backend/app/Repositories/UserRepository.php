<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository
{
    /**
     * Lấy tất cả người dùng
     */
    public function getAll(): Collection
    {
        return User::all();
    }

    /**
     * Lấy thông tin người dùng theo ID
     */
    public function getById(int $id): ?User
    {
        return User::find($id);
    }

    /**
     * Tạo người dùng mới
     */
    public function create(array $data): User
    {
        return User::create($data);
    }

    /**
     * Cập nhật thông tin người dùng
     */
    public function update(int $id, array $data): bool
    {
        $user = $this->getById($id);
        if ($user) {
            return $user->update($data);
        }
        return false;
    }

    /**
     * Xóa người dùng
     */
    public function delete(int $id): bool
    {
        $user = $this->getById($id);
        if ($user) {
            return $user->delete();
        }
        return false;
    }
}
