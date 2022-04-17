<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Clothes;
use Illuminate\Http\Request;

class ClothesController extends Controller
{
    public function store(Request $request)
    {
        $data = Clothes::create([
            'transaction_id' => $request->transaction_id,
            'type_clothes' => $request->type_clothes,
            'total' => $request->total,
            'note' => $request->note
        ]);
        if ($data) return response()->json(['success' => true, 'data' => $data], 200);
    }
}
