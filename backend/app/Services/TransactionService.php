<?php

namespace App\Services;

use App\Repositories\TransactionRepository;

class TransactionService 
{
    protected $transactionRepository;

    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function getAllTransactions()
    {
        return $this->transactionRepository->getAll();
    }

    public function getTransactionById($id)
    {
        return $this->transactionRepository->getById($id);
    }

    public function createTransaction(array $data)
    {
        return $this->transactionRepository->create($data);
    }

    public function updateTransaction($id, array $data)
    {
        return $this->transactionRepository->update($id, $data);
    }

    public function deleteTransaction($id)
    {
        return $this->transactionRepository->delete($id);
    }

    public function restoreTransaction($id)
    {
        return $this->transactionRepository->restore($id);
    }

    public function forceDeleteTransaction($id)
    {
        return $this->transactionRepository->forceDelete($id);
    }
}