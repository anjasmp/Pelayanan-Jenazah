<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'donation_packages_id', 'image',
    ];

    protected $hidden = [

    ];

    public function donation_package(){
        return $this->belongsTo(DonationPackage::class, 'donation_packages_id', 'id');
    }
}
