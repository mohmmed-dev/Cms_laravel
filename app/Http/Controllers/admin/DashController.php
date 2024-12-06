<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashController extends Controller
{
    public function index() {
        $posts_count = Post::count();
        $users_count = User::count();
        $comments_count = Comment::count();
        $categories_count = Category::count();
        return view('admin.index',compact('posts_count','users_count','comments_count','categories_count'));
    }
}
