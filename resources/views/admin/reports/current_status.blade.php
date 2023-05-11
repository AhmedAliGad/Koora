<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'Reports - Current Status')
<!-- Start Content Section -->
@section('content')
    <!-- Start Card -->
    <div class="card main-card">
        <!-- Start Card Header -->
        <div class="card-header is-justify-content-space-between">
            <p>Current Agents</p>
            @include('admin.partials.search')
        </div>
        <!-- End Card Header -->
        <div class="card-content">
            <div class="table-container">
                <table class="table is-fullwidth">
                    <thead>
                    <tr>
                        <th>Agent Name</th>
                        <th>Status</th>
                        <th>In Call</th>
                        <th>For</th>
                        <th>Handled Calls</th>
                        <th>Login time</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($agents as $agent)
                        <tr>
                            <td>{{ $agent->name }}</td>
                            <td>{{ $agent->status }}</td>
                            <td>{{ $agent->status == 'in_call' ? 'Yes' : 'No' }}</td>
                            <td>{{ $agent->status == 'in_call' ?: ' - - ' }}</td>
                            <td>{{ $agent->getHandledCalls() }}</td>
                            <td>{{ $agent->getLoginTime() }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer with-pagination">
        </div>
    </div>
    <!-- End Card -->

    <!-- Include Modals -->
    @include('admin.partials.deleteModal')
@endsection<!-- End Content Section -->
