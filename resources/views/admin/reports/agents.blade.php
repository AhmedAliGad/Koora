<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'Reports - Report of Agents')
<!-- Start Content Section -->
@section('content')
    <!-- Start Card -->
    <div class="card main-card">
        <!-- Start Card Header -->
        <div class="card-header is-justify-content-space-between">
        </div>
        <!-- End Card Header -->
        <div class="card-content">
            <form action="{{ route(Request::route()->getName()) }}" method="get">
                <div class="columns is-vcentered">
                    <div class="column is-6">
                        <div class="column is-4-desktop is-6-tablet">
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Pharmacy</label>
                                </div>
                                <div class="field-body select">
                                    <div class="field">
                                        <div class="control">
                                            <select class="input select" name="user_id">
                                                <option value="">All</option>
                                                @foreach($pharmacies as $pharmacy)
                                                    <option value="{{ $pharmacy->id }}">{{ $pharmacy->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-4-desktop is-6-tablet">
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Agent</label>
                                </div>
                                <div class="field-body select">
                                    <div class="field">
                                        <div class="control">
                                            <select class="input select" name="admin_id">
                                                <option value="">All</option>
                                                @foreach($agents as $agent)
                                                    <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-4-desktop is-6-tablet">
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Call Duration</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        {!! Form::number('duration_from', null, ['class' => 'input', 'placeholder' => 'From'] )!!}
                                    </div>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        {!! Form::number('duration_to', null, ['class' => 'input', 'placeholder' => 'To'] )!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="column is-4-desktop is-6-tablet">
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Rating</label>
                                </div>
                                <div class="field-body select">
                                    <div class="field">
                                        <div class="control">
                                            <select class="input select" name="rating">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-4-desktop is-6-tablet">
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Date</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        {!! Form::date('date_from', null, ['class' => 'input'] )!!}
                                    </div>
                                    <div class="field">
                                        {!! Form::date('date_to', null, ['class' => 'input'] )!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-3-desktop is-6-tablet">
                            <div class="field is-horizontal">
                                <div class="field-label">
                                    <button class="button is-success">Search</button>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div>
                                            <a href="{{ route('admin.calls_report') }}" class="button is-primary">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <hr />
            <div class="columns is-multiline">
                <div class="column is-3-desktop is-6-tablet">
                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div>
                                    <label>{{ count($agents) }}<span>  Records were found</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-3-desktop is-6-tablet">
                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div>
                                    <a target="_blank" href="{{ route('admin.calls_chart') }}" class="button is-primary">Visualize</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-3-desktop is-6-tablet">
                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div>
                                    <form action="{{ route('admin.calls_export', request()->query()) }}" method="post">
                                        @csrf
                                        <div class="field has-addons">
                                            <input type="submit" value="Export to Excel" class="button is-primary" name="submitBtn" onclick="this.form.submit();">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-container">
                <table class="table is-fullwidth">
                    <thead>
                    <tr>
                        <th>Agent Name</th>
                        <th>Status</th>
                        <th>Number of Calls</th>
                        <th>Total Duration</th>
                        <th>Details</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($agents as $agent)
                        <tr>
                            <td>{{ $agent->name }}</td>
                            <td>{{ $agent->status }}</td>
                            <td>{{ count($agent->agentCalls) }}</td>
                            <td>{{ gmdate("H:i:s", $agent->agentCalls->sum('duration_time')) }}</td>
                            <td>
                                <div class="buttons has-addons">
                                    <a class="button is-success" target="_blank" href="{{ route('admin.user_calls', $agent->id) }}">Show</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer with-pagination">
        </div>
    </div>
    <!-- End Card -->

    <!-- Include Modals -->
    @include('admin.partials.deleteModal')
@endsection<!-- End Content Section -->