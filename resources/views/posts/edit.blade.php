@extends('layouts.template')
@section('title', 'Edit Post')
@section('content')

<div class="container my-5">
    <h1>Create Post</h1>
    <br>
    <form action="{{ route('updatePost', $post->id) }}" id="form" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
        @csrf
        @method('put')

        <div class="item form-group">
            <label class="col-form-label" for="title">Title<span class="required">*</span></label>
            <div class="col-md-9 col-sm-9">
                <input class="form-control" id="title" type="text" name="title" value="{{ $post->title }}">
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
                <select class="form-control capsole" id="tag_id" name="tag_id" id="">
                    <option value="">Select a Tag</option>
                    @foreach($tags as $tag)
                    <option value="{{ $tag->id}}" @if($post->tags->contains($tag->id)) selected @endif required>{{ $tag->title }}</option>
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
                <textarea class="form-control" name="content" id="content">{{ $post->content}}</textarea>
                <div class="alert alert-warning d-none" id="contentError"></div>
                @error('content')
                <div class="alert alert-warning">
                    {{ $message}}
                </div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="item form-group col-md-6">
                <label class="col-form-label col-md-6 col-sm-6 label-align" for="image">thumbnail<span class="required">*</span>
                    <div class="">
                        <input type="file" class="form-control" id="thumbnail" placeholder="thumbnail" name="thumbnail" value="{{ old('thumbnail') }}">
                        @error('thumbnail')
                        <div class="alert alert-warning">
                            {{$message}}
                        </div>
                        @enderror
                        <br>
                        <img src="{{asset('assets/images/'.$post->thumbnail)}}" class="img-fluid" alt="">
                    </div>
            </div>
            <div class="item form-group col-md-6">
                <label class="col-form-label col-form-label col-md-6 col-sm-6 label-align">Unpublish Post</label>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="published" class="flat" @checked($post->published)>
                    </label>
                </div>
            </div>
        </div>


        <br><br>
        <div class="item form-group offset offset-md-4">
            <button class="btn btn-success">Update</button>
        </div>
    </form>
</div>


@endsection