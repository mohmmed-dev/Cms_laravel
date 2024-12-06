<?php

namespace App\Http\Composers;

use Illuminate\View\View;
use App\Models\Category;
use App\Models\Post;

class CategoryComposer {

    protected $categories;
    protected $posts_number;

    public function __construct(Category $categories,Post $posts_number)
    {
        $this->categories = $categories;
        $this->posts_number =  $posts_number;
    }

    public function compose(View $view) {
        return $view->with('categories',$this->categories::all())->with('posts_number' , $this->posts_number->where('approved' , 1)->count());
    }

}
