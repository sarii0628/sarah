<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public $timestamps = false;
    
    protected $guarded = array('id');

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function getData()
    {
        return $this->id . ': ' . $this->name;
    }
}
