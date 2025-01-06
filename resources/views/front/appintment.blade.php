<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .appointment button {
            background-color: #0cb7d6;
            color: white;
            border: 1px solid #0cb7d6;
            border-radius: 5px;
            padding: 15px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s, border-color 0.3s;
            margin-top: 15px;
        }

        .appointment button:hover {
            background-color: #0a9cb2;
            border-color: #0a9cb2;
        }

        .appointment button:focus {
            outline: none;
        }
    </style>
</head>
<body>

<div class="appointment_section">
    <div class="container">
        <div class="appointment_box">
            <h1 class="appointment_taital">Book <span style="color: #0cb7d6;">Appointment</span></h1>

            <div class="appointment_section_2">
                <form action="{{ route('front.store_appointment') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <p class="doctorname_text">Patient Name</p>
                            <input type="text" class="form-control @error('patient_name') is-invalid @enderror" name="patient_name" value="{{ old('patient_name') }}" required>
                            @error('patient_name')
                            <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <p class="doctorname_text">Department's Name</p>
                            <select class="form-control @error('department_id') is-invalid @enderror" name="department_id" required>
                                <option disabled selected>---- Select Department ----</option>
                                @foreach(App\Models\Department::select('id', 'name')->get() as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                            @error('department_id')
                            <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <p class="doctorname_text">Doctor's Name</p>
                            <select class="form-control @error('doctor_id') is-invalid @enderror" name="doctor_id" required>
                                <option disabled selected>--- Select Doctor ----</option>
                                @foreach(App\Models\Doctor::select('id', 'name')->get() as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                            @error('doctor_id')
                            <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <p class="doctorname_text">Phone Number</p>
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required>
                            @error('phone')
                            <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <p class="doctorname_text">Choose Date</p>

                           <input class="form-control @error('date') is-invalid @enderror" name="date" type="date" required />

                            @error('date')
                            <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <p class="doctorname_text">Choose Time</p>
                            <input type="time" class="form-control @error('time') is-invalid @enderror" name="time" required>
                            @error('time')
                            <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <div class="appointment">
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to book this appointment?');">
                                    <i class="fas fa-calendar-check"></i> Make Appointment
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- 
        <script>
          document.addEventListener('DOMContentLoaded', function () {
            const now = new Date();
            const today = now.toISOString().split('T')[0]; 
            document.getElementById('datepicker').min = today; 
        });


        </script> -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
