<?php

namespace App\Services;

use App\Repositories\OrderItemRepository;

class OrderItemService 
{
    protected $orderItemRepository;

    public function __construct(OrderItemRepository $orderItemRepository)
    {
        $this->orderItemRepository = $orderItemRepository;
    }

    public function getAllOrderItems()
    {
        return $this->orderItemRepository->getAll();
    }

    public function getOrderItemById($id)
    {
        return $this->orderItemRepository->getById($id);
    }

    public function createOrderItem(array $data)
    {
        return $this->orderItemRepository->create($data);
    }

    public function updateOrderItem($id, array $data)
    {
        return $this->orderItemRepository->update($id, $data);
    }

    public function deleteOrderItem($id)
    {
        return $this->orderItemRepository->delete($id);
    }

    public function restoreOrderItem($id)
    {
        return $this->orderItemRepository->restore($id);
    }

    public function forceDeleteOrderItem($id)
    {
        return $this->orderItemRepository->forceDelete($id);
    }
}