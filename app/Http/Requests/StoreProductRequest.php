<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => ['required', 'string', 'min:10', 'max:45'],
            "description" => ['required', 'string', 'min:20', 'max:100'],
            "price" => ['required', 'integer'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'sku' => ['required', 'string']
        ];
    }
}
