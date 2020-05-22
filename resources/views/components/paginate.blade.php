<div>
    <div class="paginate">
        @if(isset($items))
        {{$items->appends(Request::only('keyword'))->appends(['sort' => $sort])->links()}}
        @endif
    </div>
</div>