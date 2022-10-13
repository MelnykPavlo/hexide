<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => ["required"],
            "name_ua" => ["required"],
            "price" => ["required", "numeric"],
            "description" => ["required"],
            "description_ua" => ["required"],
            "image" => ["image"]
        ];
    }
}
