@foreach($parentCategories as $categoryItem)
    @empty($depth) @php $depth = 0 @endphp  @endempty

    <option value="{{ $categoryItem->id }}" @if(isset($category->parent_id) && $category->parent_id == $categoryItem->id) selected @endif>
        @for($i = 0; $i < $depth; $i++){{ '-' }}@endfor {{$categoryItem->name}}</option>

    @if(count($categoryItem->subcategory))
        @include('item.categoryTreeSelect',['parentCategories' => $categoryItem->subcategory,'depth'=>$depth+1])
    @endif
@endforeach
