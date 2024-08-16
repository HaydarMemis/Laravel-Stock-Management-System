<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaction = Transaction::all();
        return $transaction;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            ["pieces"=>"required|numeric",
            "warehouse_id"=> "required|exists:warehouses,id",
            "product_id"=> "required|exists:products,id",
            "user_id"=> "required|exist:users,id",
            "receipt_place"=> "required|json",
            "issue_place"=> "required,json",
            "report"=> "nullable|string",
            "barcode_id"=> "required|exist:barcodes,id",
        ]);
        $transaction = Transaction::create($validated);
        return $transaction;
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        return $transaction;
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $validated = $request->validate(
            ["pieces"=>"required|numeric",
            "warehouse_id"=> "required|exists:warehouses,id",
            "product_id"=> "required|exists:products,id",
            "user_id"=> "required|exist:users,id",
            "receipt_place"=> "required|json",
            "issue_place"=> "required,json",
            "report"=> "nullable|string",
            "barcode_id"=> "required|exist:barcodes,id",
        ]);
        $transaction->update($validated);
        return $transaction;
    }

    public function restore($id)
    {
        $transaction = Transaction::withTrashed()->find($id);
        $transaction -> restore;
        return $transaction();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return response()->json([
            "message" => "Successfully Deleted"
        ]);
    }
}
