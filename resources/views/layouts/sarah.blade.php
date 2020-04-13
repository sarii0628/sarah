<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
    <title>@yield('title')</title>
    <style>
        body {background-color: #FFFFF0; color: #444444;
              font-family: 'Righteous', 'Avenir','Helvetica Neue','Helvetica','Arial','Hiragino Sans','ヒラギノ角ゴシック',YuGothic,'Yu Gothic','メイリオ', Meiryo,'ＭＳ Ｐゴシック','MS PGothic';}
        header {background-image: linear-gradient(rgba(0, 0, 255, 0.5), #FFFFF0), url('hawaii-ocean.jpg');
                background-size: 100%;  height: 300px;}
        .container {display: flex;}
        .sidebar-wrapper {width: 200px; margin-right: 100px; margin-top: 50px;}
        .main-wrapper {flex: 1; height: 500px;}
        footer {clear: both; height: 230px;
                 background-image: linear-gradient(#FFFFF0, rgba(0, 255, 0, 0.5)), url('green.jpg'); background-size: auto; 
                 background-position: center center;
                 background-color: rgba(255,255,255,0.4); background-blend-mode: lighten;}
    </style>
    
</head>
<body>
    <header>
    @include('components.header')
    </header>
    <div class="container">
        <div class="sidebar-wrapper">
        @include('components.sidebar')
        </div>
        <div class="main-wrapper">
            <h1>@yield('title')</h1>
            <div class="content">
            @yield('content')
            </div>
        </div>
    </div>
    <footer>
    @include('components.footer')
    </footer>
</body>
</html>