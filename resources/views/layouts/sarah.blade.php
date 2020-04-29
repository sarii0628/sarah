<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">

    <link href="{{asset('js/slick-theme.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('js/slick.css')}}" rel="stylesheet" type="text/css">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
    
    <link rel="stylesheet" href="{{asset('/common/style.css')}}">
    <link rel="stylesheet" href="{{asset('/header/style.css')}}">
    <link rel="stylesheet" href="{{asset('/sidebar/style.css')}}">
    <link rel="stylesheet" href="{{asset('/footer/style.css')}}">
    <link rel="stylesheet" href="{{asset('/ecsite/style.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/style.css')}}">
    <link rel="stylesheet" href="{{asset('/contacts/style.css')}}">
    <link rel="stylesheet" href="{{asset('/breadcrumbs/style.css')}}">
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
    
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>

    
    <script type="text/javascript" src="{{asset('js/slick.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/slick.js')}}"></script>

    <title>@yield('title')</title>    
</head>
<body>      
            
    <header>
    @include('components.header')
    </header>

    <div class="wrapper">

        <div class="sidebar-wrapper">
            @include('components.sidebar')
        </div>
        <div class="main-wrapper">
            @yield('main-header')
            @yield('breadcrumbs')
            @yield('login-nav')
            <h1>@yield('title')</h1>
            @yield('search-form')
            
            <div class="content">
                @yield('content')
            </div>
            @yield('main-footer') 
        </div>
    </div>
    
    <footer>
    @include('components.footer')
    </footer>
    
      
</body>
</html>