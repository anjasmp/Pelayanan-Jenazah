<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function transaction(){
        return $this->belongsTo(TransactionProduct::class, 'transaction_products_id', 'id');
}
}
