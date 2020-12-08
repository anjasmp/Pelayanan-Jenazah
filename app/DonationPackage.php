<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DonationPackage extends Model
{
    use SoftDeletes;

    protected $guarded = [];


    public function galleries(){
        return $this->hasMany(Gallery::class, 'donation_packages_id', 'id');
    }
}
