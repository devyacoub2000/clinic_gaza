@extends('admin.app')

@section('title', 'All Appointments')

@section('content')

@if(session('msg'))
    <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
        {{ session('msg') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif 

<h1 class="h3 mb-4 text-gray-800" style="cursor: pointer;">
    ALL Appointments 
</h1>

<table class="table table-bordered table-hover">
    <tr class="bg-dark text-white">
        <th>#</th>
        <th>Patient Name</th>
        <th>Phone</th>
        <th>Department Name</th>
        <th>Doctor Name</th>
        <th>Date and Time</th> <!-- العنوان هنا -->
        <th>Status</th>
        <th>Action</th>
    </tr>

    @forelse($data as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->patient_name }}</td>
            <td>{{ $item->phone }}</td>
            <td>
                @if($item->department)
                    {{ $item->department->name }}
                @endif
            </td>
            <td>
                @if($item->doctor)
                    {{ $item->doctor->name }}
                @endif
            </td>
<td>{{ \Carbon\Carbon::parse($item->date)->format('Y-m-d') }} {{ $item->time }}</td>
            <td style="cursor: pointer;" class="@php  
                if($item->status == 'pendding') echo 'text-warning';
                elseif($item->status == 'cancel') echo 'text-danger';
                else echo 'text-success';
            @endphp">
                {{ $item->status }}
            </td>
            <td>
                <form class="text-center" action="{{ route('admin.updat_status', $item->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('put')
                    <select name="status" class="mb-1 form-control" onchange="this.form.submit()">
                        <option value="pendding" hidden {{ $item->status == 'pendding' ? 'selected' : '' }}>
                            pendding
                        </option>
                        <option value="confirmed" {{ $item->status == 'confirmed' ? 'selected' : '' }}>
                            Confirmed
                        </option>
                        <option value="cancel" {{ $item->status == 'cancel' ? 'selected' : '' }}>
                            Cancel
                        </option>
                    </select>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="8" class="text-center"> No Data Found </td>
        </tr>
    @endforelse
</table>

{{$data->links()}}

@endsection
