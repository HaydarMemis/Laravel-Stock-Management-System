<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return $users;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                "full_name" => "required|string",
                "email" => "required|email|unique:users",
                "password" => "required|string|min:8|confirmed",
                "department_id" => "required|exists:departments,id",
                "username" => "required|string|max:255|unique:users,username,",
                "phone" => 'required|string|max:15|unique:users,phone,',
                "registration_number" => "required|string|max:50|unique:users",

            ]
        );
        $user = User::create($validated);
        return $user;
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return $user;
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate(
            [
                "full_name" => "required|string",
                "email" => "required|email|unique:users,email," .$user-> id,
                "username" => "required|unique:users,username" .$user->id,
                "password" => "required|string|min:8|confirmed",
                "department_id" => "required|exists:departments,id",
                "phone" => "required|numeric|unique:users,users,phone," . $user->id,
                "registiration_number" => "required|string|unique:users,registiration_number," . $user->id,
            ]
        );
        $user = User::create($validated);
        return $user;
    }

    public function restore($id)
    {
        $user = User::withTrashed()->find($id);
        $user -> restore;
        return $user();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            "message" => "Successfully Deleted",
        ]);
    }
}
