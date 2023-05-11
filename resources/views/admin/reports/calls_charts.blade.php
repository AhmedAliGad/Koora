<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'Reports - Calls Chart')
<!-- Start Content Section -->
@section('content')
    <!-- Start Card -->
    <div class="card main-card">
        <div class="card-header">
        </div>
        <div class="card-content">
            <chart-component :users="{{ $users }}"></chart-component>
        </div>
        <hr />
        <div class="card-content">
            <bar-chart></bar-chart>
        </div>
    </div>
    <!-- End Card -->
@endsection<!-- End Content Section -->

