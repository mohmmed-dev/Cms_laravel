<?php

namespace App\Http\Composers;

use Illuminate\View\View;
use App\Models\Comment;

class CommentComposer {

    protected $comments;

    public function __construct(Comment $comments)
    {
        $this->comments = $comments;
    }

    public function compose(View $view) {
        return $view->with('comments',$this->comments::take(8)->latest()->get());
    }

}
