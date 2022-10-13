<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return response()
            ->json(["status" => true, "products" => $products])
            ->setStatusCode(200, "Products list");
    }

    public function get_product()
    {
        if (isset($_GET["id"])) {
            $product = Product::findOrFail($_GET["id"]);
            if ($product)
                return response()
                    ->json(["status" => true, "product" => $product])
                    ->setStatusCode(200, "Product {$product}");
            else
                return response()
                    ->json(["status" => false])
                    ->setStatusCode(403, "Forbidden or product does not exist");
        } else
            return response()
                ->json(["status" => false])
                ->setStatusCode(403, "Forbidden or product does not exist");
    }
}
