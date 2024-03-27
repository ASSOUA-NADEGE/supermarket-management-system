<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            "name" => ['sometimes', 'string', 'min:10', 'max:45'],
            "description" => ['sometimes', 'string', 'min:20', 'max:100'],
            "price" => ['sometimes', 'integer'],
            'category_id' => ['sometimes', 'integer', 'exists:categories,id'],
            'sku' => ['sometimes', 'string']
        ];
    }
}
