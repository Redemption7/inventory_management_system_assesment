<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductContoller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PurchaseOrderController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')-> group(function(){
    Route::apiResource('purchaseOrders', PurchaseOrderController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('suppliers', SupplierController::class);
    Route::apiResource('transactions', TransactionController::class);
});
Route::post('/sanctum/token', function(Request $request){
    $request->validate([
        'email'=>'required|email',
        'password'=>'required'
    ]);
    $user = User::where('email', $request->email)->first();
    if(!$user || !Hash::check($request->password, $user->password)){
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect']
        ]); 
    }
 
    return $user->createToken($request->device_name)->plainTextToken;
});

