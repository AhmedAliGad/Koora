@extends('admin.layouts.app')

@section('page.title', 'Add Question')

@section('content')
    <div class="card main-card">
        <header class="card-header">
            <a href="{{ route('admin.hcp_faqs.index') }}" class="button is-success">
          <span class="icon is-small">
            <i class="fa fa-list-alt"></i>
          </span>
                <span>Questions List</span>
            </a>
        </header>
        {!! Form::open(['method' => 'POST','files' => true, 'route' => ['admin.hcp_faqs.store']]) !!}
        @include('admin.hcp_faqs._form')
        {!! Form::close() !!}
    </div>
@endsection
