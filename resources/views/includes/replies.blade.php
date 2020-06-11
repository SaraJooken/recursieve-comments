@if($comments)

    @foreach($comments as $comment)
        @if($loop->depth <=3)
            <div class="mt-4 border border-dark rounded {{$loop->depth %2 != 0 ? 'bg-white': 'bg-grey'}} p-4">
                <p class="font-weight-bold"><i class="fas fa-user fa-2x mr-2"></i>{{$comment->user->name}}</p>
                <p>{{$comment->body}}</p>
                @if($comment->user->id === Auth::id())
                    <a class="btn btn-success rounded-0 mb-1" data-toggle="collapse" href="#collapseExample"
                       role="button" aria-expanded="false" aria-controls="collapseExample">
                        Edit comment
                    </a>
                    <div class="collapse" id="collapseExample">
                        <form action="{{action('CommentController@update', $comment->id)}}" method="POST"
                              enctype="multipart/form-data" class="border p-3 bg-white">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="comment">Edit this comment:</label>
                                <textarea name="body" id="comment" cols="30" rows="1" class="form-control"
                                          placeholder="Write your comment here">{{$comment->body}}</textarea>
                            </div>
                            <input type="submit" value="Post" class="btn btn-outline-dark">
                        </form>
                    </div>
                @endif
                <form action="{{action('CommentController@store')}}" method="POST" enctype="multipart/form-data"
                      class="border p-3 bg-dark text-white">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <input type="hidden" value="{{$comment->id}}" name="parent_id">
                        <label for="comment">Reply to this comment:</label>
                        <textarea name="body" id="comment" cols="30" rows="1" class="form-control"
                                  placeholder="Write your reply here"></textarea>
                    </div>
                    <input type="submit" value="Post" class="btn btn-outline-light">
                </form>
                @include('includes.replies',['comments'=>$comment->replies])
            </div>
        @else
            <div class="dit-element">
                <p class="more font-weight-bold"><i class="fas fa-arrow-alt-from-top mr-2"></i>Show more...</p>
                <p class="less font-weight-bold"><i class="fas fa-arrow-alt-from-bottom mr-2"></i>Show less...</p>
                <div
                    class="mt-4 border border-dark rounded {{$loop->depth %2 != 0 ? 'bg-white': 'bg-grey'}} p-4 thread">
                    <p class="font-weight-bold"><i class="fas fa-user fa-2x mr-2"></i>{{$comment->user->name}}</p>
                    <p>{{$comment->body}}</p>
                    @if($comment->user->id === Auth::id())
                        <a class="btn btn-success rounded-0 mb-1" data-toggle="collapse" href="#collapseExample"
                           role="button" aria-expanded="false" aria-controls="collapseExample">
                            Edit comment
                        </a>
                        <div class="collapse" id="collapseExample">

                            <form action="{{action('CommentController@update', $comment->id)}}" method="POST"
                                  enctype="multipart/form-data" class="border p-3 bg-white">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="comment">Edit this comment:</label>
                                    <textarea name="body" id="comment" cols="30" rows="1" class="form-control"
                                              placeholder="Write your comment here">{{$comment->body}}</textarea>
                                </div>
                                <input type="submit" value="Post" class="btn btn-outline-dark">
                            </form>

                        </div>
                    @endif
                    <form action="{{action('CommentController@store')}}" method="POST" enctype="multipart/form-data"
                          class="border p-3 bg-dark text-white">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <input type="hidden" value="{{$comment->id}}" name="parent_id">
                            <label for="comment">Reply to this comment:</label>
                            <textarea name="body" id="comment" cols="30" rows="1" class="form-control"
                                      placeholder="Write your reply here"></textarea>
                        </div>
                        <input type="submit" value="Post" class="btn btn-outline-light">
                    </form>
                    @include('includes.replies',['comments'=>$comment->replies])
                </div>
            </div>
        @endif
    @endforeach
@endif
{{--@if($comments)
    @php($tel = 0)
    @foreach($comments as $comment)
            @php($teller += 1)
            <div class="mt-4 border border-dark rounded {{$loop->depth %2 != 0 ? 'bg-white': 'bg-grey'}} p-4">
                <p class="font-weight-bold"><i class="fas fa-user fa-2x mr-2"></i>{{$comment->user->name}}</p>
                <p>{{$comment->body}}</p>
                @if($comment->user->id === Auth::id())
                    <a class="btn btn-success rounded-0 mb-1" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Edit comment
                    </a>
                    <div class="collapse" id="collapseExample">
                        <form action="{{action('CommentController@update', $comment->id)}}" method="POST" enctype="multipart/form-data" class="border p-3 bg-white">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="comment">Edit this comment:</label>
                                <textarea name="body" id="comment" cols="30" rows="1" class="form-control" placeholder="Write your comment here">{{$comment->body}}</textarea>
                            </div>
                            <input type="submit" value="Post" class="btn btn-outline-dark">
                        </form>
                    </div>
                @endif
                <form action="{{action('CommentController@store')}}" method="POST" enctype="multipart/form-data" class="border p-3 bg-dark text-white">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <input type="hidden" value="{{$comment->id}}" name="parent_id">
                        <label for="comment">Reply to this comment:</label>
                        <textarea name="body" id="comment" cols="30" rows="1" class="form-control" placeholder="Write your reply here"></textarea>
                    </div>
                    <input type="submit" value="Post" class="btn btn-outline-light">
                </form>
                @dump($teller)
                @if($teller <= 3)
                    @include('includes.replies',['comments'=>$comment->replies])
                @else
                    <p class="all"><i class="fas fa-arrow-alt-from-top mr-2"></i>Show complete thread</p>
                    <div class="less"></div>
                @endif
            </div>

    @endforeach

@endif--}}


