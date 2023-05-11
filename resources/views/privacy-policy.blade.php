@extends('admin.layouts.app')
@section('page.title', 'Privacy Policy')
@section('content')
    <div class="">
        <div >
            {!! \App\Models\Setting::first()->privacy_ar ?: '' !!}
        </div>
    </div>
@endsection
