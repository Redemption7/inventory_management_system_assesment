<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Supplier::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255', 
            'contact_person' => 'required', 
            'email' => 'required|email', 
            'phone' =>'required', 
            'address' => 'required',
        ]);

        $supplier = Supplier:: create($validateData);

        return response()->json($supplier, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supplier = Supplier::find($id);
        if($supplier){
            return response()->json($supplier, 200);
        }else{
            return response()->json(['message'=>'Supplier not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255', 
            'contact_person' => 'required', 
            'email' => 'required|email', 
            'phone' =>'required', 
            'address' => 'required',
        ]);

        if($supplier){
            $supplier->update($validateData);
            return response()->json($supplier, 200);
        }else{
            return response()->json(['message'=>'Supplier not found'], 404);
        }
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if($supplier){
            $supplier->delete();
            return response()->json(null, 204);
        }else{
            return response()->json(['message'=>'Supplier not found'], 404);
        }
    }
}
