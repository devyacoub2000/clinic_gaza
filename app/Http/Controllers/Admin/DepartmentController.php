<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Department::latest('id')->paginate();
        return view('admin.department.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
             'name' => 'required',
        ]);

        $data = Department::create([
             'name' => $request->name,
             'body' => $request->body,
        ]);

        return redirect()->route('admin.department.index')
        ->with('msg', 'ADDED Department Successfully')
        ->with('type', 'success');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('admin.department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $request->validate([
             'name' => 'required',
        ]);

        $department->update([
             'name' => $request->name,
             'body' => $request->body,
        ]);

        return redirect()->route('admin.department.index')
        ->with('msg', 'Edit Department Successfully')
        ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
            $department->delete();
            return redirect()->route('admin.department.index')
            ->with('msg', 'Delete Department Successfully')
            ->with('type', 'danger'); 
    }
}








