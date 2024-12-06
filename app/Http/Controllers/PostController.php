<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Helpers\Slug;
use App\Models\Category;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller implements HasMiddleware
{
    protected $posts;
    public function __construct(Post $posts)
    {
        $this->posts = $posts;
    }
    public static function middleware() {
        return [
            'auth', new Middleware('verified', only: ['create'])
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user:id,name,profile_photo_path')->latest()->Approved()->paginate(6);
        $title = __("All Posts");
        return view('index',compact('posts','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('add-post');
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('add-post');
        $date = $request->validate(
            [
                'title' => 'required',
                'body' => 'required',
                'category_id' => 'required',
            ]
        );

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . $file->getClientOriginalName();
            $file->storeAs('images/', $filename );
            $date['image_path'] = 'images/' . $filename;
        }

        // $date['slug'] = Slug::uniqueSlug($date['title'],'posts');

        $request->user()->posts()->create($date);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $post = $this->posts::where('slug',$slug)->first();
        $comments = $post->comments->sortByDesc('created_at');
        return view('posts.show',compact('post','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        Gate::authorize('update-post',$post);
        return view('posts.edit',compact('post'));
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
            if(!empty($post->image_path)) {
                Storage::delete($post->image_path);
            };
            $file = $request->file('image');
            $filename = time() . $file->getClientOriginalName();
            $file->storeAs('images/', $filename );
            $data['image_path'] = 'images/' . $filename;
        }

        $data['slug'] = Slug::uniqueSlug($data['title'],'posts');



        $request->user()->posts()->where('slug',$post->slug)->update($data);
        return redirect(route('post.show',$data['slug']))->with('success','Updated Successfully');
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

    public function search(Request $request) {
        $posts = $this->posts->where('title','LIKE', '%' . $request->search . '%')->orWhere('body','LIKE', '%' . $request->search . '%')->whereApproved(1)->paginate(6);
        $title = __('Result Of Search ') . $request->search;
        return view('index',compact('posts','title'));
    }

    public function getByCategory(Category $category) {

        $posts = $this->posts::where('category_id',$category->id)->whereApproved(1)->paginate(6);
        $title = __('Posts Of Category ') . $category->title ;
        return view('index',compact('posts','title'));

    }
}
