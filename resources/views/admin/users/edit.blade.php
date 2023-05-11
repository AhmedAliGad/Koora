<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'Edit Pharmacy')
<!-- Start Content Section -->
@section('content')
    <!-- Start Card -->
    <div class="card main-card">
        <!-- Start Card Header -->
        <div class="card-header">
            <a href="{{ route('admin.users.index') }}" class="button is-success">
          <span class="icon is-small">
            <i class="fa fa-users"></i>
          </span>
                <span>Pharmacies List</span>
            </a>
        </div><!-- End Card Header -->
        <!-- Start Form -->
    {!! Form::model($user,['method' => 'PATCH', 'files' => true, 'url' => route('admin.users.update', $user->id)]) !!}
    @include('admin.users._form')
    {!! Form::close() !!}
    <!-- End Form -->
    </div><!-- End Card -->
@endsection<!-- End Content Section -->
