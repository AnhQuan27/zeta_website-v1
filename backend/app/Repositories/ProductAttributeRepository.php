<?php

namespace App\Repositories;

use App\Models\ProductAttribute;
use Illuminate\Database\Eloquent\Collection;

class ProductAttributeRepository
{
    public function getAll(bool $withTrashed = false): Collection
    {
        if ($withTrashed) {
            return ProductAttribute::withTrashed()->get();
        }
        return ProductAttribute::all();
    }

    public function getById(int $id)
    {
        return ProductAttribute::withTrashed()->find($id);
    }

    public function create(array $data)
    {
        return ProductAttribute::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $productAttribute = $this->getById($id);
        if ($productAttribute) {
            return $productAttribute->update($data);
        }
        return false;
    }

    public function delete(int $id): bool
    {
        $productAttribute = $this->getById($id);
        if ($productAttribute) {
            return $productAttribute->delete();
        }
        return false;
    }

    public function restore($id): bool
    {
        $productAttribute = ProductAttribute::onlyTrashed()->find($id);
        if ($productAttribute) {
            return $productAttribute->restore();
        }
        return false;
    }

    public function forceDelete($id): bool
    {
        $productAttribute = ProductAttribute::withTrashed()->find($id);
        if ($productAttribute) {
            return $productAttribute->forceDelete();
        }
        return false;
    }
}
