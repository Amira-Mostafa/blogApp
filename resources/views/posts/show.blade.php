@extends('layouts.template')
@section('title', 'Show Posts')
@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3 p-1">
                <div class="card-header bg-white ra">
                    <h4 class="card-title">{{ $posts->title}}</h4>
                    @foreach($posts->tags as $tag)
                    <a href=""><span class="badge bg-secondary">{{ $tag->title}}</span></a>
                    @endforeach
                    <p class="card-text py-2">{{ $posts->content}}</p>
                </div>
                <div class="card-body mx-auto">
                    <a href="{{ route('showPost',$posts->id) }}">
                        <img src="{{ asset('assets/images/' . $posts->thumbnail) }}" class="img-fluid thumbnail" id="thumbnail" alt="{{ $posts->title}}">
                    </a>
                    <div class="card mt-3 p-3">
                        <h5>Add a Comment</h5>
                        @if (session('status') == 'success')
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                        @endif

                        <form action="{{ route('storeComment', $posts->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="content">Your Comment</label>
                                <textarea name="content" id="content" rows="3" class="form-control"></textarea>
                                @error('content')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        </form>
                    </div>
                    @if($posts->comments->count() > 0 )
                    <div class="card mt-3 p-3">
                        @foreach($posts->comments as $comment)
                        <div class="comment mb-2">
                            <p><span><strong>
                                        {{ $comment->user->username }}
                                </span></strong> :
                                <span>{{ $comment->content }} </span>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection