<?php

namespace App\Repositories;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Collection;

class OrderItemRepository
{
    public function getAll(bool $withTrashed = false): Collection
    {
        if ($withTrashed) {
            return OrderItem::withTrashed()->get();
        }
        return OrderItem::all();
    }

    public function getById(int $id)
    {
        return OrderItem::withTrashed()->find($id);
    }

    public function create(array $data)
    {
        return OrderItem::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $orderItem = $this->getById($id);
        if ($orderItem) {
            return $orderItem->update($data);
        }
        return false;
    }

    public function delete(int $id): bool
    {
        $orderItem = $this->getById($id);
        if ($orderItem) {
            return $orderItem->delete();
        }
        return false;
    }

    public function restore($id): bool
    {
        $orderItem = OrderItem::onlyTrashed()->find($id);
        if ($orderItem) {
            return $orderItem->restore();
        }
        return false;
    }

    public function forceDelete($id): bool
    {
        $orderItem = OrderItem::withTrashed()->find($id);
        if ($orderItem) {
            return $orderItem->forceDelete();
        }
        return false;
    }
}
