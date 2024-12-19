<?php

namespace App\Repositories;

use App\Models\ProductSkuAttribute;
use Illuminate\Database\Eloquent\Collection;

class ProductSkuAttributeRepository
{
    public function getAll(bool $withTrashed = false): Collection
    {
        if ($withTrashed) {
            return ProductSkuAttribute::withTrashed()->get();
        }
        return ProductSkuAttribute::all();
    }

    public function getById(int $id)
    {
        return ProductSkuAttribute::withTrashed()->find($id);
    }

    public function create(array $data)
    {
        return ProductSkuAttribute::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $productSkuAttribute = $this->getById($id);
        if ($productSkuAttribute) {
            return $productSkuAttribute->update($data);
        }
        return false;
    }

    public function delete(int $id): bool
    {
        $productSkuAttribute = $this->getById($id);
        if ($productSkuAttribute) {
            return $productSkuAttribute->delete();
        }
        return false;
    }

    public function restore($id): bool
    {
        $productSkuAttribute = ProductSkuAttribute::onlyTrashed()->find($id);
        if ($productSkuAttribute) {
            return $productSkuAttribute->restore();
        }
        return false;
    }

    public function forceDelete($id): bool
    {
        $productSkuAttribute = ProductSkuAttribute::withTrashed()->find($id);
        if ($productSkuAttribute) {
            return $productSkuAttribute->forceDelete();
        }
        return false;
    }
}
