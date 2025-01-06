<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Models\Appointment;
use App\Models\Contact;
use App\Notifications\AppointmentStatusChanged;



class AdminController extends Controller
{
    
   public function index() {
      return view('admin.index');
   }

   public function show_contacts() {
      $data = Contact::latest('id')->paginate();
      return view('admin.contacts', compact('data'));
   }

   public function remve_contact($id) {
      $data = Contact::findOrFail($id);

      $data->delete();
      return redirect()->route('admin.show_contacts')
      ->with('msg', 'Remove Contact Successfully')
      ->with('type', 'danger');
   }

    public function updat_status(Request $request, $id) {
      
         $appointment = Appointment::findOrFail($id);

         $appointment->update([
            'status' => $request->status,
         ]);

           $message = 'Your appointment status has been changed to: ' . $appointment->status;

          //send notifcation to email patient 
          //  $user = Auth::user()->type;
          // if($user == 'patinet') {
          //    $patient_email = $user->email; 
          //     \Mail::to($patient_email)->send(new \App\Mail\AppointmentStatusChanged($message, $appointment));
          // }

          //  $patient_email = $user->email; 
          //     \Mail::to($patient_email)->send(new \App\Mail\AppointmentStatusChanged($message, $appointment));


         return redirect()->back()->with('msg', 'Status Changed Done..')
         ->with('type', 'success');

 
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


          $dateTime = $request->date . ' ' . $request->time;

         
          Appointment::create([
              'patient_name' => $request->patient_name,
              'phone' => $request->phone,
              'doctor_id' => $request->doctor_id,
              'department_id' => $request->department_id,
              'date' => $dateTime, // استخدام التاريخ والوقت المدمجين
              'status' => 'pending', // أو أي حالة أخرى
          ]);

          return redirect()->route('front.index')
              ->with('msg', 'Contact Request Successfully')
              ->with('type', 'success');
      }



      public function show_appointments() {
         $data = Appointment::latest('id')->paginate();
         return view('admin.show_appointments', compact('data'));
      }



   public function profile() {
      $admin = Auth::user();
      return view('admin.profile', compact('admin'));
   }

    public function profile_data(Request $request) {


           $request->validate([
                'name' => 'required',
                'current_password' => 'required_with:password',
                'password' => 'nullable|min:8|confirmed',
           ]); 

           $admin = Auth::user();
           $data = [
              'name' => $request->name,
           ];
           if($request->has('password')) {
              $data['password'] = bcrypt($request->password);
           }

           $admin->update($data);

           if($request->hasFile('image')) {
                  if($admin->image) {
                     File::delete(public_path('images/'.$admin->image->path));
                     $admin->image()->delete();
                  }
                  $img = $request->File('image');
                  $img_name = rand().time().$img->getClientOriginalName();
                  $img->move(public_path('images'), $img_name);
                    $admin->image()->create([
                           'path' => $img_name,
                       ]); 
           }

           return redirect()->back()->with('msg', 'Profile Update Successfully');
    }

     public function check_password(Request $request) {

             return (Hash::check($request->password, Auth::user()->password));

        }


        public function patients() {
          $data = Appointment::latest('id')->paginate();
          return view('admin.patients', compact('data'));
        }


}
