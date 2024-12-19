<?php

namespace App\Repositories;

use App\Models\ProductSku;
use Illuminate\Database\Eloquent\Collection;

class ProductSkuRepository
{
    public function getAll(bool $withTrashed = false): Collection
    {
        if ($withTrashed) {
            return ProductSku::withTrashed()->get();
        }
        return ProductSku::all();
    }

    public function getById(int $id)
    {
        return ProductSku::withTrashed()->find($id);
    }

    public function create(array $data)
    {
        return ProductSku::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $productSku = $this->getById($id);
        if ($productSku) {
            return $productSku->update($data);
        }
        return false;
    }

    public function delete(int $id): bool
    {
        $productSku = $this->getById($id);
        if ($productSku) {
            return $productSku->delete();
        }
        return false;
    }

    public function restore($id): bool
    {
        $productSku = ProductSku::onlyTrashed()->find($id);
        if ($productSku) {
            return $productSku->restore();
        }
        return false;
    }

    public function forceDelete($id): bool
    {
        $productSku = ProductSku::withTrashed()->find($id);
        if ($productSku) {
            return $productSku->forceDelete();
        }
        return false;
    }
}
