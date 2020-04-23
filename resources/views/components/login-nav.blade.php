<div class="row">
    <div class="col-md-4 col-md-offset-7">
        @guest('user')
        <div class="col-md-4">
            <a href="/user/login"><button type="button" class="btn btn-primary">ログイン</button></a>
        </div>
        <div class="col-md-offset-1 col-md-4">
            <a href="/user/register"><button type="button" class=" btn btn-success">会員登録</button></a>
        </div>  
        @endguest
        @auth('user')
        <p>{{ Auth::user()->name }} さん</p>
        <div class="col-md-offset-1 col-md-4">
        
        <form action="{{ route('user.logout') }}" method="post">@csrf<input type="submit" value="ログアウト"></form>
        </div>  
        @endauth
    </div>
</div>