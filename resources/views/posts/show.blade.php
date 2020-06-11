@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-md-1 d-flex flex-column align-items-center border rounded bg-white p-4">
                <h1>{{$post->title}}</h1>
                <img src="{{asset('/storage/posts/'.$post->photo->file)}}" alt="" height="500" class="my-4">
                <p class="p-3">{{$post->body}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h3 class="my-3">Comments:</h3>
                <p class="all">Open all threads</p>
                <p class="allClose">Close all threads</p>
                {{--@php($teller = 0)--}}
                @include('includes.form_errors')
                @include('includes.replies',['comments'=>$post->comments, 'post_id'=>$post->id])
                {{--<p class="allClose"><i class="fas fa-arrow-alt-from-bottom"></i>Close thread</p>--}}
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 offset-md-1 mt-4 border rounded bg-white p-4">
                <form action="{{action('CommentController@store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <input type="hidden" value="{{$post->id}}" name="post_id">
                        <label for="comment">Comment on this post:</label>
                        <textarea name="body" id="comment" cols="30" rows="10" class="form-control"
                                  placeholder="Write your comment here"></textarea>
                    </div>
                    <input type="submit" value="Post" class="btn btn-outline-success">
                </form>
            </div>
        </div>
    </div>
@endsection
