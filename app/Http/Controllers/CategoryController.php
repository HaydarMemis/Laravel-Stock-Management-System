<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $categories = Category::all();
     return $categories;
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            ["name" => "required|string",
        ]);
        $category = Category::create($request->all());
        return $category;

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return $category;
    }


    public function restore($id)
    {
        $category = Category::withTrashed()->find($id);
        $category -> restore;
        return $category();

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            "name"=> "required|string",
        ]);
        $category->update($validated);
        return $category;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(["Successfully Deleted"=> ""],200);
    }
}
