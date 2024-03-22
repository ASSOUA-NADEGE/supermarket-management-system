<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AuthenticationController extends Controller
{
    public function home()
    {
        return inertia('auth/Home', ['roles' => Role::all()]);
    }


    public function role($role)
    {
        return inertia('auth/Role', [
            'users' =>
            User::role($role)->get()
        ]);
    }
}
