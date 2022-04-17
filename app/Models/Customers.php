<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Customers extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = ['name', 'email', 'slug', 'no_telp', 'address'];

    /**
     * The Transaction that belong to the Customers
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Transactions(): BelongsToMany
    {
        return $this->belongsToMany(Transaction::class, 'customer_transactions', 'customer_id', 'transaction_id');
    }
}
