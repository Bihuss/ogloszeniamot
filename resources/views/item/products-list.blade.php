@empty($routeName) @php $routeName = 'items.index' @endphp @endempty
@empty($id) @php $id = null @endphp @endempty
<div class="row mb-3">
    <div class="col-md-12 toptitle">
        <h3 class="title">Ogłoszenia z Całej Polski</h3>
        
    </div>
</div>

<div class="row">
    
    <div class="col-md-6">
        <form class="filters-form mt-4" action="{{route('items.filter')}}" method="get">
            <h4>Wyszukiwarka:</h4>
            <div class="form-group">
                
                <input type="text" class="form-control" id="search" name="search" 
                placeholder="Szukaj..." value="{{ request()->search ?? '' }}">

                <label for="type" class="control-label">Typ:</label>
                <select name="type" class="form-select" id="type" >
                    <option value=""></option>
                    @foreach (\App\Models\Item::CARS as $optionKey => $optionValue)
                        <option
                            value="{{ $optionKey }}" {{ (request()->get('type') !== null 
                            && request()->get('type') == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="type" class="control-label">Przebieg min:</label>
                    <input type="text" class="form-control" id="mileage_start" name="mileage_start" placeholder="Przebieg od" value="{{ request()->mileage_start ?? '' }}">
                </div>
                <div class="col-md-6">
                    <label for="type" class="control-label">Przebieg max:</label>
                    <input type="text" class="form-control" id="mileage_end" name="mileage_end" placeholder="Przebieg do" value="{{ request()->mileage_end ?? '' }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="price_start" class="control-label">Cena od:</label>
                    <input type="text" class="form-control" id="price_start" name="price_start" placeholder="Cena od" value="{{ request()->price_start ?? '' }}">
                </div>
                <div class="col-md-6">
                    <label for="price_end" class="control-label">Cena do:</label>
                    <input type="text" class="form-control" id="price_end" name="price_end" placeholder="Cena do" value="{{ request()->price_end ?? '' }}">
                </div>
            </div>
            <div class="form-group mt-2">
                <input type="submit" class="btn btn-primary" value="Filtruj">
                <a href="{{ route('items.index') }}" class="btn btn-outline-primary">Reset</a>
            </div>
        </form>
        
        <div class="col-md-12 top-filter filter-home">
            <form class="form-inline ml-auto" action="{{ route('items.filter') }}">
                <label class="mr-2">Sortuj:</label>
                <select class="form-control mr-2" name="sort">
                    <option value="">Wybierz kolumne</option>
                    <option value="created_at" {{ (request()->get('sort') !== null &&
                     request()->get('sort') == 'created_at') ? 'selected' : ''}}>Data</option>
                    <option value="price" {{ (request()->get('sort') !== null &&
                     request()->get('sort') == 'price') ? 'selected' : ''}}>Cena</option>
                </select>
    
                <select class="form-control mr-2" name="sortorder">
                    <option value="">Wybierz kierunek</option>
                    <option value="desc" {{ (request()->get('sortorder') !== null &&
                     request()->get('sortorder') == 'desc') ? 'selected' : ''}}>Malejąco</option>
                    <option value="asc" {{ (request()->get('sortorder') !== null &&
                     request()->get('sortorder') == 'asc') ? 'selected' : ''}}>Rosnąco</option>
                </select>
                <button class="btn btn-primary">Sortuj</button>
                <a href="{{ route('items.index') }}" class="btn btn-outline-primary">Reset</a>
            </form>
            
        </div>   
    </div>
    
    

    <div class="col-md-6">
        <img src="{{ asset('img/showdiv2.jpg') }}" alt="" class="w-100">
    </div>
    


<div class="row">
    <div class="col-md-12">
        @include ('item.products-list-items')
    </div>
</div>

