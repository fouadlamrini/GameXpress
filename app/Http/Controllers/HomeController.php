<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories_count = categorie::count();
        $products_count = product::count();
        $users_count = User::count();
        return response()->json([
            'categories_count' => $categories_count,
            'products_count' => $products_count,
            'users_count' => $users_count,
        ]);
    }
}