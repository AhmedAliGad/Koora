@extends('admin.layouts.app')

@section('page.title', 'Edit Working Hour')

@section('content')
    <div class="card main-card">
        <div class="card-header">
            <a href="{{ route('admin.working_hours.index') }}" class="button is-success">
          <span class="icon is-small">
            <i class="fa fa-list-alt"></i>
          </span>
                <span>Working Hours</span>
            </a>
        </div>
        {!! Form::model($workingHour, ['method' => 'PATCH', 'files' => true, 'url' => route('admin.working_hours.update', $workingHour->id)]) !!}
        @include('admin.working_hours._form')
        {!! Form::close() !!}
    </div>
@endsection
