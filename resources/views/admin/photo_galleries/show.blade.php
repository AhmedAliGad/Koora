@extends('admin.layouts.app')

@section('page.title', 'Add Photos '.' : '.$photoGallery->title)

@section('content')
    <div class="card">
        <section class="section main-block">
            <h1 class="title"><a href="{{ route('admin.photo_galleries.index') }}" class="button">
                    <span class="icon is-small"><i class="fa fa-camera"></i></span>
                    <span>Galleries List</span>
                </a></h1>
            {!! Form::open(['method' => 'POST','files' => true, 'route' => ['admin.photo_galleries.photos.store', $photoGallery->id]]) !!}
            <div class="card-content">
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label required">Choose Gallery Photos</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <div class="is-fullwidth">
                                    <uploader accept="image" label="Choose Photos" name="photos[]" :is-multiple="true"></uploader>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="buttons has-addons">
                        <button type="submit" class="button is-success">Save</button>
                    </div>
                </div><!-- End Card Footer -->
                {!! Form::close() !!}
            <div class="columns is-multiline m-t-30">
                @foreach($photos as $photo)
                    <div class="column is-3">
                        <div class="card">
                            <div class="card-image">
                                <figure class="image is-4by3">
                                    <img src="{{ $photo->image }}" alt="Placeholder image">
                                </figure>
                            </div>
                            <footer class="card-footer">
                                <span class="modal-open card-footer-item has-text-danger has-text-weight-bold" traget-modal=".delete-modal" data_id="{{ $photo->id }}" data_name="Photo" data-url="{{ route('admin.photo_galleries.photos.destroy', [$photoGallery->id, $photo->id]) }}">Delete</span>
                            </footer>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
    @include('admin.partials.deleteModal')
@endsection
