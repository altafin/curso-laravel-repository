<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'          => 'required|min:3|max:100|unique:products',
            'url'           => 'required|min:3|max:100|unique:products',
            'price'         => 'required',
            'description'   => 'max:3000',
            'category_id'   => 'required|exists:categories,id'
        ];
    }
}
