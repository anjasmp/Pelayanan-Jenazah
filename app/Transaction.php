<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $guarded = [
    ];


    public function donation_package(){
        return $this->belongsTo(DonationPackage::class, 'donation_packages_id', 'id');
    }

    public function userable()
    {
        return $this->morphTo();
    }
}
