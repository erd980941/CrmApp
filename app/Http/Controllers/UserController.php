<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            try {
                $this->authorize('index', User::class);
            } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
                return redirect()->route('home')->with('error', 'Bu işlemi gerçekleştirmeye yetkiniz yok.');
            }

            return $next($request);
        });
    }
    public function index()
    {
        $this->authorize('index', User::class);
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $this->authorize('create', User::class);
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        $this->authorize('create', User::class);
        User::create($request->validated());
        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        $this->authorize('edit', User::class);
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('edit', User::class);
        $user->update($request->validated());
        return redirect()->route('users.index');
    }

    public function changePassword(ChangePasswordRequest $request, User $user)
    {
        $this->authorize('edit', User::class);
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Eski şifre yanlış.']);
        }

        $user->password = $request->new_password;
        $user->save();

        return redirect()->route('users.index')->with('success', 'Password changed successfully.');
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', User::class);
        $user->delete();
        return redirect()->route('users.index');
    }
}
