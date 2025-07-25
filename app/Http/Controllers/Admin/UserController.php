<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::where('status','!=','admin')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function show($id)
    {
        $user = \App\Models\User::with(['tenant', 'posts'])->find($id);
        return view('admin.users.show', compact('user'));
    }

}
