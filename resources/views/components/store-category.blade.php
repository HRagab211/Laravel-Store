<div>
    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
        @foreach ($cat as $item)
        
        <a href="{{ route('category.products',$item->id) }}" class="nav-item nav-link">{{ $item->name }}</a>
            
        @endforeach
    </div>
</div>