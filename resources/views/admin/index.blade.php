<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'Dashboard')
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
                    <span class="has-text-white has-text-weight-bold">Teams</span>
                </div>
                <div class="content">
                    <div class="card-title is-tile is-styled has-text-right">
                        <div class="card-stat accent has-text-right is-size-4 has-text-weight-bold">
                            {{ \App\Models\Team::count() }}</div>
                    </div>
                    <div class="mt-2 more">
                        <a class="accent" href="{{ route('admin.teams.index') }}">more</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-3">
            <div class="flex-card">
                <div class="p-4 text-white has-background-primary">
                    <div class="icon-header">
                        <span class="icon-header-body">
                            <i class="fa fa-images"></i>
                        </span>
                    </div>
                    <span class="has-text-white has-text-weight-bold">Sliders</span>
                </div>
                <div class="content">
                    <div class="card-title is-tile is-styled has-text-right">
                        <div class="card-stat accent has-text-right is-size-4 has-text-weight-bold">
                            {{ \App\Models\Slider::count() }}</div>
                    </div>
                    <div class="mt-2 more">
                        <a class="accent" href="{{ route('admin.sliders.index') }}">more</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-3">
            <div class="flex-card">
                <div class="p-4 text-white has-background-primary">
                    <div class="icon-header">
                        <span class="icon-header-body">
                            <i class="fa fa-handshake"></i>
                        </span>
                    </div>
                    <span class="has-text-white has-text-weight-bold">Partners</span>
                </div>
                <div class="content">
                    <div class="card-title is-tile is-styled has-text-right">
                        <div class="card-stat accent has-text-right is-size-4 has-text-weight-bold">{{ \App\Models\Partner::count() }}</div>
                    </div>
                    <div class="mt-2 more">
                        <a class="accent" href="{{ route('admin.partners.index') }}">more</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-3">
            <div class="flex-card">
                <div class="p-4 text-white has-background-primary">
                    <div class="icon-header">
                        <span class="icon-header-body">
                            <i class="fa fa-soccer-ball"></i>
                        </span>
                    </div>
                    <span class="has-text-white has-text-weight-bold">Upcoming Matches</span>
                </div>
                <div class="content">
                    <div class="card-title is-tile is-styled has-text-right">
                        <div class="card-stat accent has-text-right is-size-4 has-text-weight-bold">{{ \App\Models\UpcomingMatch::count() }}</div>
                    </div>
                    <div class="mt-2 more">
                        <a class="accent" href="{{ route('admin.upcoming_matches.index') }}">more</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-3">
            <div class="flex-card">
                <div class="p-4 text-white has-background-primary">
                    <div class="icon-header">
                        <span class="icon-header-body">
                            <i class="fa fa-newspaper"></i>
                        </span>
                    </div>
                    <span class="has-text-white has-text-weight-bold">News</span>
                </div>
                <div class="content">
                    <div class="card-title is-tile is-styled has-text-right">
                        <div class="card-stat accent has-text-right is-size-4 has-text-weight-bold">{{ \App\Models\NewsList::count() }}</div>
                    </div>
                    <div class="mt-2 more">
                        <a class="accent" href="{{ route('admin.news_lists.index') }}">more</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-3">
            <div class="flex-card">
                <div class="p-4 text-white has-background-primary">
                    <div class="icon-header">
                        <span class="icon-header-body">
                            <i class="fa fa-camera"></i>
                        </span>
                    </div>
                    <span class="has-text-white has-text-weight-bold">Photo Galleries</span>
                </div>
                <div class="content">
                    <div class="card-title is-tile is-styled has-text-right">
                        <div class="card-stat accent has-text-right is-size-4 has-text-weight-bold">{{ \App\Models\PhotoGallery::count() }}</div>
                    </div>
                    <div class="mt-2 more">
                        <a class="accent" href="{{ route('admin.photo_galleries.index') }}">more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Top Cards -->
    <!-- End Bottom Cards And Charts -->
    <!-- End Content Section -->
@endsection
