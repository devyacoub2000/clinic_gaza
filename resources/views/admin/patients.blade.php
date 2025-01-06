
@extends('admin.app')

@section('title', 'All Patients')

@section('content')

   @if(session('msg'))
      <div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
        {{session('msg')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
       </div>
     @endif 
    <h1 class="h3 mb-4 text-gray-800" style="cursor: pointer;">
       ALL Patients 
    </h1>

    <table class="table table-bordered table-hover">
         <tr class="bg-dark text-white">
             <th> #</th>
             <th> Patient Name</th>
             <th> Phone</th>
             <th> Department Name</th>
             <th> Doctor Name</th>
             <th> Status</th>
         </tr>

         @forelse($data as $item)
             <tr>
                 <td>{{$loop->iteration}}</td>
                 <td>{{$item->patient_name}}</td>
                 <td>{{$item->phone}}</td>
                 <td>
                    @if($item->department)
                    {{$item->department->name}}
                    @endif
                </td>
                 <td>
                    
                    @if($item->doctor)
                    {{$item->doctor->name}}
                    @endif
                </td>
                 <td style="cursor: pointer;" class="@php  
                       if($item->status == 'pendding') echo 'text-warning';
                       elseif($item->status == 'cancel') echo 'text-danger';
                       else 
                       echo 'text-success';
                       @endphp">
                     {{$item->status}}
                 </td>
                 
             </tr>
         @empty
               <tr>
                  <td colspan="6" class="text-center"> No Data Found </td>
               </tr>
         @endforelse
    </table>

    {{$data->links()}}
@endsection