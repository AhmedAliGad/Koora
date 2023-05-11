<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'Reports - Calls Details')
<!-- Start Content Section -->
@section('content')
    <!-- Start Card -->
    <div class="card main-card">
        <!-- Start Card Header -->
        <div class="card-header is-justify-content-space-between">
            <p>Calls Details</p>
        </div>
        <!-- End Card Header -->
        <div class="card-content">
            <div class="table-container">
                <table class="table is-fullwidth">
                    <thead>
                    <tr>
                        <th>Call ID</th>
                        <th>Date/Time</th>
                        <th>Agent</th>
                        <th>Duration</th>
                        <th>Rate</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($calls as $call)
                        <tr>
                            <td>{{ $call->id }}</td>
                            <td>{{ $call->created_at->format('d-m-Y g:i A') }}</td>
                            <td>{{ $call->admin ? $call->admin->name : ' - - ' }}</td>
                            <td>{{ $call->duration_time }}</td>
                            <td>{{ $call->rating }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer with-pagination">
            {{--{!! $calls->render() !!}--}}
        </div>
    </div>
    <!-- End Card -->

    <!-- Include Modals -->
    @include('admin.partials.deleteModal')
@endsection<!-- End Content Section -->
