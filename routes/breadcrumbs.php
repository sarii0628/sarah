<?php

//カテゴリー一覧
Breadcrumbs::for('categories', function ($trail) {
    $trail->push('カテゴリー一覧', url('products'));
});

// カテゴリー一覧 >> [各カテゴリ名] 
Breadcrumbs::for('products', function ($trail, $category) {
    $trail->parent('categories');
    $trail->push($category->name, url('/products/category/'. $category->id));
});

// カテゴリー一覧 >> [各カテゴリ名] >> [商品名]
Breadcrumbs::for('product', function ($trail, $category, $product) {
    $trail->parent('products', $category);
    $trail->push($product->name, url('/products/category/'. $category->id . '/' . $product->id));
});
