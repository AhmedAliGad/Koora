@extends('admin.layouts.app')

@section('page.title', 'General Settings')

@section('content')
<div class="card main-card">
    <div class="card-header">
        <div>
          <span class="icon is-small">
            <i class="fa fa-cogs"></i>
          </span>
            <span>App Settings</span>
        </div>
    </div>
    {!! Form::model($setting,['method' => 'PATCH', 'files' => true, 'url' => route('admin.settings.update', $setting->id)]) !!}
    @include('admin.settings._form')
    {!! Form::close() !!}
</div>
@endsection


