<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
  use App\Models\Sale;
use App\Models\Debt;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
  

public function index()
{
    $store = Auth::user()->stores->first();

    $todaySales = Sale::where('store_id', $store->id)
        ->whereDate('created_at', now())
        ->sum('total');

    $pendingDebts = Debt::whereHas('customer', function ($q) use ($store) {
        $q->where('store_id', $store->id);
    })
    ->where('paid', false)
    ->sum('total');

    return view('dashboard', compact('todaySales', 'pendingDebts'));
}
}
