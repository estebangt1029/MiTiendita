<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    use App\Models\Debt;
use Illuminate\Support\Facades\Auth;
use App\Models\DebtPayment;

class DebtController extends Controller
{

public function index()
{
    $store = Auth::user()->stores->first();

    $debts = Debt::whereHas('customer', function ($q) use ($store) {
        $q->where('store_id', $store->id);
    })->with('customer')->get();

    return view('debts.index', compact('debts'));
}



public function pay(Request $request, Debt $debt)
{
    $request->validate([
        'amount' => 'required|numeric|min:1'
    ]);

    // Crear abono
    DebtPayment::create([
        'debt_id' => $debt->id,
        'amount' => $request->amount
    ]);

    // Calcular total pagado
    $paid = $debt->payments()->sum('amount');

    // Si ya pagó todo
    if ($paid >= $debt->total) {
        $debt->update([
            'paid' => true
        ]);
    }

    return back();
}
}
