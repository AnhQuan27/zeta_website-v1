<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository
{
    public function getAll(bool $withTrashed = false): Collection
    {
        if ($withTrashed) {
            return Product::withTrashed()->get();
        }
        return Product::all();
    }

    public function getById(int $id)
    {
        return Product::withTrashed()->find($id);
    }

    public function create(array $data)
    {
        return Product::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $product = $this->getById($id);
        if ($product) {
            return $product->update($data);
        }
        return false;
    }

    public function delete(int $id): bool
    {
        $product = $this->getById($id);
        if ($product) {
            return $product->delete();
        }
        return false;
    }

    public function restore($id): bool
    {
        $product = Product::onlyTrashed()->find($id);
        if ($product) {
            return $product->restore();
        }
        return false;
    }

    public function forceDelete($id): bool
    {
        $product = Product::withTrashed()->find($id);
        if ($product) {
            return $product->forceDelete();
        }
        return false;
    }
}
