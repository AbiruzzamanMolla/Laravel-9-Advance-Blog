<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        abortIf('view.post');
        $posts = Post::with('user:id,name', 'category', 'tags')->latest('id')->paginate(10);
        $last_updated = Post::latest('updated_at')
        ->first()->updated_at;
        return view('backend.post.index',[
            'posts' => $posts,
            'last_updated' => $last_updated
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abortIf('create.post');
        $categories = Category::all();
        $tags = Tag::all();
        $last_created = Post::latest('created_at')
        ->first()->updated_at;
        return view('backend.post.create', [
            'categories' => $categories,
            'tags' => $tags,
            'last_created' => $last_created,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abortIf('store.post');
        $request->validate([
            'title' => 'required|unique:posts,title',
            'category_id' => 'required',
            'body' => 'nullable|max:16777215',
            'description' => 'required|max:255',
            'cover' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:1024',
            'tags' => 'nullable',
        ], [
            'category_id.required' => 'You must select a category!'
        ]);

        if ($request->hasFile('cover')) {
            $cover =  uploadFile($request->cover, 'images/posts/');
        } else {
            $cover = null;
        }

        $post = Post::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'body' => $request->body,
            'description' => $request->description,
            'cover' => $cover,
            'user_id' => auth()->user()->id
        ]);

        if($request->filled('tags')){
            $post->tags()->sync($request->tags);
        }

        if($post) flashSuccess('Post Created Successfully!');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        abortIf('edit.post');
        $categories = Category::all();
        $tags = Tag::all();
        return view('backend.post.edit',[
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        abortIf('update.post');
        $request->validate([
            'title' => 'required|unique:posts,title,'.$post->id,
            'category_id' => 'required',
            'body' => 'nullable|max:16777215',
            'description' => 'required|max:255',
            'cover' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:1024',
            'tags' => 'nullable',
        ], [
            'category_id.required' => 'You must select a category!'
        ]);

        if ($request->hasFile('cover')) {
            deletePhoto($post->cover);
            $cover =  uploadFile($request->cover, 'images/posts/');
            $post->cover = $cover;
        }

        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->body = $request->body;
        $post->description = $request->description;

        $posted = $post->save();

        if($request->has('tags')){
            $post->tags()->sync($request->tags);
        }

        $posted ? flashSuccess('Post Updated Successfully!') : flashError('Opps! Somethings went wrong!');
        return redirect()->route('admin.posts.edit', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        abortIf('delete.post');
        $data = $post->delete();
        if($data) deletePhoto($post->cover);
        if($data) flashSuccess('Post Deleted!');
        $msg = $data ? 'Post deleted successfully' : 'Post Deleting Failed!';
        return response()->json([
            'message' => $msg,
            'success' => $data
        ]);
    }

    public function updateStatus(Request $request)
    {
        abortIf('update.post.status');
        $post = Post::whereSlug($request->slug)->first();
        $post->status = $request->status;
        $data = $post->save();
        $msg = $data ? 'Post Status Changed!' : 'Post Status Update Failed!';
        return response()->json([
            'message' => $msg,
            'success' => $data
        ]);
    }
}
