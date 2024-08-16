<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return $product;
    }


    {
        $product = Product::withTrashed()->find($id);
        $product -> restore;
        return $product();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            ["name"=>"required|string",
            "information"=> "nullable|string",
            "type"=> "required|string",

        ]);
        $Product = Product::create($request->all());
        return $Product;
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate(
            ["name"=>"required|string",
            "information"=> "nullable|string",
            "type"=> "required|string",]
        );

        $product->update($validated);
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            "message" => "Successfully Deleted"
        ]);
    }
}
