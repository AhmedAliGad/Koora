@extends('admin.layouts.app')

@section('page.title', 'Edit Question')

@section('content')
    <div class="card main-card">
        <div class="card-header">
            <a href="{{ route('admin.hcp_faqs.index') }}" class="button is-success">
          <span class="icon is-small">
            <i class="fa fa-list-alt"></i>
          </span>
                <span>Questions List</span>
            </a>
        </div>
        {!! Form::model($hcpFaq, ['method' => 'PATCH', 'files' => true, 'url' => route('admin.hcp_types.update', $hcpFaq->id)]) !!}
        @include('admin.hcp_faqs._form')
        {!! Form::close() !!}
    </div>
@endsection
