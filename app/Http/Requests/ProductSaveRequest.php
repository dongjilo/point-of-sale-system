<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductSaveRequest extends FormRequest
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
            'product_name' => 'required|unique:products',
            'product_code' => 'required|unique:products',
            'product_price' =>'required',
            'category_id' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'product_name.unique' => 'Product Name has been Taken',
            'product_code.unique' => 'Product Code has been Taken',
            'product_price.required' => 'Product Name is required!',
            'category_id.required' => 'Product Name is required!'
        ];
    }
}
