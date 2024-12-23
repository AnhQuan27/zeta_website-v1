<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentResource;
use App\Http\Requests\PaymentRequest;
use App\Services\PaymentService;
use Symfony\Component\HttpFoundation\Response;

class PaymentController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function index()
    {
        $payments = $this->paymentService->getAllPayments();

        return PaymentResource::collection($payments)
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function show($id)
    {
        $payment = $this->paymentService->getPaymentById($id);
        if (!$payment) {
            return response()->json(
                ['message' => 'Payment not found'],
                Response::HTTP_NOT_FOUND
            );
        }
        return (new PaymentResource($payment))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function store(PaymentRequest $request)
    {
        $payment = $this->paymentService->createPayment($request->validated());
        return response()->json(
            new PaymentResource($payment),
            Response::HTTP_CREATED
        );
    }

    public function update(PaymentRequest $request, $id)
    {
        $updated = $this->paymentService->updatePayment($id, $request->validated());
        if (!$updated) {
            return response()->json(
                ['message' => 'Payment not found'],
                Response::HTTP_NOT_FOUND
            );
        }
        return response()->json(
            ['message' => 'Payment updated successfully'],
            Response::HTTP_OK
        );
    }

    public function destroy($id)
    {
        $deleted = $this->paymentService->deletePayment($id);
        if (!$deleted) {
            return response()->json(
                ['message' => 'Payment not found or failed to delete'],
                Response::HTTP_NOT_FOUND
            );
        }
        return response()->noContent();
    }

    public function restore($id)
    {
        $restored = $this->paymentService->restorePayment($id);
        if (!$restored) {
            return response()->json(
                ['message' => 'Payment not found in trash'],
                Response::HTTP_NOT_FOUND
            );
        }
    }

    public function forceDelete($id)
    {
        $deleted = $this->paymentService->forceDeletePayment($id);
        if (!$deleted) {
            return response()->json(
                ['message' => 'Payment not found or failed to delete permanently'],
                Response::HTTP_NOT_FOUND
            );
        }
        return response()->noContent();
    }
}
