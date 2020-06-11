@extends('layouts.app')

@section('title')
    Edit post
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h1>Edit post</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                @include('includes.form_errors')
                <form action="{{action('PostController@update',$post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <input type="file" class="form-control-file" name="photo">
                    </div>
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" placeholder="Title" name="title" value="{{$post->title}}">
                    </div>
                    <div class="form-group">
                        <label for="body">Post:</label>
                        <textarea name="body" id="body" cols="30" rows="10" class="form-control" placeholder="Post" >{{$post->body}}</textarea>
                    </div>
                    <input type="submit" class="btn rounded-pill btn-outline-success" value="Post">
                </form>

            </div>
        </div>
    </div>
@endsection
