<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>EC SITE</title>
</head>
<body>
    <header></header>
    <h1>EC SITE</h1>
    <p>SARAHのオンラインショップです。</p>
    <div>
        @if ($items)
            <p>商品があります。</p>
        @else
            <p>商品がありません。</p>
        @endif
    </div>
    <p>whileで商品一覧表示</p>
    <ul>
        <?php $i = 0; ?>
        @while ($i < count($items))
            <li>{{$items[$i]}}</li>
            <?php $i++; ?>
        @endwhile

    </ul>
    <p>foreachで商品一覧表示</p>
    <ul>
        @foreach ($items as $item)
        <li>{{$item}}</li>
        @endforeach
    </ul>

    <p>today's luck is...</p>
    <?php $randNum = random_int(1,3); ?>
    @switch ($randNum)
        @case(1)
            <p>okay~</p>
            @break

        @case(2)
            <p>good enough</p>
            @break

        @case(3)
            <p>super!</p>
            @break

        @default
            <p>donno</p>
            
    @endswitch

    <footer></footer>
</body>
</html>