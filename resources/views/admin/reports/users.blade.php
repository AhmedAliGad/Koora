<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'Reports - Report of Pharmacies')
<!-- Start Content Section -->
@section('content')
    <!-- Start Card -->
    <div class="card main-card">
        <!-- Start Card Header -->
        <div class="card-header is-justify-content-space-between">
        </div>
        <!-- End Card Header -->
        <div class="card-content">
            <div class="table-container">
                <table class="table is-fullwidth">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Number of Calls</th>
                        <th>Total Duration</th>
                        <th>Details</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->status }}</td>
                            <td>{{ count($user->videoCalls) }}</td>
                            <td>{{ gmdate("H:i:s", $user->videoCalls->sum('duration_time')) }}</td>
                            <td>
                                <div class="buttons has-addons">
                                    <a class="button is-success" target="_blank" href="{{ route('admin.user_calls', $user->id) }}">Show</a>
                                </div>
                            </td>
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
