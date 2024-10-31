<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return response()->json($transactions);
    }

    public function edit(Transaction $transaction)
    {
        return response()->json($transaction);
    }

    public function show(Transaction $transaction)
    {
        return response()->json($transaction);
    }

    public function updateStatus(Request $request, Transaction $transaction)
    {
        $request->validate([
            'status' => 'required|string|max:255',
        ]);
        $transaction->update(['status' => $request->status]);
        return response()->json($transaction);
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return response()->json($transaction);
    }
}
