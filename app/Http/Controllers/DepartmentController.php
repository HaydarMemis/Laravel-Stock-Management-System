<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        return $departments;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|string",
        ]);
        // $department = new Department();
        // $department->name = $request->name;
        // return $department->save();

        $department = Department::create($validated);
        return $department;
    }

    public function restore($id)
    {
        $department = Department::withTrashed()->find($id);
        $department -> restore;
        return $department();

    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        return $department;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $validated = $request->validate([
            "name" => "required|string",
        ]);
        $department->update($validated);
        return $department;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return response()->json([
            "message" => "Successfully Deleted"
        ]);
    }
}
