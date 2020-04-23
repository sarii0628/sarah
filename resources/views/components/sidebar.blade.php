<div class="img-container">
</div>
<div class="sidebar">
    <ul>
        <li><a href="/top">HOME</a></li>
        <li><a href="/shop-info">ショップ情報</a></li>
        <li><a href="/products">ONLINE SHOP</a></li>
            <ul>
                @foreach ($categories as $category)
                <li><a href="/products/category/{{$category->id}}">＊ {{$category->name}}</a></li>
                @endforeach 
            </ul>
        <li><a href="/contact">お問い合わせ</a></li>
    </ul>
</div>
