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
            ["full_name"=>"required|string",
            "email"=> "required|email|unique:users",
            "username"=> "required|unique:users",
            "password"=> "required|password",
            "department_id"=> "required|exist:departments,id",
            "phone"=> "required|numeric|unique:users",
            "registiration_number"=> "required|string|unique:users",
        ]);
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
            ["full_name"=>"required|string",
            "email"=> "required|email|unique:users",
            "username"=> "required|unique:users",
            "password"=> "required|password",
            "department_id"=> "required|exist:departments,id",
            "phone"=> "required|numeric|unique:users",
            "registiration_number"=> "required|string|unique:users",
        ]);
        $user = User::create($validated);
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            "message"=> "Successfully Deleted",
            ]);
    }
}
