<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;

class PermissionController extends Controller
{
    public static function middleware() {
        return new Middleware('Admin', only: ['store']);
    }
    public function index() {
        $permissions = Permission::all();
        return view('admin/permissions.index',compact('permissions'));
    }

    public function store(Request $request)  {
        Role::findOrFail($request->role_id)->permissions()->sync($request->permission);
        return back();
    }
}
