<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    
  

    public function store(Request $request) {
         

        $request->validate([
              'patient_name' => 'required|max:20|min:10',
              'phone' => 'required|min:10|max:10',
              'doctor_id' => 'required',
              'department_id' => 'required',
              'date' => 'required|date',
        ]);

        $data = Appointment::create([
                'patient_name' => $request->patient_name,
                'phone' => $request->phone,
                'doctor_id' => $request->doctor_id,
                'department_id' => $request->department_id,
                'date' => $request->date,
            ]);

		   return redirect()->route('front.index')
		        ->with('msg', 'ADDED Appointment Successfully')
		        ->with('type', 'success');

     }

}
