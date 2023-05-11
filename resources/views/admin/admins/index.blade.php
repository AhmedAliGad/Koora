<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'Staff Members')
<!-- Start Content Section -->
@section('content')
    <!-- Start Card -->
    <div class="card main-card">
        <!-- Start Card Header -->
        <div class="card-header is-justify-content-space-between">
            <a href="{{ route('admin.admins.create') }}" class="button is-success">
                <span class="icon is-small">
                  <i class="fa fa-plus-circle"></i>
                </span>
                <span>Add Member</span>
            </a>
            @include('admin.partials.search')
        </div>
        <!-- End Card Header -->
        <div class="card-content">
            <div class="table-container">
                <table class="table is-fullwidth">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($admins as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone ?: ' - - ' }}</td>
                        <td>{{ ucfirst($user->role) }}</td>
                        <td>{{ $user->active ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <div class="buttons has-addons">
                                <a class="button is-primary" href="{{ route('admin.admins.show', $user->id) }}"> Show </a>
                                <a class="button is-info" href="{{ route('admin.admins.edit', $user->id) }}"> Edit </a>
                                @if(auth()->id() == 1)
                                <span class="modal-open button is-danger" status-name="Confirm Delete"  traget-modal=".delete-modal" data_id="{{ $user->id }}" data_name="{{ $user->name .' / '. $user->email}}" data-url="{{ route('admin.admins.destroy', $user->id) }}">Delete</span>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer with-pagination">
            {{ $admins->links('vendor.pagination.bulma') }}
        </div>
    </div>
    <!-- End Card -->

    <!-- Include Modals -->
    @include('admin.partials.deleteModal')
@endsection<!-- End Content Section -->
