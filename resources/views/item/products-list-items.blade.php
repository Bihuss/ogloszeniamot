<div class="items-list row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-4">
    @if(!$items->count())
        <h3>Brak ogłoszeń</h3>
    @endif
    @foreach($items as $item)
        <div class="col">
            <div class="card shadow-sm">
                @if(!empty($item->imageMain))
                    <img src="{{url('/storage/items/'.$item->imageMain->filename)}}" alt="" class="bd-placeholder-img card-img-top" >
                @endif

                <div class="card-body">
                    <h3 class="card-title">{{ $item['title'] }}</h3>
                    <p class="card-text">
                        Cena: {{ $item['price'] }} zł
                    </p>
                    <p class="card-text">
                        {{  mb_substr($item->desc,0,45,'UTF-8') }}{{ mb_strlen($item->desc) > 45 ? "..." : '' }}
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="{{ route('item.show', $item['id']) }}" class="btn btn-sm btn-outline-secondary">Zobacz</a>
                        </div>
                        <small class="text-muted">Dodano: {{ $item['created_at']->format('d.m.Y H:i') }}</small>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="row mt-4 ">
    <div class="col-md-12">
        <div class="d-flex justify-content-center">
            @if(isset($items->links))
                {!! $items->links() !!}
            @endif
        </div>
    </div>
</div>
