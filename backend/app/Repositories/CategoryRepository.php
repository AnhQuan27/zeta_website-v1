<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository
{
    public function getAll(bool $withTrashed = false): Collection
    {
        if ($withTrashed) {
            return Category::withTrashed()->get();
        }
        return Category::all();
    }

    public function getById(int $id)
    {
        return Category::withTrashed()->find($id);
    }

    public function create(array $data)
    {
        return Category::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $category = $this->getById($id);
        if ($category) {
            return $category->update($data);
        }
        return false;
    }

    public function delete(int $id): bool
    {
        $category = $this->getById($id);
        if ($category) {
            return $category->delete();
        }
        return false;
    }

    public function restore($id): bool
    {
        $category = Category::onlyTrashed()->find($id);
        if ($category) {
            return $category->restore();
        }
        return false;
    }

    public function forceDelete($id): bool
    {
        $category = Category::withTrashed()->find($id);
        if ($category) {
            return $category->forceDelete();
        }
        return false;
    }
}
