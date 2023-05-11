<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'Pharmacies List ')
<!-- Start Content Section -->
@section('content')
    <!-- Start Card -->
    <div class="card main-card">
        <!-- Start Card Header -->
        <div class="card-header is-justify-content-space-between">
            <a href="{{ route('admin.users.create') }}" class="button is-success">
                <span class="icon is-small">
                  <i class="fa fa-plus-circle"></i>
                </span>
                <span>Add Pharmacy</span>
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
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone ?: ' - - ' }}</td>
                        <td>{{ $user->active ? 'Yes' : 'No' }}</td>
                        <td>
                            <div class="buttons has-addons">
                                <a class="button is-primary" href="{{ route('admin.users.show', $user->id) }}"> Show </a>
                                <a class="button is-info" href="{{ route('admin.users.edit', $user->id) }}"> Edit </a>
                                @if(auth()->id() == 1)
                                    <span class="modal-open button is-danger" status-name="Confirm Delete"  traget-modal=".delete-modal" data_id="{{ $user->id }}" data_name="{{ $user->name .' / '. $user->email}}" data-url="{{ route('admin.users.destroy', $user->id) }}">Delete</span>
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
            {{ $users->links('vendor.pagination.bulma') }}
        </div>
    </div>
    <!-- End Card -->
    <!-- Include Modals -->
    @include('admin.partials.deleteModal')
@endsection<!-- End Content Section -->
