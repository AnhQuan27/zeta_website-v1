<?php

namespace App\Services;

use App\Repositories\PaymentRepository;

class PaymentService 
{
    protected $paymentRepository;

    public function __construct(PaymentRepository $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }

    public function getAllPayments()
    {
        return $this->paymentRepository->getAll();
    }

    public function getPaymentById($id)
    {
        return $this->paymentRepository->getById($id);
    }

    public function createPayment(array $data)
    {
        return $this->paymentRepository->create($data);
    }

    public function updatePayment($id, array $data)
    {
        return $this->paymentRepository->update($id, $data);
    }

    public function deletePayment($id)
    {
        return $this->paymentRepository->delete($id);
    }

    public function restorePayment($id)
    {
        return $this->paymentRepository->restore($id);
    }

    public function forceDeletePayment($id)
    {
        return $this->paymentRepository->forceDelete($id);
    }
}