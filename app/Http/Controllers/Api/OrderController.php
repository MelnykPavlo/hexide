<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function add(OrderRequest $request)
    {
        if (Product::find($request->product_id)) {
            Order::create(
                [
                    "user_id" => Auth::id(),
                    "product_id" => $request->product_id,
                    "email" => $request->email,
                    "phone" => $request->phone,
                    "post_index" => $request->post_index,
                    "comment_to_order" => $request->comment_to_order,
                ]
            );
            return response()
                ->json(["status" => true])
                ->setStatusCode(201, "Successful create order");
        }else
            return response()
                ->json(["status" => false])
                ->setStatusCode(403, "Forbidden or order does not exist");

    }
}
