<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(product::all(), Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'status' => 'required|string',
            'category_id'=>'numeric',
        ]);
        // $fields['status'] = "lahcen";

        $product = Product::create($fields);

        return response()->json($product, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        return response()->json($product, Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'price' => 'sometimes|required|numeric',
        ]);

        $product->update($request->all());

        return response()->json($product, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {   
        $product = product::find($id);

        if(!$product){return response()->json(['message' => 'product not found'], 404);}
        else{ $product->delete();
            return response()->json(['message' => 'product deleted'],200);}}
        
}
