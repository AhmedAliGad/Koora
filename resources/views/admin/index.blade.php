<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'Home')
<!-- Start Content Section -->
@section('content')
    <!-- Start Top Cards -->
    <div class="columns is-multiline">
        <div class="column is-3">
            <div class="flex-card">
                <div class="p-4 text-white has-background-primary">
                    <div class="icon-header">
                        <span class="icon-header-body">
                            <i class="fas fa-users"></i>
                        </span>
                    </div>
                    <span class="has-text-white has-text-weight-bold">App Pharmacies</span>
                </div>
                <div class="content">
                    <div class="card-title is-tile is-styled has-text-right">
                        <div class="card-stat accent has-text-right is-size-4 has-text-weight-bold">
                            {{ \App\Models\User::where('role', 'client')->count() }}</div>
                    </div>
                    <div class="mt-2 more">
                        <a class="accent" href="{{ route('admin.users.index') }}">more</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-3">
            <div class="flex-card">
                <div class="p-4 text-white has-background-primary">
                    <div class="icon-header">
                        <span class="icon-header-body">
                            <i class="fa fa-id-badge"></i>
                        </span>
                    </div>
                    <span class="has-text-white has-text-weight-bold">Staff Members</span>
                </div>
                <div class="content">
                    <div class="card-title is-tile is-styled has-text-right">
                        <div class="card-stat accent has-text-right is-size-4 has-text-weight-bold">
                            {{ \App\Models\User::whereIn('role', ['admin', 'agent'])->count() }}</div>
                    </div>
                    <div class="mt-2 more">
                        <a class="accent" href="{{ route('admin.admins.index') }}">more</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-3">
            <div class="flex-card">
                <div class="p-4 text-white has-background-primary">
                    <div class="icon-header">
                        <span class="icon-header-body">
                            <i class="fa fa-map-location"></i>
                        </span>
                    </div>
                    <span class="has-text-white has-text-weight-bold">Cities List</span>
                </div>
                <div class="content">
                    <div class="card-title is-tile is-styled has-text-right">
                        <div class="card-stat accent has-text-right is-size-4 has-text-weight-bold">{{ \App\Models\City::count() }}</div>
                    </div>
                    <div class="mt-2 more">
                        <a class="accent" href="{{ route('admin.cities.index') }}">more</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-3">
            <div class="flex-card">
                <div class="p-4 text-white has-background-primary">
                    <div class="icon-header">
                        <span class="icon-header-body">
                            <i class="fa fa-clock"></i>
                        </span>
                    </div>
                    <span class="has-text-white has-text-weight-bold">Working Hours</span>
                </div>
                <div class="content">
                    <div class="card-title is-tile is-styled has-text-right">
                        <div class="card-stat accent has-text-right is-size-4 has-text-weight-bold">{{ \App\Models\WorkingHour::count() }}</div>
                    </div>
                    <div class="mt-2 more">
                        <a class="accent" href="{{ route('admin.working_hours.index') }}">more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Top Cards -->
    <!-- End Bottom Cards And Charts -->
    <!-- End Content Section -->
@endsection
