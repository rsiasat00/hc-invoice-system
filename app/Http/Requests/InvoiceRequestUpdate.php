<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required', 'min:3'
            ],
            'address' => [
                'required', 'min: 6'
            ],
            'invoice_date' => [
                'required', 'date'
            ],
            'invoice_number' => [
                'required', 'numeric', 'unique:invoices,invoice_number,' . $this->invoice->id
            ],
            'due_date' => [
                'required', 'date', 'after_or_equal:invoice_date'
            ],
            'note' => [
                'required', 'min:6'
            ],
        ];
    }
}
