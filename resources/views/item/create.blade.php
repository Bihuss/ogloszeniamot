@extends('layouts.app')

@section('content')
    <main role="main" class="offer-add-page">
        <div class="container">
            <div class="row">

            </div>
            <div class="row">
                <div class="col-md-12 toptitle">
                    <h2 class="title">Dodawanie ogłoszenia</h2>
                </div>
            </div>

            <form method="POST" action="{{ route('item.store') }}" id="saveform" accept-charset="UTF-8" class="form-horizontal form-broker over-offer-add" enctype="multipart/form-data">
                {{ csrf_field() }}

                @if ($errors->any())
                    <div class="row over-errors">
                        <div class="col-md-12">
                            <ul class="list-group alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="subtitle">1. Wprowadź podstawowe informacje</h3>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="title">Tytuł</label>
                                <input type="text" class="form-control" id="title" name="title"
                                 placeholder="Title" value="{{ old('title') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="category_id">Wybierz kategorię</label>
                            <select name="category_id" id="category_id" class="form-select">
                                <option value="">Wybierz</option>
                                @include('item.categoryTreeSelect',$parentCategories);
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="type">Typ</label>
                            <select name="type" id="type" class="form-select">
                                <option value="">Wybierz</option>
                                @foreach (\App\Models\Item::CARS as $optionKey => $optionValue)
                                    <option
                                        value="{{ $optionKey }}" {{ (request()->get('type') !== null && request()->get('type') == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="fuel">Rodzaj paliwa</label>
                            <select name="fuel" id="fuel" class="form-select">
                                <option value="">Wybierz</option>
                                @foreach (\App\Models\Item::FUEL as $optionKey => $optionValue)
                                    <option
                                        value="{{ $optionKey }}" {{ (request()->get('fuel') !== null && 
                                        request()->get('fuel') == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="desc">Opis</label>
                                <textarea class="form-control" id="desc" name="desc" rows="3" 
                                placeholder="Opis" required>{{ old('desc') }}</textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="location">Lokalizacja</label>
                                <input type="text" class="form-control" id="location" name="location" placeholder="Lokalizacja" value="{{ old('location') }}" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="mail">Email</label>
                                <input type="email" class="form-control" id="mail" name="mail" placeholder="Email" value="{{ old('mail') }}" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="phone">Telefon</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Telefon" value="{{ old('phone') }}" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="price">Cena</label>
                                <input type="number" class="form-control" id="price" name="price" placeholder="Cena" value="{{ old('price') }}" min="1" step="0.01" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="brand">Marka</label>
                                <input type="text" class="form-control" id="brand" name="brand" placeholder="Marka" value="{{ old('brand') }}" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="mileage">Przebieg</label>
                                <input type="number" class="form-control" id="mileage" name="mileage" placeholder="Przebieg" value="{{ old('mileage') }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h3 class="subtitle">2. Dodaj zdjęcia</h3>
                        <input name="photos[]" type="file" multiple />
                        <img src="{{ asset('img/FqZ8PW8KtjvXpZqDTz5zxbbQL0cc9SptQPgxbQif.jpg') }}" alt="" class="w-100">
                    </div>
                </div>
                <div class="row submit-row mt-3">
                    <div class="col-md-6">
                        <input type="submit" class="btn btn-primary submit" value="Dodaj ogłoszenie">
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
