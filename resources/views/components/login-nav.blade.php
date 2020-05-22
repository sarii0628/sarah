<div class="sub-container">
    <div class="admin-nav-container">
        <div class="admin-nav-sub-container">
            @guest('user')
            
            
                <a href="/user/login"><button type="button" class="btn btn-primary">ログイン</button></a>
            
            
                <a href="/user/register"><button type="button" class="btn btn-success">会員登録</button></a>
             

            @endguest
            @auth('user')
            
                <span><a href="/cart/index"><button type="button" class="btn btn-info"><strong>{{ Auth::user()->name }} </strong>さんのカート <i class="fas fa-shopping-cart"></i></button></a></span>
             
            
                <form action="{{ route('user.logout') }}" method="post">@csrf<input class="btn btn-success" type="submit" value="ログアウト"></form>
              
            @endauth
        </div>
    </div>
</div>