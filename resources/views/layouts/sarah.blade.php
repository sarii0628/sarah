<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
    <title>@yield('title')</title>
    <style>
        body {background-color: #FFFFF0; color: #444444;
              font-family: 'Righteous', 'Avenir','Helvetica Neue','Helvetica','Arial','Hiragino Sans','ヒラギノ角ゴシック',YuGothic,'Yu Gothic','メイリオ', Meiryo,'ＭＳ Ｐゴシック','MS PGothic';}
        header {background-image: linear-gradient(rgba(135, 206, 235, 0.1), #FFFFF0), url('hawaii-ocean.jpg');
                background-size: 100%;  height: 300px;}
        .container {display: flex;}
        .sidebar-wrapper {width: 200px; margin-right: 100px; margin-top: 50px;}
        .main-wrapper {flex: 1;}
        footer {clear: both; height: 230px;
                 background-image: linear-gradient(#FFFFF0, rgba(0, 255, 0, 0.5)), url('green.jpg'); background-size: auto; 
                 background-position: center center;
                 background-color: rgba(255,255,255,0.4); background-blend-mode: lighten;}

        th {background-color:#999; color:fff; padding:5px 10px;}
        td {border: solid 1px #aaa; color:#999; padding:5px 10px;}
        
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