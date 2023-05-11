@extends('admin.layouts.app')

@section('page.title', 'Cities List')

@section('content')

  <div class="card main-card">
    <div class="card-header">
      <a href="{{ route('admin.cities.create') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-plus-circle"></i>
        </span>
        <span>Add City</span>
      </a>
    </div>
    <div class="card-content">
      <div class="table-container">
        <table class="table is-fullwidth" id="cities">
          <thead>
          <tr>
              <th>Name</th>
              <th>Areas</th>
              <th>Status</th>
              <th>Actions</th>
          </tr>
          </thead>
          <tbody>
          @foreach($cities as $city)
            <tr>
                <td>{{ $city->name_en }}</td>
                <td>{{ $city->areas_count }}</td>
                <td>{{ $city->active ? 'Active' : 'Disabled' }}</td>
              <td>
                <div class="buttons has-addons">
                    <a class="button is-success" target="_blank" href="{{ route('admin.cities.areas.index', $city->id) }}">Areas</a>
                  <a class="button is-info" href="{{ route('admin.cities.edit', $city->id) }}">Edit</a>
                </div>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <footer class="card-footer">
        {{ $cities->links('vendor.pagination.bulma') }}
    </footer>
  </div>
  @include('admin.partials.deleteModal')
@endsection



