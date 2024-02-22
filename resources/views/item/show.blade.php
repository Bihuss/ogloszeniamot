@extends('layouts.app')
@section('content')
    <main role="main" class="product-page">
        <div class="container">

            @if($item->active == 0)
            <div class="row">
                <div class="col-md-12">
                    <div class="product-alert alert alert-danger" role="alert">
                        Ogłoszenie aktualnie niedostępne!
                    </div>
                </div>
            </div>
            @endif

            @if ($errors->any())
                <div class="list-group alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row product-single">
                <div class="col-md-6 images">
                    @if(!empty($item->images))
                        @foreach($item->images as $image)
                            @if($loop->iteration == 1)
                                <div class="first">
                                    <img src="{{url('/storage/items/'.$image->filename)}}" alt="">
                                </div>
                            @endif
                        @endforeach
                    @endif

                    <div class="row mt-3">
                    @if(!empty($item->images))
                        @foreach($item->images as $image)
                            @if($loop->iteration > 1)
                                    <div class="col-md-4">
                                        <a href="{{url('/storage/items/'.$image->filename)}}" data-lightbox="roadtrip">
                                            <img src="{{url('/storage/items/'.$image->filename)}}" alt=""></a>
                                    </div>
                            @endif
                        @endforeach
                    @endif
                    </div>
                </div>

                <div class="col-md-6 offer-content">
                    <div class="card">
                        <div class="card-body">
                            <p class="placedate"><i class="bi bi-geo-alt me-2"></i>{{ $item->location }}</p>
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text">{{ $item->desc }}</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Kategoria:</strong> {{ $item->category->name }}</li>
                                <li class="list-group-item"><strong>Lokalizacja:</strong> {{ $item->location }}</li>
                                <li class="list-group-item"><strong>Email:</strong> {{ $item->mail }}</li>
                                <li class="list-group-item"><strong>Telefon:</strong> {{ $item->phone }}</li>
                                <li class="list-group-item"><strong>Cena:</strong> {{ $item->price }}</li> 
                                <li class="list-group-item"><strong>Typ:</strong> {{ \App\Models\Item::CARS[$item->type] ?? '' }}</li>
                                <li class="list-group-item"><strong>Marka:</strong> {{ $item->brand }}</li>
                                <li class="list-group-item"><strong>Paliwo:</strong> {{\App\Models\Item::FUEL[$item->fuel] ?? '' }}</li>
                                <li class="list-group-item"><strong>Przebieg:</strong> {{ $item->mileage }} km</li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Dodano {{ $item->created_at->format('d.m.Y H:i') }}</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    @include ('item.products-list-items')
                </div>
            </div>
        </div>
    </main>
@endsection
