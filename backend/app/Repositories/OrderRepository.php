<?php

namespace App\Repositories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;

class OrderRepository
{
    public function getAll(): Collection
    {
        return Order::all();
    }

    public function getById(int $id)
    {
        return Order::find($id);
    }

    public function create(array $data)
    {
        return Order::create($data);
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
        $order = $this->getById($id);
        if ($order) {
            return $order->restore();
        }
        return false;
    }

    public function forceDelete($id): bool
    {
        $order = $this->getById($id);
        if ($order) {
            return $order->forceDelete();
        }
        return false;
    }
}
