<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public $timestamps = false;

    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'price' => 'required|integer',
        'material' => 'required',
        'is_handmade' => 'required',
        'is_imported' => 'required',
        'category_id' => 'required' 
    );

    public function stocks()
    {
        return $this->hasMany('App\Stock');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function getData()
    {
        return 'ID: ' . $this->id . ', 商品名: ' . $this->name . 
                ', カテゴリー: ' . $this->category->name . ', 素材： ' . $this->material . 
                ', サイズ(cm): ' . $this->size_cm . ', ハンドメイド？: ' . $this->is_handmade . 
                ', 輸入品？: ' . $this->is_imported;
    }
}
