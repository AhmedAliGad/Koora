@extends('admin.layouts.app')

@section('page.title', 'Add City')

@section('content')
    <div class="card main-card">
        <header class="card-header">
            <a href="{{ route('admin.cities.index') }}" class="button is-success">
          <span class="icon is-small">
            <i class="fa fa-list-alt"></i>
          </span>
                <span>Cities List</span>
            </a>
        </header>
        {!! Form::open(['method' => 'POST','files' => true, 'route' => ['admin.cities.store']]) !!}
        @include('admin.cities._form')
        {!! Form::close() !!}
    </div>
@endsection
