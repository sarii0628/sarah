<div class="row">
    <div class="col-md-3 col-md-offset-7">
        <div class="row">
        @guest('user')
        
        <div class="col-md-6">
            <a href="/user/login"><button type="button" class="btn btn-primary">ログイン</button></a>
        </div>
        <div class="col-md-6">
            <a href="/user/register"><button type="button" class=" btn btn-success">会員登録</button></a>
        </div>  

        @endguest
        @auth('user')
        <div class="col-md-8">
        <span><a href=""><button type="button" class="btn btn-info"><strong>{{ Auth::user()->name }} </strong>さんのカート <i class="fas fa-shopping-cart"></i></button></a></span>
        </div>  
        <div class="col-md-4">
        <form action="{{ route('user.logout') }}" method="post">@csrf<input class="btn btn-success" type="submit" value="ログアウト"></form>
        </div>  
        @endauth
        </div>
    </div>
</div>