<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    public $timestamps = false;

    protected $guarded = array('id');

    public function stock()
    {
        return $this->belongsto('App\Stock');
    }
}
