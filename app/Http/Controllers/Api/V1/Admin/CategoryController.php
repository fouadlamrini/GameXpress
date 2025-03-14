<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\categorie;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(categorie::all(), Response::HTTP_OK);
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
        $request->validate([
            'name' => 'required|string|unique:categories|max:255',
            'slug' => 'required|string',
        ]);

        $category = categorie::create($request->all());

        return response()->json($category, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categorie=categorie::find($id);

        return response()->json($categorie, Response::HTTP_OK);
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
    public function update(Request $request, $id )
    {
        // dd($id) ;

        $categorie = categorie::find($id);

      
        $request->validate([
            'name' => 'sometimes|required|string|unique:categories|max:255',
            'slug' => 'sometimes|required|string',
        ]);

        $categorie->update($request->all());
        

        return response()->json($categorie, Response::HTTP_OK);
           
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = categorie::find($id);
        if (!$category) {
            return response()->json(['message' => 'category not found'], 404);
        }else{
            $category->delete();
            return response()->json(['message' => 'category deleted'],200);
        }

}
}
