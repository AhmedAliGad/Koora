@extends('admin.layouts.app')

@section('page.title', 'Add Area To ')

@section('content')
    <div class="card main-card">
        <header class="card-header">
            <a href="{{ route('admin.working_hours.index') }}" class="button is-success">
          <span class="icon is-small">
            <i class="fa fa-list-alt"></i>
          </span>
                <span>Working Hours</span>
            </a>
        </header>
        {!! Form::open(['method' => 'POST','files' => true, 'route' => ['admin.working_hours.store', $city->id]]) !!}
        @include('admin.working_hours._form')
        {!! Form::close() !!}
    </div>
@endsection
