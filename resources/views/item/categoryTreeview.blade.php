@foreach($parentCategories as $category)
    {{$category->name}}

    @if(count($category->subcategory))
        @include('item.subCategoryList',['subcategories' => $category->subcategory,'depth'=>0])
    @endif
@endforeach
