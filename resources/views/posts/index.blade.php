@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h1>Posts</h1>
                <p>Click on a post to read comments</p>
                <a href="{{route('posts.create')}}" class="btn btn-outline-info rounded-pill mb-5">Create new post</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-1 d-flex flex-wrap">
                @if($posts)
                    @foreach($posts as $post)
                        <div class="card m-4" style="width: 18rem;">
                            <img src="{{asset('storage/posts/'.$post->photo->file)}}" class="card-img-top" alt="">
                            <div class="card-body d-flex flex-column justify-content-end">
                                <h5 class="card-title">{{$post->title}}</h5>
                                <p class="card-text">{{$post->body}}</p>
                                <a href="{{route('posts.show', $post->id)}}" class="btn btn-primary mb-1">View post</a>
                                @if($post->user_id === Auth::id())
                                    <a href="{{route('posts.edit', $post->id)}}" class="btn btn-success">Edit post</a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div>
@endsection
