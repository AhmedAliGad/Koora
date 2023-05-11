@extends('admin.layouts.app')

@section('page.title', 'Working Hours ')

@section('content')

  <div class="card main-card">
      <div class="card-header">
          <div>
            <span class="icon is-small">
              <i class="fa fa-clock"></i>
            </span>
           <span>Working Hours</span>
          </div>
      </div>
    <div class="card-content">
      <div class="table-container">
        <table class="table is-fullwidth" id="areas">
          <thead>
          <tr>
              <th>Day</th>
              <th>From</th>
              <th>To</th>
              <th>Actions</th>
          </tr>
          </thead>
          <tbody>
          @foreach($hours as $hour)
            <tr>
                <td>{{ $hour->day }}</td>
                <td>{{ date('h:i a', strtotime($hour->from)) }}</td>
                <td>{{ date('h:i a', strtotime($hour->to)) }}</td>
              <td>
                <div class="buttons has-addons">
                    <a class="button is-primary" href="{{ route('admin.working_hours.edit', $hour->id) }}">Edit</a>
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
@endsection



