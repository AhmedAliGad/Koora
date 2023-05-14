<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'Sliders List')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
    <!-- Start Card Header -->
    <div class="card-header">
        <a href="{{ route('admin.sliders.create') }}" class="button is-success">
            <span class="icon is-small">
                <i class="fa fa-plus-circle"></i>
            </span>
            <span>Add Slide</span>
        </a>
    </div><!-- End Card Header -->
    <!-- Start Card Content -->
    <div class="card-content">
        <div class="table-container">
            <table class="table is-fullwidth" id="sliders">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sliders as $slider)
                        <tr>
                            <td><img src="{{ $slider->image ?: '/front/img/dummy_data/slide2.png' }}"
                                    style="width:100px;"></td>
                            <td>{{ $slider->priority }}</td>
                            <td>{{ $slider->active ? 'Active' : 'Disabled' }}</td>
                            <td>
                                <div class="buttons has-addons">
                                    <a class="button is-info" href="{{ route('admin.sliders.edit', $slider->id) }}">
                                        Edit </a>
                                    <span class="modal-open button is-danger" status-name="Confirm Delete"
                                        traget-modal=".delete-modal" data_id="{{ $slider->id }}"
                                        data_name="{{ $slider->title ?: 'Slider' }}"
                                        data-url="{{ route('admin.sliders.destroy', $slider->id) }}">Delete</span>
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
      {{  $sliders->links('vendor.pagination.bulma') }}
    </div><!-- End Card Footer -->
  </div><!-- End Card -->
  <!-- Include Modals -->
  @include('admin.partials.deleteModal')
@endsection<!-- End Content Section -->
