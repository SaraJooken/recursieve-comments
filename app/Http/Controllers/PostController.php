<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(15);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
           'title'=> 'required|min:3|string',
           'body'=> 'required|string|min:3',
           'photo'=> 'required'
        ]);

        $data['title'] = $request->get('title');
        $data['body'] = $request->get('body');
        $data['user_id'] = Auth::id();

        $name = basename($request->file('photo')->storeAs(
            'public/posts', Uuid::uuid1() . '.' . $request->file('photo')->getClientOriginalExtension()
        ));
        $photo = Photo::create(['file' => $name]);

        $photo->post()->create($data);

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title'=> 'required|min:3|string',
            'body'=> 'required|string|min:3'
        ]);

        $post->title = $request->get('title');
        $post->body = $request->get('body');
        if($request->has('photo')){
            $name = basename($request->file('photo')->storeAs(
                'public/posts', Uuid::uuid1() . '.' . $request->file('photo')->getClientOriginalExtension()
            ));
            $photo = Photo::create(['file' => $name]);
            $post->photo_id = $photo->id;

        }
        $post->update();

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
