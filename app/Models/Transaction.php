<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $primaryKey = 'id';
    protected $fillable = ['order_number', 'total_price', 'berat', 'status'];

    public function Clothes()
    {
        return $this->hasOne(Clothes::class);
    }

    /**
     * The roles that belong to the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Customers(): BelongsToMany
    {
        return $this->belongsToMany(Customers::class, 'customer_transactions', 'transaction_id', 'customer_id');
    }
}
