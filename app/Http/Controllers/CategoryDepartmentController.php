<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryDepartmentController extends Controller
{
    public function store(Request $request)
{
    $validated = $request->validate(
        ["name" => "required|string",
    ]);
    $category = Category::create($request->all());
    return $category;

}

public function destroy(Category $category)
{
    $category->delete();
    return response()->json(["Successfully Deleted"=> ""],200);
}
}

