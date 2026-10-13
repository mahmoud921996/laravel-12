<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            "name" => "bail|required|string",
            "email" => "bail|required|string|email|unique:users",
            "password" => "bail|required|min:6|confirmed",

            //
        ];
    }
}
