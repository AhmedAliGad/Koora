<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'Edit Member')
<!-- Start Content Section -->
@section('content')
    <!-- Start Card -->
    <div class="card main-card">
        <!-- Start Card Header -->
        <div class="card-header">
            <a href="{{ route('admin.admins.index') }}" class="button is-success">
          <span class="icon is-small">
            <i class="fa fa-id-badge"></i>
          </span>
                <span>Members List</span>
            </a>
        </div><!-- End Card Header -->
        <!-- Start Form -->
    {!! Form::model($admin,['method' => 'PATCH', 'files' => true, 'url' => route('admin.admins.update', $admin->id)]) !!}
    @include('admin.admins._form')
    {!! Form::close() !!}
    <!-- End Form -->
    </div><!-- End Card -->
@endsection<!-- End Content Section -->
