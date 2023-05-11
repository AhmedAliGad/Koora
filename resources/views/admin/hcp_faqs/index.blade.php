@extends('admin.layouts.app')

@section('page.title', 'HCP FAQ')

@section('content')

  <div class="card main-card">
    <div class="card-header">
      <a href="{{ route('admin.hcp_faqs.create') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-plus-circle"></i>
        </span>
        <span>Add Question</span>
      </a>
    </div>
    <div class="card-content">
      <div class="table-container">
        <table class="table is-fullwidth" id="faqs">
          <thead>
          <tr>
              <th>Question</th>
              <th>Status</th>
              <th>Actions</th>
          </tr>
          </thead>
          <tbody>
          @foreach($faqs as $type)
            <tr>
                <td>{{ $type->question_en }}</td>
                <td>{{ $type->active ? 'Active' : 'Disabled' }}</td>
              <td>
                <div class="buttons has-addons">
                  <a class="button is-info" href="{{ route('admin.hcp_faqs.edit', $type->id) }}">Edit</a>
                    <span class="modal-open button is-danger" status-name="Confirm Delete"  traget-modal=".delete-modal" data_id="{{ $type->id }}" data_name="{{ $type->question_en }}" data-url="{{ route('admin.hcp_faqs.destroy', $type->id) }}">Delete</span>
                </div>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <footer class="card-footer">
        {{ $faqs->links('vendor.pagination.bulma') }}
    </footer>
  </div>
  @include('admin.partials.deleteModal')
@endsection



