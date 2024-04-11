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
        return \response()->json(Transaction::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'type' => 'required', 
            'product_id' => 'required', 
            'quantity' => 'required', 
            'notes' => 'required'
        ]);

        $transaction = Transaction::create($validateData);
        return \response()->json($transaction, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaction = Transaction::find($id);
        if($transaction){
            return response()->json($transaction, 200);
        }else{
            return \response()->json(['message'=>'Transaction not found'], 404);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'type' => 'required', 
            'product_id' => 'required', 
            'quantity' => 'required', 
            'notes' => 'required'
        ]);

        if($transaction){
            $transaction->update($validateData);
            return \response()->json(['message'=>'Transaction not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
