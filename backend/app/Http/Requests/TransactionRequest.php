<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'order_id' => 'required|exists:orders,id',
            'payment_id' => 'nullable|exists:payments,id',
            'provider' => 'required|string|max:255',
            'transaction_id' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|string|max:255',
            'response_code' => 'nullable|string|max:50',
            'message' => 'nullable|string|max:500',
        ];
    }
}
