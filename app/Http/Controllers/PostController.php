<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class PostController extends Controller {

    /**
     * @var Post
     */
    private $post;

    /**
     * PostController constructor.
     * @param Post $post
     */
    public function __construct(Post $post) {
        $this->middleware('auth');
        $this->post = $post;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $posts = Auth::user()->posts();

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('posts.createPost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->post->create([
            'entry'   => Crypt::encrypt($request->entry),
            'user_id' => Auth::user()->id,
            'created_at' => $request->created_at,

        ]);

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $post = $this->post->findOrFail($id);
        if($post->user_id == Auth::user()->id)  return view('posts.show', ['post' => $post]);

        return redirect(route('posts.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $post = $this->post->findOrFail($id);
        $post->entry = Crypt::decrypt($post->entry);
        if($post->user_id == Auth::user()->id) return view('posts.createPost', ['post' => $post]);
        return redirect(route('posts.index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $post = $this->post->findOrFail($id);
        if($post->user_id != Auth::user()->id) return redirect(route('posts.index'));
        $post->entry = Crypt::encrypt($request->entry);
        $post->created_at = $request->created_at;
        $post->save();

        return  redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
