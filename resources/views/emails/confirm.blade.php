<!DOCTYPE html>
<html lang="ja">
<style>
#confirm {margin-bottom: 70px;}
.table {margin-bottom: 50px; width: 60%;}
.table-bordered {border: 1px solid grey;}
th {text-align: center; border: 1px solid grey;}
td {text-align: center; border: 1px solid grey;}
</style>
<body>
    
</body>
</html>

<div id="confirm">
<h2>{{$name}} さま</h2>
<p>Sarahの商品を注文いただきありがとうございます。</p> 
<div class="container-md">
    <div class="row">
        <div class="col-md-8">
        @if(isset($items))
            <table class="table table-bordered">
                <tr><th>商品名</th><th>値段</th><th>個数</th><th>小計</th>
                @foreach($items as $item)
                <tr><td>{{$item->name}}</td><td>{{$item->price}}円</td><td>{{$item->quantity}}個</td><td>{{$item->price * $item->quantity}}円</td></tr>
                @endforeach
            </table>
        @endif
        </div>
    </div>
</div>
<p>ご注文商品の合計金額は <span class="look">{{$total}}</span> 円です。</p>
<p><span class="look">銀行振込</span>にてお支払いお願いいたします。</p> 
<br> 
<div class="container-md mb-5" id="cart-content">
    <div class="row">
        <div class="col-md-8">
            <table class="table table-bordered">
                <tr><th>　銀行名　</th><th>　店番号　</th><th>　口座番号　</th></tr>
                <tr><td>　○○銀行　</td><td>　XXX　</td><td>　XXXXXXXX　</td></tr>
            </table>
        </div>
    </div>
</div>
</div>
<br>

Sarah