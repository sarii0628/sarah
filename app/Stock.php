<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //
    public $timestamps = false;

    protected $guarded = array('id');

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function color()
    {
        return $this->belongsTo('App\Color');
    }

    public function getData()
    {
        return 'ID： ' . $this->id . '　｜　商品： ' . $this->product->name 
            . '　｜　色： ' . $this->color->name . '　｜　個数： ' . $this->quantity;
    }


}
