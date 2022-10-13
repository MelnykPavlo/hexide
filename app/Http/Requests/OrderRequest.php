<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends ApiRequest
{

    public function rules()
    {
        return [
            "product_id" => ['required', "integer"],
            "email" => ['required', 'email'],
            "phone" => ['required'],
            "post_index" => ["required", "integer"],
        ];
    }
}
