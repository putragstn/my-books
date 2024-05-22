<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('menu.user-account.index', [
            'title' => 'User Account',
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu.user-account.create', [
            'title' => 'Add New User Account',
            'users' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_image'    => 'required',
            'name'          => 'required',
            'username'      => 'required',
            'email'         => 'required',
            'password'      => 'required',
            'role_id'       => 'required'
        ]);

        // Menangkap request input password lalu di encryption
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($request->all());
        return redirect()->route('user.index')->with('success', 'User Account created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('menu.user-account.edit', [
            'title' => 'Edit User',
            'user'  => $user,
            'roles' => Role::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'user_image'    => 'required',
            'name'          => 'required',
            'username'      => 'required',
            'email'         => 'required',
            'role_id'       => 'required'
        ]);

        $user->update($request->except(['_token']));
        return redirect()->route('user.index')->with('success', 'User Account updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User Account deleted successfully');
    }
}
