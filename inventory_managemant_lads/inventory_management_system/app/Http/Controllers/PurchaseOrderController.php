<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseOrder;

class PurchaseOrderController extends Controller
{
    public function index(){
        return PurchaseOrder::all();
    }

    public function store(Request $request){
        $validated = $request->validate([
            'supplier_id' => 'required',
            'po_code' => 'required|max:12',
            'tax_perc' => 'required|numeric',
            'tax'=>'required|numeric',
            'remarks'=>'max:150',
            'status' => 'required',
            'date_created' => 'required',
            'amount' => 'required|numeric',
            'date_updated' => 'required'
        ]);

        $purchaseOrder = PurchaseOrder:: create($validated);

        return response()->json($purchaseOrder, 201);
    }

    public function show(PurchaseOrder $purchaseOrder){
        return response()->json($purchaseOrder, 200);
    }

    public function update(Request $request){
        $validated = $request->validate([
            'supplier_id' => 'required',
            'po_code' => 'required|max:12',
            'tax_perc' => 'required|numeric',
            'tax'=>'required|numeric',
            'remarks'=>'max:150',
            'status'=> 'required',
            'date_created' => 'required',
            'amount' => 'required|numeric',
            'date_updated' => 'required'
        ]);

        $purchaseOrder->update($validated);

        return response()->json($purchaseOrder, 200);
    }

    public function destroy(PurchaseOrder $purchaseOrder){
        $purchaseOrder->delete();
        return response('Deleted', 200);
         
    }
}
