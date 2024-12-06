<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Events\commentNotification;
use App\Models\Alert;
use App\Models\Notification;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    protected $comments;

    public function __construct(Comment $comments)
    {
        $this->comments = $comments;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'body' => 'required'
        ]);


        $comment = $this->comments;
        $comment->body = $request->body;
        $comment->post_id = $request->post_id;
        $comment->user_id = auth()->user()->id;
        $post = Post::find($request->post_id);
        $notification = new Notification;
        if($post->user_id !== $request->user()->id) {
            $notification->user_id = $request->user()->id;
            $notification->post_id = $post->id;
            $notification->post_userId = $post->user_id;
            $notification->save();

        }
        $data = [
            'post_title' => $post->title,
            'post' => $post,
            'user_name' => auth()->user()->name,
            'user_image' => auth()->user()->profile_photo_path,
        ];

        if($post->user_id !== $request->user()->id) {
            $alert = Alert::where('user_id',$post->user_id)->first();
            $alert->alert++;
            $alert->save();
        }


        event(new commentNotification($data));
        $post->comments()->save($comment);
        return back()->with('success','Added Successfully');
    }

    public function replyStore(Request $request)
    {
        $request->validate([
            'body' => 'required'
        ]);

        $comment = $this->comments;
        $comment->body = $request->body;
        $comment->user_id =auth()->user()->id;
        $comment->post_id = $request->post_id;
        $comment->parent_id = $request->comment_id;
        $post = Post::find($request->post_id);


        $post->comments()->save($comment);
        return back()->with('success','Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        Gate::authorize('delete-comment');
        $comment->delete();
        return redirect()->back()->with('success','Deleted Successfully');
    }
}
