@extends('admin.layouts.app')

@section('page.title', 'View Message')

@section('content')
<div class="card main-card">
    <div class="card-header">
        <a href="{{ route('admin.contact_messages.index') }}" class="button is-success">
        <span class="icon is-small"><i class="fa fa-envelope"></i></span>
            <span>Contact Messages</span>
        </a>
    </div>
    <div class="card-content">
        <collapse class="outer" accordion is-fullwidth>
            <collapse-item title="Content" icon="fa fa-envelope-open" selected>
                <div class="columns is-vcentered">
                    <div class="column is-12">
                        <div class="info-content">
                            <div class="info">
                                <label class="label">Name</label>
                                <span class="value">{{ $contactMessage->name }}</span>
                            </div>
                            <div class="info">
                                <label class="label">Phone</label>
                                <span class="value"><a href="tel:{{ $contactMessage->phone }}">{{ $contactMessage->phone }}</a></span>
                            </div>
                            <div class="info">
                                <label class="label">E-mail</label>
                                <span class="value"><a href="mailto:{{ $contactMessage->email }}">{{ $contactMessage->email }}</a></span>
                            </div>
                            <div class="info">
                                <label class="label">Content </label>
                                <span class="value">{{ $contactMessage->content }}</span>
                            </div>
                            <div class="info right-buttons">
                                <ul>
                                    <li class=" tooltip is-tooltip-left" data-tooltip="Message Date">
                                        <div class="available">
                                            {{ $contactMessage->created_at->toDayDateTimeString() }}
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </collapse-item>
        </collapse>
    </div>
</div>
@endsection
