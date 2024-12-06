<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public $pages;

    public function __construct(Page $page)
    {
        $this->pages = $page;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = $this->pages->paginate(10);
        return view('admin.pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'slug' => 'required',
            'string' => 'required',
            'content' => 'required',
        ]);
        $this->pages->create($data);
        return redirect(route('pages.index'))->with('success','Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        return view('admin.pages.show',compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        return view('admin.pages.edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        $data = $request->validate([
            'slug' => 'required',
            'string' => 'required',
            'content' => 'required',
        ]);
        $page->update($data);
        return redirect(route('pages.show',$page->id))->with('success','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect(route('pages.index'))->with('success','deleted Successfully');
    }
}
