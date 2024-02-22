@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('flash_message'))
                    <div class="alert alert-success" role="alert">{{Session::get('flash_message')}}</div>
                @endif
            </div>
        </div>

        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Category</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/category/create') }}" class="btn btn-success btn-sm" title="Dodaj Category">
                            <i class="fa fa-plus" aria-hidden="true"></i> Dodaj
                        </a>

                        <form method="GET" action="{{ url('/admin/category') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Szukaj..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>a
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Parent</th><th>Name</th><th>Akcje</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($category as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>({{ $item->parent_id }}) {{ $item->parent->name ?? '' }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <a href="{{ url('/admin/category/' . $item->id . '/edit') }}" title="Edytuj Category"><button class="btn btn-primary btn-sm">
                                                <i class="bi bi-pencil" aria-hidden="true"></i> Edytuj</button></a>

                                            <form method="POST" action="{{ url('/admin/category' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Usuń Category" onclick="return confirm('Confirm delete')">
                                                <i class="bi bi-trash" aria-hidden="true"></i> Usuń</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $category->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
