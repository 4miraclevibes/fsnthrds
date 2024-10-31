<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('user_id',Auth::user()->id)->get();
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $transactions
        ], 200);
    }

    public function store(Request $request)
    {
        $transaction = Transaction::create($request->all());
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $transaction
        ], 200);
    }
}
