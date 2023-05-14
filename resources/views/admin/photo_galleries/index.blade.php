<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'Photo Galleries')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
    <!-- Start Card Header -->
    <div class="card-header">
        <a href="{{ route('admin.photo_galleries.create') }}" class="button is-success">
            <span class="icon is-small">
                <i class="fa fa-plus-circle"></i>
            </span>
            <span>Add Photo Gallery</span>
        </a>
    </div><!-- End Card Header -->
    <!-- Start Card Content -->
    <div class="card-content">
        <div class="table-container">
            <table class="table is-fullwidth" id="photo_galleries">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($photo_galleries as $photoGallery)
                        <tr>
                            <td><img src="{{ $photoGallery->image ?: '/front/img/dummy_data/slide2.png' }}"
                                    style="width:100px;"></td>
                            <td>{{ $photoGallery->title }}</td>
                            <td>{{ $photoGallery->active ? 'Active' : 'Disabled' }}</td>
                            <td>
                                <div class="buttons has-addons">
                                    <a class="button is-info" href="{{ route('admin.photo_galleries.edit', $photoGallery->id) }}">
                                        Edit </a>
                                    <a class="button is-success" href="{{ route('admin.photo_galleries.show', $photoGallery->id) }}">
                                        Photos </a>
                                    <span class="modal-open button is-danger" status-name="Confirm Delete"
                                        traget-modal=".delete-modal" data_id="{{ $photoGallery->id }}"
                                        data_name="{{ $photoGallery->title }}"
                                        data-url="{{ route('admin.photo_galleries.destroy', $photoGallery->id) }}">Delete</span>
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
      {{  $photo_galleries->links('vendor.pagination.bulma') }}
    </div><!-- End Card Footer -->
  </div><!-- End Card -->
  <!-- Include Modals -->
  @include('admin.partials.deleteModal')
@endsection<!-- End Content Section -->
