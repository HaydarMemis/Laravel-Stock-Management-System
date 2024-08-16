<?php

namespace App\Http\Controllers;

use App\Models\Barcode;
use Illuminate\Http\Request;

class BarcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barcode = Barcode::all();
        return $barcode;
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            ["barcode" => "required|string|max:15",
            "product_id" => "equired|string",
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Barcode $barcode)
    {
        return $barcode;
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barcode $barcode)
    {
        $validated = $request->validate([
            "barcode"=> "required|string|max:15",
            "product_id"=> "equired|string",
        ]);
        $barcode->update($validated);
        return $barcode;
    }


    public function restore($id)
    {
        $barcode = Barcode::withTrashed()->find($id);
        $barcode -> restore;
        return $barcode();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barcode $barcode)
    {
        $barcode->delete();
        return response()->json(["Successfully Deleted"=> ""],200);
    }
}
