<?php

namespace App\Repositories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Collection;

class TransactionRepository
{
    public function getAll(bool $withTrashed = false): Collection
    {
        if ($withTrashed) {
            return Transaction::withTrashed()->get();
        }
        return Transaction::all();
    }

    public function getById(int $id)
    {
        return Transaction::withTrashed()->find($id);
    }

    public function create(array $data)
    {
        return Transaction::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $transaction = $this->getById($id);
        if ($transaction) {
            return $transaction->update($data);
        }
        return false;
    }

    public function delete(int $id): bool
    {
        $transaction = $this->getById($id);
        if ($transaction) {
            return $transaction->delete();
        }
        return false;
    }

    public function restore($id): bool
    {
        $transaction = Transaction::onlyTrashed()->find($id);
        if ($transaction) {
            return $transaction->restore();
        }
        return false;
    }

    public function forceDelete($id): bool
    {
        $transaction = Transaction::withTrashed()->find($id);
        if ($transaction) {
            return $transaction->forceDelete();
        }
        return false;
    }
}
