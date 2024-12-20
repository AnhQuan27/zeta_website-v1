<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderItemResource;
use App\Http\Requests\OrderItemRequest;
use App\Services\OrderItemService;
use Symfony\Component\HttpFoundation\Response;

class OrderItemController extends Controller
{
    protected $orderItemService;

    public function __construct(OrderItemService $orderItemService)
    {
        $this->orderItemService = $orderItemService;
    }

    public function index()
    {
        $orderItems = $this->orderItemService->getAllOrderItems();

        return OrderItemResource::collection($orderItems)
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function show($id)
    {
        $orderItem = $this->orderItemService->getOrderItemById($id);
        if (!$orderItem) {
            return response()->json(
                ['message' => 'OrderItem not found'],
                Response::HTTP_NOT_FOUND
            );
        }
        return (new OrderItemResource($orderItem))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function store(OrderItemRequest $request)
    {
        $orderItem = $this->orderItemService->createOrderItem($request->validated());
        return response()->json(
            new OrderItemResource($orderItem),
            Response::HTTP_CREATED
        );
    }

    public function update(OrderItemRequest $request, $id)
    {
        $updated = $this->orderItemService->updateOrderItem($id, $request->validated());
        if (!$updated) {
            return response()->json(
                ['message' => 'OrderItem not found'],
                Response::HTTP_NOT_FOUND
            );
        }
        return response()->json(
            ['message' => 'OrderItem updated successfully'],
            Response::HTTP_OK
        );
    }

    public function destroy($id)
    {
        $deleted = $this->orderItemService->deleteOrderItem($id);
        if (!$deleted) {
            return response()->json(
                ['message' => 'OrderItem not found or failed to delete'],
                Response::HTTP_NOT_FOUND
            );
        }
        return response()->noContent();
    }

    public function restore($id)
    {
        $restored = $this->orderItemService->restoreOrderItem($id);
        if (!$restored) {
            return response()->json(
                ['message' => 'OrderItem not found in trash'],
                Response::HTTP_NOT_FOUND
            );
        }
    }

    public function forceDelete($id)
    {
        $deleted = $this->orderItemService->forceDeleteOrderItem($id);
        if (!$deleted) {
            return response()->json(
                ['message' => 'OrderItem not found or failed to delete permanently'],
                Response::HTTP_NOT_FOUND
            );
        }
        return response()->noContent();
    }
}
