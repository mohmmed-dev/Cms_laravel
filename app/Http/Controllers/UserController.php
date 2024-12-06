<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public $users;

    public function __construct(User $user)
    {
        $this->users = $user;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->users::paginate(10);
        return view('admin.users.index',compact('users'));
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
        Gate::authorize('add-user');
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $password = Hash::make($data['password']);
        $role = $request->role_id;

        $user = $this->users;

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $password;
        $user->role_id = $role;
        $user->save();
        return back()->with('success','Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        Gate::authorize('update-user');
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        Gate::authorize('update-user');
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $role = $request->role_id;


        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->role_id = $role;
        $user->save();
        return redirect(route('users.index'))->with('success','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        Gate::authorize('delete-user');
        $user->delete();
        return back()->with('success','Deleted Successfully');
    }

    public function getPostsByUser(User $user) {
        $contents = $user;
        return view('user.profile',compact('contents'));
    }

    public function getCommentsByUser(User $user) {
        $contents = $user;
        return view('user.profile',compact('contents'));
    }
}
