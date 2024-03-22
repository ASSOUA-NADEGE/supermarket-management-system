<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
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

    public function login(LoginRequest $request)
    {
        $credentials = $request->safe()->toArray();

        if (!auth()->attempt($credentials)) {
        }

        return redirect('/dashboard');
    }
}
