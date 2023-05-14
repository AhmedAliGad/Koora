<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'Edit Upcoming Match')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
    <!-- Start Card Header -->
    <div class="card-header">
      <a href="{{ route('admin.upcoming_matches.index') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-soccer-ball"></i>
        </span>
        <span>Upcoming Matches</span>
      </a>
    </div><!-- End Card Header -->
    <!-- Start Form -->
    {!! Form::model($upcomingMatch, ['method' => 'PATCH', 'files' => true, 'url' => route('admin.upcoming_matches.update',$upcomingMatch->id)]) !!}
      @include('admin.upcoming_matches._form')
    {!! Form::close() !!}<!-- End Form -->
  </div><!-- End Card -->
@endsection<!-- End Content Section -->
