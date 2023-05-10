<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUserRequest extends FormRequest
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
        $id = $this->segment(3);

        $rules = [
            'name'      => 'required|min:3|max:60',
            'email'     => "required|email|min:3|max:60|unique:users,email,{$id},id",
            'password'  => 'required|min:3|max:15',
        ];

        if ($this->isMethod('PUT'))
            $rules['password'] = 'max:15';

        return $rules;
    }
}
