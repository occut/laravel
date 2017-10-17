<div class="panel panel-default">
    <div class="panel-bd">
        <div class="pagination">
            @if(($paginator->currentPage() == 1))
                <span class=" {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}"">上一页</span>
            @else
                <a href="{{ $paginator->url($paginator->currentPage()-1)}}" class="prevPage">上一页</a>
            @endif
            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                @if(($paginator->currentPage() == $i))
                    <span class="current">{{ $i }}</span>
                    @else
                    <a href="{{ $paginator->url($i) }}" class="tcdNumber" {{ ($paginator->currentPage() == $i) ? ' current' : '' }}">{{ $i }}</a>
                    @endif
            @endfor
            {{--<span>...</span>--}}
                @if(($paginator->currentPage() == $paginator->lastPage()))
                    <span class="disabled">下一页</span>
                @else
                    <a href="{{ $paginator->url($paginator->currentPage()+1) }}" class="nextPage">下一页</a>
                @endif
        </div>
    </div>
</div>