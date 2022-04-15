<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "required|string|min:3",
            "email" => "required|email|unique:users,email|string|max:50",
            "password" => "required|min:3"
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'data' => $validator->errors()
        ]));
    }

    public function messages()
    {
        return [
            'name.required' => "Nama tidak boleh kosong!",
            'name.min' => "Nama terlalu pendek!",
            'email.requred' => "E-mail tidak boleh kosong!",
            'email.email' => "Bukan format E-Email!",
            'email.unique' => "E-mail sudah ada!",
            'email.max' => "Panjang tidak boleh dari 50 huruf!",
            'password.required' => "Password Harus diisi!",
            'password.min' => "Password minimal 3 huruf!",
        ];
    }
}
