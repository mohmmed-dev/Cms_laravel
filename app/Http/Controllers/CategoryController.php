<?php

namespace App\Http\Controllers;

use App\Helpers\Slug;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $categories;

    public function __construct(Category $category)
    {
        $this->categories = $category;
    }
    public function index()
    {
        return view('admin.category',['categories' => $this->categories->paginate(10)]);
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
        $data = $request->validate(['title' => 'required']);
        $data['slug'] = Slug::createSlug($data['title']);
        Category::create($data);
        return back()->with('success','Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success','Deleted Successfully');
    }

}
