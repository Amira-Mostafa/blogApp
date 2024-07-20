@extends('layouts.template')
@section('title', 'MyPosts')
@section('content')

@if (session('message'))
<div class="alert alert-{{ session('status') }} text-center">
    {{ session('message') }}
</div>
@endif

@foreach($posts as $post)
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3 p-3">
                <div class="row card-header bg-white ra">
                    <div class="col-md-9">
                        <h4 class="card-title">{{ $post->title}}</h4>
                        @foreach($post->tags as $tag)
                        <a href=""><span class="badge bg-secondary">{{ $tag->title}}</span></a>
                        @endforeach
                        <p class="card-text py-2">{{ $post->content}}</p>
                    </div>

                    <div class=" col-md-3">
                        <a href="{{ route('editPost', $post->id)}}" class="btn btn-danger">Edit</a>
                        <a href="{{ route('deletePost', $post->id )}}" class="btn btn-danger">Delete</a>
                    </div>
                </div>

                <div class="card-body ml-5">
                    <a href="{{ route('showPost', $post->id) }}">
                        <img src="{{ asset('assets/images/' . $post->thumbnail) }}" class="img-fluid thumbnail" id="thumbnail" alt="{{ $post->title}}">
                    </a>
                    <div class="text-center">
                        <a href="{{ route('showPost', $post->id) }}">
                            <span class="badge rounded-pill text-bg-dark mt-3" id="pill">Comments</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection