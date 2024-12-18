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
        $order = $this->getById($id);
        if ($order) {
            return $order->update($data);
        }
        return false;
    }

    public function delete(int $id): bool
    {
        $order = $this->getById($id);
        if ($order) {
            return $order->delete();
        }
        return false;
    }

    public function restore($id): bool
    {
        $order = Product::onlyTrashed()->find($id);
        if ($order) {
            return $order->restore();
        }
        return false;
    }

    public function forceDelete($id): bool
    {
        $order = Product::withTrashed()->find($id);
        if ($order) {
            return $order->forceDelete();
        }
        return false;
    }
}
