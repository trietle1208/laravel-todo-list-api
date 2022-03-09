<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductsCollection;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return ProductsCollection::collection($products);
    }

    public function addProduct(Request $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);
        if($product){
            return response()->json(['success' => true]);
        }
    }
    public function deleteProduct(Request $request, $id)
    {
        $product = Product::find($id);
        if($product){
            $product->delete();
            return response()->json(['success' => true]);
        }
    }
    public function getProduct(Request $request, $id){
        $product = Product::find($id);
        return response()->json($product);
    }
    public function updateProduct(Request $request, $id)
    {
        $product = Product::find($id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);
        if($product){
            return response()->json(['success' => true]);
        }
    }
}
