@extends('layouts.app')

@section('title')
    Create post
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h1>Create post</h1>
                <a href="{{route('posts.index')}}" class="btn btn-outline-info rounded-pill mb-5">All posts</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                @include('includes.form_errors')
                <form action="{{action('PostController@store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <input type="file" class="form-control-file" name="photo">
                    </div>
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" placeholder="Title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="body">Post:</label>
                        <textarea name="body" id="body" cols="30" rows="10" class="form-control" placeholder="Post"></textarea>
                    </div>
                    <input type="submit" class="btn rounded-pill btn-outline-success" value="Post">
                </form>

            </div>
        </div>
    </div>
@endsection
