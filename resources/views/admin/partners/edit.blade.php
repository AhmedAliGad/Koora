<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'Edit Partner')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
    <!-- Start Card Header -->
    <div class="card-header">
      <a href="{{ route('admin.partners.index') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-users"></i>
        </span>
        <span>Partners List</span>
      </a>
    </div><!-- End Card Header -->
    <!-- Start Form -->
    {!! Form::model($partner, ['method' => 'PATCH', 'files' => true, 'url' => route('admin.partners.update',$partner->id)]) !!}
      @include('admin.partners._form')
    {!! Form::close() !!}<!-- End Form -->
  </div><!-- End Card -->
@endsection<!-- End Content Section -->
