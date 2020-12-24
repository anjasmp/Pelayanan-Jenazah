<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDetails extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $hidden = [

    ];

    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function transactions()
    {
        return $this->belongsTo(Transaction::class, 'transactions_id', 'id');
    }
}
