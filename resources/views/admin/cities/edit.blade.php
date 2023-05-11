@extends('admin.layouts.app')

@section('page.title', 'Edit City')

@section('content')
    <div class="card main-card">
        <div class="card-header">
            <a href="{{ route('admin.cities.index') }}" class="button is-success">
          <span class="icon is-small">
            <i class="fa fa-list-alt"></i>
          </span>
                <span>Cities List</span>
            </a>
        </div>
        {!! Form::model($city, ['method' => 'PATCH', 'files' => true, 'url' => route('admin.cities.update', $city->id)]) !!}
        @include('admin.cities._form')
        {!! Form::close() !!}
    </div>
@endsection
