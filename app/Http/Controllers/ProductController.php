<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{


public function index()
{
    $store = Auth::user()->stores->first();
    $products = $store->products;

    return view('products.index', compact('products'));
}

public function create()
{
    return view('products.create');
}

public function store(Request $request)
{
    $store = Auth::user()->stores->first();

    Product::create([
        'store_id' => $store->id,
        'name' => $request->name,
        'price' => $request->price,
        'stock' => $request->stock,
    ]);

    return redirect()->route('products.index');
}
}
