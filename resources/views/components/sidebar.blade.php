<style>
.img-container {margin-left: 40px; height: 30px; width: 160px; background-image: url({{asset('/storage/plumeria.png')}}); 
                background-size: 40px; 
                background-position: left center; background-blend-mode: lighten;
                background-color: rgba(255,255,255,0.3);}
.sidebar ul {list-style: none;}
.sidebar>ul>li {margin-top: 20px; padding: 10px 5px; color: black;
                 text-align: center; font-size: 18px;
                 background-image: url({{asset("/storage/stone.png")}}); background-size: 100% 60%; 
                 background-repeat: no-repeat; background-position: center bottom;
                 background-color: rgba(255,255,255,0.5); background-blend-mode: lighten;}
.sidebar ul ul>li  {border: none; margin-top: 10px; font-size: 13px;}
.sidebar a {text-decoration: none; font-weight: bold; color: #008BBB;}
.sidebar a:hover {color: #191970}
</style>

<div class="img-container">
</div>
<div class="sidebar">
    <ul>
        <li><a href="/home">HOME</a></li>
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
