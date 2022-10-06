<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abortIf('view.tag');
        $tags = Tag::latest()->paginate(10);
        $last_created = Tag::latest('created_at')
        ->first()->created_at;
        return view('backend.tag.index', ['tags' => $tags, 'last_created' => $last_created]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abortIf('store.tag');
        $request->validate([
            'title' => 'required|unique:tags,title'
        ]);

        $created = Tag::create($request->except('_token'));
        $created ? flashSuccess('Tag Created Successfully!') : flashError('Something went wrong!');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        abortIf('edit.tag');
        $last_updated = Tag::latest('updated_at')
        ->first()->updated_at;
        $tags = Tag::latest()->paginate(10);
        return view('backend.tag.index',[
            'tags' => $tags,
            'last_updated' => $last_updated,
            'tagData' => $tag
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        abortIf('update.tag');
        $request->validate([
            'title' => 'required|unique:tags,title,'.$tag->id,
        ]);

        $edited = $tag->update($request->except('_token'));
        $edited ? flashSuccess('Tag updated!') : flashSuccess('Something went wrong...');

        return redirect()->route('admin.tags.edit', $tag->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        abortIf('delete.tag');
        $data = $tag->delete();
        if($data) flashSuccess('Tag Deleted!');
        $msg = $data ? 'Tag deleted successfully' : 'Tag Deleting Failed!';
        return response()->json([
            'message' => $msg,
            'success' => $data
        ]);
    }
}
