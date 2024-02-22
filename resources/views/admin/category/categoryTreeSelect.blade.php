@foreach($parentCategories as $category)
    @empty($depth) @php $depth = 0 @endphp  @endempty

    <option value="{{ $category->id }}">@for($i = 0; $i < $depth; $i++){{ '-' }}@endfor {{$category->name}}</option>

    @if(count($category->subcategory))
        @include('item.categoryTreeSelect',['parentCategories' => $category->subcategory,'depth'=>$depth+1])
    @endif
@endforeach
