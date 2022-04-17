<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer_Transaction extends Model
{
    use HasFactory;

    protected $table = 'customer_transactions';
    protected $fillable = ['customer_id', 'transaction_id'];
}
