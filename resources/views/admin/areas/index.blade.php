@extends('admin.layouts.app')

@section('page.title', $city->name_en.' Areas List')

@section('content')

  <div class="card main-card">
    <div class="card-header">
      <a href="{{ route('admin.cities.areas.create', $city->id) }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-plus-circle"></i>
        </span>
        <span>Add Area</span>
      </a>
    </div>
    <div class="card-content">
      <div class="table-container">
        <table class="table is-fullwidth" id="areas">
          <thead>
          <tr>
              <th>Name</th>
              <th>Status</th>
              <th>Actions</th>
          </tr>
          </thead>
          <tbody>
          @foreach($areas as $area)
            <tr>
                <td>{{ $area->name_en }}</td>
                <td>{{ $area->active ? 'Active' : 'Disabled' }}</td>
              <td>
                <div class="buttons has-addons">
                    <a class="button is-primary" href="{{ route('admin.cities.areas.edit', [$city->id, $area->id]) }}">Edit</a>
                    <span class="modal-open button is-danger" status-name="Confirm Delete"  traget-modal=".delete-modal" data_id="{{ $area->id }}" data_name="{{ $area->name_en }}" data-url="{{ route('admin.cities.areas.destroy', [$city->id, $area->id]) }}">Delete</span>
                </div>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <footer class="card-footer">
    </footer>
  </div>
  @include('admin.partials.deleteModal')
@endsection



