<?php

namespace App\Repositories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Collection;

class PaymentRepository
{
    public function getAll(bool $withTrashed = false): Collection
    {
        if ($withTrashed) {
            return Payment::withTrashed()->get();
        }
        return Payment::all();
    }

    public function getById(int $id)
    {
        return Payment::withTrashed()->find($id);
    }

    public function create(array $data)
    {
        return Payment::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $payment = $this->getById($id);
        if ($payment) {
            return $payment->update($data);
        }
        return false;
    }

    public function delete(int $id): bool
    {
        $payment = $this->getById($id);
        if ($payment) {
            return $payment->delete();
        }
        return false;
    }

    public function restore($id): bool
    {
        $payment = Payment::onlyTrashed()->find($id);
        if ($payment) {
            return $payment->restore();
        }
        return false;
    }

    public function forceDelete($id): bool
    {
        $payment = Payment::withTrashed()->find($id);
        if ($payment) {
            return $payment->forceDelete();
        }
        return false;
    }
}
