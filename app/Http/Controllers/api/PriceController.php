<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PriceController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'harga_per_kilo' => 'required'
        ], ['harga_per_kilo.required' => 'Field harga wajib diisi!']);
        if ($validator->fails()) return response()->json(['success' => false, 'message' => $validator->errors()], 409);
        $data = Price::create([
            'harga_per_kilo' => $request->harga_per_kilo,
        ]);
        if ($data) return response()->json(['success' => true, 'code' => 201, 'data' => $data]);
    }

    public function destroy(Request $request)
    {
        $data = [];
        foreach ($request->all() as $prices) {
            array_push($data, $prices);
        }
        Price::destroy(collect($data));
    }
}
