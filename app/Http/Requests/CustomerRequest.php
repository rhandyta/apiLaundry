<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CustomerRequest extends FormRequest
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
            "name" => 'required|min:3|max:30|string',
            "email" => 'required|email|string',
            "no_telp" => 'required|string',
            "address" => "required|string"
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
            'name.required' => "Nama wajib diisi!",
            'name.min' => "Nama minimal 3 huruf!",
            'name.max' => "Nama maximal 30 huruf!",
            'email.required' => "E-mail wajib diisi!",
            'email.email' => "Format bukan E-mail!",
            'no_telp.required' => "Nomor Telepon wajib diisi!",
            'address.required' => "Alamat wajib diisi!"
        ];
    }
}
