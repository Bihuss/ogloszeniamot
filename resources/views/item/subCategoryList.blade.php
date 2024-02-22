{{--@foreach($subcategories as $subcategory)
    <ul>
        <li>@for($i = 0; $i <= $depth; $i++) - @endfor {{$subcategory->name}}</li>
        @if(count($subcategory->subcategory))
            @include('item.subCategoryList',['subcategories' => $subcategory->subcategory, 'depth' => $depth+1])
        @endif
    </ul>
@endforeach--}}

@foreach($subcategories as $subcategory)

@if(count($subcategory->subcategory))
<li class="dropdown-submenu">
        <a id="dropdownMenu2" href="{{ route('category.show',$subcategory->id) }}" role="button" 
             aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">{{$subcategory->name}}</a>
        <ul aria-labelledby="dropdownMenu2" class="dropdown-menu border-0 shadow">
            @if(count($subcategory->subcategory))
                @include('item.subCategoryList',['subcategories' => $subcategory->subcategory, 'depth' => $depth+1])
            @endif
        </ul>
</li>
@else
<li>
    <a href="{{ route('category.show',$subcategory->id) }}" class="dropdown-item">{{$subcategory->name}}</a>
</li>
@endif

@endforeach
