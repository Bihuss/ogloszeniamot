@extends('layouts.app')

@section('content')
<main>
    <div class="container">
        @include ('item.products-list')
        <div class="row">
            <div class="col-md-12">
                <div class="pagination">
                    {{ $items->links() }}
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
