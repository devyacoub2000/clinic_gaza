<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Contact;
use App\Models\Department;
use App\Models\Appointment;

class FrontController extends Controller
{
    
    public function index() {

        return view('front.index');
    }

    public function readmore($id) {
        $data = Department::findOrFail($id);
        return view('front.readmore', compact('data'));
    }

     public function store_appointment(Request $request) {

            $request->validate([
                    'patient_name' => 'required',
                    'phone' => 'required',
                    'doctor_id' => 'required',
                    'department_id' => 'required',
                    'date' => 'required|date|after_or_equal:today',
                    'time' => 'required|date_format:H:i|after:08:00|before:22:00',
            ]);
         

         //Check if the time is already reserved

                $exists = Appointment::where('date', $request->date)
                    ->where('time', $request->time)
                    ->exists();

                  if($exists) {
                       return redirect()->route('front.index')
                                ->with('msg', 'This time is already booked')
                                ->with('type', 'info');     
                  }  

                  Appointment::create([
                        'patient_name' => $request->patient_name,
                        'phone' => $request->phone,
                        'doctor_id' => $request->doctor_id,
                        'department_id' => $request->department_id,
                        'date' => $request->date,
                        'time' => $request->time,
                        'status' => 'pendding',
                    ]);

                return redirect()->route('front.index')
                    ->with('msg', 'Appointment successfully booked.');
                }


    public function store_conatct(Request $request) {
     
       $request->validate([
          'name' => 'required',
          'phone' => 'required',
          'email' => 'required',
          'message' => 'required',
       ]);

       Contact::create($request->all());
       return redirect()->route('front.index')->with('msg', 'Contact Request Successfully');
    }


    public function about() {
        return view('front.about');
    }

    public function treatment() {
        return view('front.treatment');
    }

    public function doctors() {
        return view('front.doctors');
    }

    public function blog() {
        return view('front.blog');
    }

    public function contact() {
        return view('front.contact');
    }






















































        

}
