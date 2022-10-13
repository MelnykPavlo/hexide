<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditRequest;
use App\Models\Product;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy("created_at", "DESC")->paginate(10);
        return view("admin.products.products", ["products" => $products]);
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        if ($product) {
            if ($product->image != "/storage/default/default.png") {
                $str = str_replace("/storage", "public", $product->image);
                Storage::delete($str);
            }
            $product->delete();
            return redirect()->route("products");
        } else
            abort(404);
    }

    public function add(AddProductRequest $request)
    {
        if ($request->has("image")) {
            $name_image = Str::random(6) . ".jpg";
            Storage::put("public/products/" . $name_image, file_get_contents($request->image));
            $name_image = "/storage/products/" . $name_image;
        } else {
            $name_image = "/storage/default/default.png";
        }

        Product::create(
            [
                "name" => $request->name,
                "name_ua" => $request->name_ua,
                "price" => $request->price,
                "description" => $request->description,
                "description_ua" => $request->description_ua,
                "image" => $name_image,
            ]
        );

        return redirect()->route("products");
    }

    public function edit_form($id)
    {
        $product = Product::findOrFail($id);
        if ($product)
            return view("admin.products.edit", ["product" => $product]);
        else
            abort(404);
    }

    public function edit(EditRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($product) {
            if ($request->has("image")) {
                if ($product->image != "/storage/products/default.png") {
                    $str = str_replace("/storage", "public", $product->image);
                    Storage::delete($str);
                }
                $name_image = Str::random(6) . ".jpg";
                Storage::put("public/products/" . $name_image, file_get_contents($request->image));
                $name_image = "/storage/products/" . $name_image;
            } else {
                $name_image = $product->image;
            }

            $product->update(
                [
                    "name" => $request->name,
                    "price" => $request->price,
                    "description" => $request->description,
                    "image" => $name_image,
                ]
            );

            return redirect()->route("products");
        } else
            abort(404);

    }
}
