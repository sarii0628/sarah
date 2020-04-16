<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    //
    public $timestamps = false;

    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'code' => 'required|size: 7'
    );

    public function stocks()
    {
        return $this->hasMany('App\Stock');
    }
}
