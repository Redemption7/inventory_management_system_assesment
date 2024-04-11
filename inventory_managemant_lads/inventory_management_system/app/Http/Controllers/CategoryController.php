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
        return response()->json(Category::all(), 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        $category = Category:: create($validateData);
        return response($category, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);

        if($category){
            return response()->json($category, 200);
        }else{
            return response()->json(['message' => 'Category not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'descriprion' => 'required',
        ]);

        if($category){
            $category->update($validateData);
            return response()->json($category, 200);
        }else{
            return response()->json(['message' => 'Category not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if($category){
            $category->delete();
            return response()->json(null, 204);
        }else{
            return response()->json(['message'=> 'Categiry not found'], 404);
        }
    }
}
