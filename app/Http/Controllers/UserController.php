<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('User.index')->with(['user_posts' => $user->getUserPaginateByLimit()]);
    }
    //
}
