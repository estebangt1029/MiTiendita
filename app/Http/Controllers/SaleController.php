<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\Debt;

class SaleController extends Controller
{


public function create()
{
    $store = Auth::user()->stores->first();
    $products = $store->products;

    return view('sales.create', compact('products'));
}

public function store(Request $request)
{
    $store = Auth::user()->stores->first();

    $total = 0;

    foreach ($request->products as $productData) {
        $total += $productData['price'] * $productData['quantity'];
    }

    $sale = Sale::create([
        'store_id' => $store->id,
        'user_id' => Auth::id(),
        'total' => $total,
        'type' => $request->type,
    ]);

    if ($request->type === 'credit') {

    $customer = Customer::firstOrCreate([
        'name' => $request->customer_name,
        'store_id' => $store->id
    ]);

    Debt::create([
        'customer_id' => $customer->id,
        'sale_id' => $sale->id,
        'total' => $total
    ]);
}

    foreach ($request->products as $productData) {
        SaleItem::create([
            'sale_id' => $sale->id,
            'product_id' => $productData['id'],
            'quantity' => $productData['quantity'],
            'price' => $productData['price'],
            'subtotal' => $productData['price'] * $productData['quantity'],
        ]);
    }

    return redirect()->route('sales.create');
}
}
