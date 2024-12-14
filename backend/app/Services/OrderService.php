<?php

namespace App\Services;

use App\Repositories\OrderRepository;

class OrderService 
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getAllOrders()
    {
        return $this->orderRepository->getAll();
    }

    public function getOrderById($id)
    {
        return $this->orderRepository->getById($id);
    }

    public function createOrder(array $data)
    {
        return $this->orderRepository->create($data);
    }

    public function updateOrder($id, array $data)
    {
        return $this->orderRepository->update($id, $data);
    }

    public function deleteOrder($id)
    {
        return $this->orderRepository->delete($id);
    }

    public function restoreOrder($id)
    {
        return $this->orderRepository->restore($id);
    }

    public function forceDeleteOrder($id)
    {
        return $this->orderRepository->forceDelete($id);
    }
}