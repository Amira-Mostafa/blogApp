@extends('layouts.template')
@section('title', 'Home')
@section('content')


@if($posts->isEmpty())
<div class="alert alert-warning text-center">
    No posts found.
</div>
@else

@foreach($posts as $post)
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3 p-1">
                <div class="card-header bg-white ra">
                    <h4 class="card-title">{{ $post->title}}</h4>
                    @foreach($post->tags as $tag)
                    <a href=""><span class="badge bg-secondary">{{ $tag->title}}</span></a>
                    @endforeach
                    <p class="card-text py-2">{{ $post->content}}</p>
                </div>
                <div class="card-body mx-auto">
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
@endif

@endsection