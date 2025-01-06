<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Support\Facades\File;

class DocotorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Doctor::latest('id')->paginate(10); 
        return view('admin.doctor.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {  
        $data = Department::select('id', 'name')->get(); 
        return view('admin.doctor.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
        $request->validate([
             'name' => 'required',
             'department_id' => 'required',
             'image' => 'required|image',

         ]);
        
        $data = Doctor::create([
            'name' => $request->name,
            'department_id' => $request->department_id,
        ]);

        $img = $request->File('image');
        $img_name = rand().time().$img->getClientOriginalName();
        $img->move(public_path('images'), $img_name);

        $data->image()->create([
          'path' => $img_name,
        ]);

         return redirect()->route('admin.doctor.index')
        ->with('msg', 'Add Department Successfully')
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
    public function edit(Doctor $doctor)
    {   
        $data = Department::select('id', 'name')->get();
        return view('admin.doctor.edit', compact('doctor', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
             'name' => 'required',
         ]);
        
        $doctor->update([
            'name' => $request->name,
            'department_id' => $request->department_id,
        ]);

        if($request->hasFile('image')) {
          
           if($doctor->image) {
              File::delete(public_path('images/'.$doctor->image->path));
           }

            $doctor->image()->delete(); 

            $img = $request->File('image');
            $img_name = rand().time().$img->getClientOriginalName();
            $img->move(public_path('images'), $img_name);

            $doctor->image()->create([
              'path' => $img_name,
            ]);

        }

         return redirect()->route('admin.doctor.index')
        ->with('msg', 'Edit Department Successfully')
        ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
         if($doctor->image) {
              File::delete(public_path('images/'.$doctor->image->path));
           }
         $doctor->image()->delete(); 
         $doctor->delete();
         return redirect()->route('admin.doctor.index')
        ->with('msg', 'DELET Department Successfully')
        ->with('type', 'danger');
    }
}
