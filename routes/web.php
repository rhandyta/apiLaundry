<?php

use App\Models\Customer_Transaction;
use App\Models\Customers;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Ramsey\Uuid\Uuid;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('test', function (Request $request) {
    // $query = DB::table('customers')
    //     ->join('customer_transactions', 'customer_id', '=', 'customers.id')
    //     ->join('transactions', 'transactions.id', '=', 'customer_transactions.transaction_id')
    //     ->where('customer_id', '=', 5)
    //     ->get();

    // $eloquent = Customers::find(7)->transactions()->get();
    // return response()->json([
    //     'query' => $query,
    //     'eloquent' => $eloquent
    // ]);
    $data = $request->session()->get('key');
    return $data;
});
