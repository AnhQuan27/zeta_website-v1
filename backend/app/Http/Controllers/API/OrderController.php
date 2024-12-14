<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Http\Requests\OrderRequest;
use App\Services\OrderService;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        $orders = $this->orderService->getAllOrders();

        return OrderResource::collection($orders)
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function show($id)
    {
        $order = $this->orderService->getOrderById($id);
        if (!$order) {
            return response()->json(['message' => 'Order not found'], Response::HTTP_NOT_FOUND);
        }
        return (new OrderResource($order))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function store(OrderRequest $request)
    {
        $order = $this->orderService->createOrder($request->validated());
        return response()->json(new OrderResource($order), Response::HTTP_CREATED);
    }

    public function update(OrderRequest $request, $id)
    {
        $updated = $this->orderService->updateOrder($id, $request->validated());
        if (!$updated) {
            return response()->json(['message' => 'Order not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json(['message' => 'Order updated successfully'], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $deleted = $this->orderService->deleteOrder($id);
        if (!$deleted) {
            return response()->json(['message' => 'Order not found or failed to delete'], Response::HTTP_NOT_FOUND);
        }
        return response()->noContent();
    }

    public function restore($id)
    {
        $restored = $this->orderService->restoreOrder($id);
        if (!$restored) {
            return response()->json(
                ['message' => 'Order not found in trash'],
                Response::HTTP_NOT_FOUND
            );
        }
    }

    public function forceDelete($id)
    {
        $deleted = $this->orderService->forceDeleteOrder($id);
        if (!$deleted) {
            return response()->json(
                ['message' => 'Order not found or failed to delete permanently'],
                Response::HTTP_NOT_FOUND
            );
        }
        return response()->noContent();
    }
}
