<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $guarded = [];
    
    public function user_detail(){
        return $this->hasMany(UserDetails::class, 'transactions_id', 'id');
    }

    public function user_families(){
        return $this->hasMany(UserFamilies::class, 'transactions_id', 'id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }
    
    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    
    

}
