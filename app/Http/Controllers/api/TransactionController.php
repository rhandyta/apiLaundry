<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;
use App\Models\Customer_Transaction;
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
            'total_price' => (int)$request->berat * 11000,
            'berat' => $request->berat,
            'status' => (int)$request->status,
        ]);

        if ($data) {
            $customer = Customer_Transaction::create([
                'customer_id' => $request->customer_id,
                'transaction_id' => $data->id,
            ]);
            $data->customer_id = $customer->customer_id;
            $data->transaction_id = $customer->transaction_id;
            return response()->json(['success' => true, 'code' => 201, 'data' => $data], 200);
        }
    }
}
