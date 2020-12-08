<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenyaluranLazhaq extends Model
{
    protected $guarded = [];

    public function penerimaan_lazhaq(){
        return $this->belongsTo(PenerimaanLazhaq::class, 'penerimaan_lazhaqs_id', 'id');
    }
}
