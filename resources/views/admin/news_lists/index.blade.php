<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'News List')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
    <!-- Start Card Header -->
    <div class="card-header">
        <a href="{{ route('admin.news_lists.create') }}" class="button is-success">
            <span class="icon is-small">
                <i class="fa fa-plus-circle"></i>
            </span>
            <span>Add Post</span>
        </a>
    </div><!-- End Card Header -->
    <!-- Start Card Content -->
    <div class="card-content">
        <div class="table-container">
            <table class="table is-fullwidth" id="news_lists">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($news as $newsList)
                        <tr>
                            <td><img src="{{ $newsList->main_image ?: '/front/img/dummy_data/slide2.png' }}"
                                    style="width:100px;"></td>
                            <td>{{ $newsList->title }}</td>
                            <td>{{ $newsList->active ? 'Active' : 'Disabled' }}</td>
                            <td>
                                <div class="buttons has-addons">
                                    <a class="button is-info" href="{{ route('admin.news_lists.edit', $newsList->id) }}">
                                        edit </a>
                                    <span class="modal-open button is-danger" status-name="Confirm Delete"
                                        traget-modal=".delete-modal" data_id="{{ $newsList->id }}"
                                        data_name="{{ $newsList->title }}"
                                        data-url="{{ route('admin.news_lists.destroy', $newsList->id) }}">Delete</span>
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
      {{  $news->links('vendor.pagination.bulma') }}
    </div><!-- End Card Footer -->
  </div><!-- End Card -->
  <!-- Include Modals -->
  @include('admin.partials.deleteModal')
@endsection<!-- End Content Section -->
