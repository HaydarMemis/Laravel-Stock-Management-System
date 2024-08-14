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
            ["barcode" => "required",
            "product_id" => "required",
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
            "barcode"=> "requrired", "product_id"=> "required",
        ]);
        $barcode->update($validated);
        return $barcode;
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
