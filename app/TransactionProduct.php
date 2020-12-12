<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionProduct extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function details(){
        return $this->hasmany(TransactionDetail::class, 'transaction_products_id', 'id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }
    
    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    
}
