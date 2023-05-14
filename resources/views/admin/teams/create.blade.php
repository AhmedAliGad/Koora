<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'Add Team')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
    <!-- Start Card Header -->
    <div class="card-header">
      <a href="{{ route('admin.teams.index') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-users"></i>
        </span>
        <span>Teams List</span>
      </a>
    </div><!-- End Card Header -->
    <!-- Start Form -->
    {!! Form::open(['method' => 'POST','files' => true, 'route' => ['admin.teams.store']]) !!}
      @include('admin.teams._form')
    {!! Form::close() !!}<!-- End Form -->
  </div><!-- End Card -->
@endsection<!-- End Content Section -->
@section('scripts')
    <script type="text/javascript" src="{{ asset('admin/js/repeater.js') }}"></script>
    <script>
        $(document).ready(function () {
            'use strict';
            $('.links').repeater({
                show: function () {
                    $(this).slideDown();
                },
                hide: function (deleteElement) {
                    if(confirm('Are you sure you want to delete this link?')) {
                        $(this).slideUp(deleteElement);
                    }
                },
                ready: function (setIndexes) {
                }
            });
        });
    </script>
@endsection
