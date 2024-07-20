@extends('layouts.template')
@section('title', 'Create Post')
@section('content')

@if (session('status'))
<div class="alert alert-warning text-center">
    {{ session('message') }}
</div>
@endif

<div class="container my-5">
    <h1>Create Post</h1>
    <br>
    <form action="{{ route('storePost') }}" method="post" enctype="multipart/form-data" id="form">
        @csrf
        <div class="item form-group">
            <label class="col-form-label" for="title">Title<span class="required">*</span></label>
            <div class="col-md-9 col-sm-9">
                <input class="form-control" type="text" id="title" name="title" value="{{ old('title') }}">
                <div class="alert alert-warning d-none" id="titleError"></div>
                @error('title')
                <div class="alert alert-warning">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-9" for="tag">Add Tags</label>
            <div class="col-md-9">
                <select class="form-control capsole" name="tag_id" id="tag_id">
                    <option value="">Select a Tag</option>
                    @foreach($tags as $tag)
                    <option value="{{ $tag->id}}" {{ (old("tag_id") == $tag->id) ? 'selected' : ''   }} required>{{ $tag->title }}</option>
                    @endforeach
                </select>
                <div class="alert alert-warning d-none" id="tag_id_Error"></div>
                @error('tag_id')
                <div class="alert alert-warning">
                    {{ $message}}
                </div>
                @enderror

            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label" for="content">Content<span class="required">*</span></label>
            <div class="col-md-9">
                <textarea class="form-control" id="content" name="content" id="content">{{old('content')}}</textarea>
                <div class="alert alert-warning d-none" id="contentError"></div>
                @error('content')
                <div class="alert alert-warning">
                    {{ $message}}
                </div>
                @enderror

            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-sm-3 label-align" for="thumbnail">Add Thumbnail<span class="required">*</span></label>
            <div class="col-md-9">
                <input type="file" class="form-control" id="thumbnail" value="{{ old('thumbnail') }}" name="thumbnail">
                <div class="alert alert-warning d-none" id="thumbnailError"></div>
                @error('thumbnail')
                <div class="alert alert-warning">
                    {{ $message}}
                </div>
                @enderror

            </div>
        </div>

        <br><br>
        <div class="item form-group offset offset-md-4">
            <button class="btn btn-success">Publish</button>
        </div>
    </form>
</div>


@endsection