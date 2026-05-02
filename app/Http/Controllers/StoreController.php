<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{

public function index()
{
    $stores = Auth::user()->stores;
    return view('stores.index', compact('stores'));
}

public function create()
{
    return view('stores.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    Store::create([
        'name' => $request->name,
        'owner_id' => Auth::id(),
    ]);

    return redirect()->route('stores.index');
}
}
