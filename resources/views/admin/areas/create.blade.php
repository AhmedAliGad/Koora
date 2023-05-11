@extends('admin.layouts.app')

@section('page.title', 'Add Area To '.$city->name_en)

@section('content')
    <div class="card main-card">
        <header class="card-header">
            <a href="{{ route('admin.cities.areas.index', $city->id) }}" class="button is-success">
          <span class="icon is-small">
            <i class="fa fa-list-alt"></i>
          </span>
                <span>Areas List</span>
            </a>
        </header>
        {!! Form::open(['method' => 'POST','files' => true, 'route' => ['admin.cities.areas.store', $city->id]]) !!}
        @include('admin.areas._form')
        {!! Form::close() !!}
    </div>
@endsection
