@extends('admin.layouts.app')

@section('page.title', 'Member Info')

@section('content')
    <div class="card main-card">
        <div class="card-header">
            <a href="{{ route('admin.admins.index') }}" class="button is-success">
                <span class="icon is-small"><i class="fa fa-id-badge"></i></span>
                <span>Members List</span>
            </a>
        </div>
        <div class="card-content">
            <div class="columns is-vcentered">
                <div class="column is-12">
                    <div class="info-content">
                        <div class="info">
                            <label class="label">Name </label>
                            <span class="value">{{ $admin->name }}</span>
                        </div>
                        <div class="info">
                            <label class="label">Phone </label>
                            <span class="value">{{ $admin->phone ?: ' - - ' }}</span>
                        </div>
                        <div class="info">
                            <label class="label">Email </label>
                            <span class="value">{{ $admin->email }}</span>
                        </div>
                        <div class="info">
                            <label class="label">Role </label>
                            <span class="value">{{ $admin->role ? ucfirst($admin->role) : ' - - ' }}</span>
                        </div>
                        <div class="info">
                            <label class="label">Status </label>
                            <span class="value">{{ $admin->active ? 'Active' : 'Inactive' }}</span>
                        </div>
                        <div class="info">
                            <label class="label">Register Date </label>
                            <span class="value">{{ $admin->created_at->toDayDateTimeString() }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="columns is-multiline">
                <div class="column is-3-desktop is-6-tablet">
                    <div class="box">
                        <div class="mb-4 is-flex is-align-items-center">
                            <h3 class="is-size-6"><strong>Total Calls</strong></h3>
                        </div>
                        <h3 class="mb-4 is-size-3 has-text-weight-bold">{{ count($admin->videoCalls) }}</h3>
                        <div class="has-text-danger is-align-center">
                <span class="mr-2 is-inline-block">
                    <a class="accent" href="{{ route('admin.admins.show', $admin->id) }}">more <i class="fa fa-arrow-circle-right"></i></a>
                </span>
                        </div>
                    </div>
                </div>

                <div class="column is-3-desktop is-6-tablet">
                    <div class="box">
                        <div class="mb-4 is-flex is-align-items-center">
                            <h3 class="is-size-6"><strong>Total Calls Time</strong></h3>
                        </div>
                        <h3 class="mb-4 is-size-3 has-text-weight-bold">{{ $admin->videoCalls->sum('duration_time') }}</h3>
                        <div class="has-text-danger is-align-center">
                <span class="mr-2 is-inline-block">
                    <a class="accent" href="{{ route('admin.admins.show', $admin->id) }}">more <i class="fa fa-arrow-circle-right"></i></a>
                </span>
                        </div>
                    </div>
                </div>
            </div>
<!--            <div class="columns is-multiline">
                <div class="column is-12">
                    <div class="p-4 card main-card box">
                        <div class="card-header">
                            <h4 class="header-title">{{ $admin->name.' ' }}Calls List</h4>
                            <hr class="m-0" />
                        </div>
                        <div class="card-content">
                            <div class="table-container">
                                <table class='table is-fullwidth is-hoverable'>
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Priority</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($admin->videoCalls as $ticket)
                                        <tr>
                                            <td>{{ $ticket->title }}</td>
                                            <td>{{ $ticket->category ? $ticket->category->name : ' -  - ' }}</td>
                                            <td>{{ $ticket->status->name }}</td>
                                            <td>{{ $ticket->priority ? $ticket->priority->name : ' -  - ' }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
@endsection



