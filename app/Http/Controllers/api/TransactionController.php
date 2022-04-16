<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;
use App\Models\Price;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class TransactionController extends Controller
{
    public function store(TransactionRequest $request)
    {
        $data = Transaction::create([
            'order_number' => (string)Uuid::uuid4(),
            'customer_id' => (int)$request->customer_id,
            'total_price' => (int)$request->berat * 11000,
            'berat' => $request->berat,
            'status' => (int)$request->status,
        ]);
        if ($data) return response()->json(['success' => true, 'code' => 201, 'data' => $data], 200);
    }
}
