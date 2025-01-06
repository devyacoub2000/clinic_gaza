<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $data = Address::latest('id')->paginate(10);
      return view('admin.address.index', compact('data'));   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.address.create');   
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'email' => 'required',
            'location' => 'required',
        ]);

        Address::create($request->all());

        return redirect()->route('admin.address.index')
        ->with('msg',  'ADDED Address Successfully')
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
    public function edit(Address $address)
    {
        return view('admin.address.edit', compact('address'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Address $address)
    {
    
        $address->update($request->all());

        return redirect()->route('admin.address.index')
        ->with('msg',  'Edit Address Successfully')
        ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        $address->delete();
        return redirect()->route('admin.address.index')
        ->with('msg',  'Delete Address Successfully')
        ->with('type', 'danger');
    }
}
