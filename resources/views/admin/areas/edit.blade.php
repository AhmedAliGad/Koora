@extends('admin.layouts.app')

@section('page.title', 'Edit Area')

@section('content')
    <div class="card main-card">
        <div class="card-header">
            <a href="{{ route('admin.cities.areas.index', $city->id) }}" class="button is-success">
          <span class="icon is-small">
            <i class="fa fa-list-alt"></i>
          </span>
                <span>Areas List</span>
            </a>
        </div>
        {!! Form::model($area, ['method' => 'PATCH', 'files' => true, 'url' => route('admin.cities.areas.update', [$city->id, $area->id])]) !!}
        @include('admin.areas._form')
        {!! Form::close() !!}
    </div>
@endsection
