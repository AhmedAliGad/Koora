<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'Upcoming Matches')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
    <!-- Start Card Header -->
    <div class="card-header">
        <a href="{{ route('admin.upcoming_matches.create') }}" class="button is-success">
            <span class="icon is-small">
                <i class="fa fa-plus-circle"></i>
            </span>
            <span>Add Upcoming Match</span>
        </a>
    </div><!-- End Card Header -->
    <!-- Start Card Content -->
    <div class="card-content">
        <div class="table-container">
            <table class="table is-fullwidth" id="upcoming_matches">
                <thead>
                    <tr>
                        <th>First Team</th>
                        <th>Second Team</th>
                        <th>date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($upcoming_matches as $upcomingMatch)
                        <tr>
                            <td>{{ $upcomingMatch->firstTeam->name }}</td>
                            <td>{{ $upcomingMatch->secondTeam->name }}</td>
                            <td>{{ $upcomingMatch->date }}</td>
                            <td>{{ $upcomingMatch->active ? 'Active' : 'Disabled' }}</td>
                            <td>
                                <div class="buttons has-addons">
                                    <a class="button is-info" href="{{ route('admin.upcoming_matches.edit', $upcomingMatch->id) }}">
                                        Edit </a>
                                    <span class="modal-open button is-danger" status-name="Confirm Delete"
                                        traget-modal=".delete-modal" data_id="{{ $upcomingMatch->id }}"
                                        data_name="Delete Match"
                                        data-url="{{ route('admin.upcoming_matches.destroy', $upcomingMatch->id) }}">Delete</span>
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
      {{  $upcoming_matches->links('vendor.pagination.bulma') }}
    </div><!-- End Card Footer -->
  </div><!-- End Card -->
  <!-- Include Modals -->
  @include('admin.partials.deleteModal')
@endsection<!-- End Content Section -->
