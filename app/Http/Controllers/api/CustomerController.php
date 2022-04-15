<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function store(CustomerRequest $request)
    {
        $data = Customers::updateOrCreate(['id' => $request->id], [
            'name' => $request->name,
            'slug' => \Str::slug($request->name),
            'email' => strtolower($request->email),
            'no_telp' => $request->no_telp,
            'address' => $request->address
        ]);
        return response()->json(['success' => true, 'code' => 201, 'data' => $data]);
    }

    public function destroy(Request $request)
    {
        $data = [];
        foreach ($request->all() as $customer) {
            array_push($data, $customer);
        }
        $result = Customers::destroy(collect($data));
        if ($result) return response()->json(['success' => true, 'code' => 200, "message" => 'Delete data successfully!']);
        return response()->json(['success' => false, 'code' => 204, "message" => 'No Content!']);
    }
}
