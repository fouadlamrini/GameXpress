<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\product_image;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = product::all();
        return response()->json(['products' => $products], Response::HTTP_OK);
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
            'image'=>'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $product = Product::create($fields);

        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('Images', 'public');
            $product_image = new product_image([
                'product_id'=> $product->id,
                'image_url' => Storage::url($imagePath),
                'is_primary' => true,
            ]);
            $product_image->save();
        };

        return response()->json(['product' => $product], Response::HTTP_CREATED);
    }


    public function show($id)
    {
        $product = product::find($id);
        return response()->json(['product' => $product], Response::HTTP_OK);
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

        return response()->json(['product' => $product], Response::HTTP_OK);
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
