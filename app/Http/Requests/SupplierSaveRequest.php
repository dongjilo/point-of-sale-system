<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierSaveRequest extends FormRequest
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
            'supplier_name' => 'required|unique:suppliers',
            'supplier_phone' => 'required|number',
            'supplier_email' =>'required|unique:suppliers',
        ];
    }

    public function messages()
    {
        return[
            'supplier_name.unique' => 'Supplier Name has been Taken.',
            'supplier_email.unique' => 'Inputted Email has been Taken.',
        ];
    }
}
