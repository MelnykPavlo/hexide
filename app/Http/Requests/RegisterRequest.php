<?php

namespace App\Http\Requests;

class RegisterRequest extends ApiRequest
{

    public function rules()
    {
        return [
            "name" => ["required"],
            "email" => ["required", "email", "unique:users"],
            "password" => ["required", "min:8"]
        ];
    }
}
