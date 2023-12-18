<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventorySaveRequest extends FormRequest
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
            'product_id' => 'required',
            'inventory_quantity' => 'required',
            'inventory_expiry' =>'required',
            'supplier_id' =>'required',
            'user_id' =>'required',
        ];
    }

    public function messages()
    {
        return[
            'supplier_id.required' => 'Please Select a Supplier.',
            'product_id.required' => 'Please Select a Product.',
        ];
    }
}
