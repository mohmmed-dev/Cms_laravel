<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public $posts;

    public function  __construct(Post $post) {
        $this->posts = $post;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = $this->posts->paginate(10);
        return view('admin/posts/all',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        Gate::authorize('update-post',$post);
        return view('admin/posts/edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        Gate::authorize('update-post',$post);
        $data = $request->validate(
            [
                'title' => 'required',
                'body' => 'required',
                'category_id' => 'required',
            ]
        );

        if($request->hasFile('image')) {
            if(!empty($post->image)) {
                Storage::delete($post->image);
            };
            $file = $request->file('image');
            $filename = time() . $file->getClientOriginalName();
            $file->store('public/images/', $filename );
            $data['image'] = 'images/' . $filename;
        }

        $data['approved'] = $request->has('approved');

        $post->update($data);
        return redirect(route('posts.index'))->with('success','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('delete-post',$post);
        $post->delete();
        return redirect()->back()->with('success','Deleted Successfully');
    }
}
