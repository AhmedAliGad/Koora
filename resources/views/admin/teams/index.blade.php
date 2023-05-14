<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'Teams List')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
    <!-- Start Card Header -->
    <div class="card-header">
        <a href="{{ route('admin.teams.create') }}" class="button is-success">
            <span class="icon is-small">
                <i class="fa fa-plus-circle"></i>
            </span>
            <span>Add Team</span>
        </a>
    </div><!-- End Card Header -->
    <!-- Start Card Content -->
    <div class="card-content">
        <div class="table-container">
            <table class="table is-fullwidth" id="teams">
                <thead>
                    <tr>
                        <th>Logo</th>
                        <th>Name</th>
                        <th>Points</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teams as $team)
                        <tr>
                            <td><img src="{{ $team->image ?: '/front/img/dummy_data/slide2.png' }}"
                                    style="width:100px;"></td>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->points }}</td>
                            <td>{{ $team->active ? 'Active' : 'Disabled' }}</td>
                            <td>
                                <div class="buttons has-addons">
                                    <a class="button is-info" href="{{ route('admin.teams.edit', $team->id) }}">
                                        Edit </a>
                                    <span class="modal-open button is-danger" status-name="Confirm Delete"
                                        traget-modal=".delete-modal" data_id="{{ $team->id }}"
                                        data_name="{{ $team->name }}"
                                        data-url="{{ route('admin.teams.destroy', $team->id) }}">Delete</span>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div><!-- End Card Content -->
    <!-- Start Card Footer -->
    <div class="card-footer with-pagination">
      {{  $teams->links('vendor.pagination.bulma') }}
    </div><!-- End Card Footer -->
  </div><!-- End Card -->
  <!-- Include Modals -->
  @include('admin.partials.deleteModal')
@endsection<!-- End Content Section -->
