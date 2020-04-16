<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //
    public $timestamps = false;

    protected $guarded = array('id');

    public static $rules =  array(
        'product_id' => 'required',
        'quantity' => 'integer|required',
        'color_id' => 'required',
        'photo' => 'required|image'
    );

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
