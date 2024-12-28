<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionResource;
use App\Http\Requests\TransactionRequest;
use App\Services\TransactionService;
use Symfony\Component\HttpFoundation\Response;

class TransactionController extends Controller
{
    protected $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function index()
    {
        $transactions = $this->transactionService->getAllTransactions();

        return TransactionResource::collection($transactions)
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function show($id)
    {
        $transaction = $this->transactionService->getTransactionById($id);
        if (!$transaction) {
            return response()->json(
                ['message' => 'Transaction not found'],
                Response::HTTP_NOT_FOUND
            );
        }
        return (new TransactionResource($transaction))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function store(TransactionRequest $request)
    {
        $transaction = $this->transactionService->createTransaction($request->validated());
        return response()->json(
            new TransactionResource($transaction),
            Response::HTTP_CREATED
        );
    }

    public function update(TransactionRequest $request, $id)
    {
        $updated = $this->transactionService->updateTransaction($id, $request->validated());
        if (!$updated) {
            return response()->json(
                ['message' => 'Transaction not found'],
                Response::HTTP_NOT_FOUND
            );
        }
        return response()->json(
            ['message' => 'Transaction updated successfully'],
            Response::HTTP_OK
        );
    }

    public function destroy($id)
    {
        $deleted = $this->transactionService->deleteTransaction($id);
        if (!$deleted) {
            return response()->json(
                ['message' => 'Transaction not found or failed to delete'],
                Response::HTTP_NOT_FOUND
            );
        }
        return response()->noContent();
    }

    public function restore($id)
    {
        $restored = $this->transactionService->restoreTransaction($id);
        if (!$restored) {
            return response()->json(
                ['message' => 'Transaction not found in trash'],
                Response::HTTP_NOT_FOUND
            );
        }
    }

    public function forceDelete($id)
    {
        $deleted = $this->transactionService->forceDeleteTransaction($id);
        if (!$deleted) {
            return response()->json(
                ['message' => 'Transaction not found or failed to delete permanently'],
                Response::HTTP_NOT_FOUND
            );
        }
        return response()->noContent();
    }
}
