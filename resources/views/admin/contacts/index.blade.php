@extends('admin.layouts.app')

@section('page.title', 'Contact Messages')

@section('content')

    <div class="card main-card">
        <div class="card-header">
            <div>
                <span class="icon is-small">
                  <i class="fa fa-envelope"></i>
                </span>
                <span>Contact Messages</span>
            </div>
        </div>
        <div class="card-content">
            <div class="table-container">
                <table class="table is-fullwidth">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></td>
                            <td>
                                <div class="buttons has-addons">
                                    <a class="button is-info" href="{{ route('admin.contact_messages.show', $contact->id) }}"> Show </a>
                                    <span class="modal-open button is-danger" traget-modal=".delete-modal" data_id="{{ $contact->id }}" data_name="{{ $contact->name }}" data-url="{{ route('admin.contact_messages.destroy', $contact->id) }}">Delete</span>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <footer class="card-footer with-pagination">
            {{ $contacts->links('vendor.pagination.bulma') }}
        </footer>
    </div>
    @include('admin.partials.deleteModal')
@endsection


