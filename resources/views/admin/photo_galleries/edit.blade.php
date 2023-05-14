<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'Edit Photo Gallery')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
    <!-- Start Card Header -->
    <div class="card-header">
      <a href="{{ route('admin.photo_galleries.index') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-users"></i>
        </span>
        <span>Photo Galleries </span>
      </a>
    </div><!-- End Card Header -->
    <!-- Start Form -->
    {!! Form::model($photoGallery, ['method' => 'PATCH', 'files' => true, 'url' => route('admin.photo_galleries.update',$photoGallery->id)]) !!}
      @include('admin.photo_galleries._form')
    {!! Form::close() !!}<!-- End Form -->
  </div><!-- End Card -->
@endsection<!-- End Content Section -->
