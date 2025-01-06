
@extends('admin.app')

@section('title', 'All Appointments')

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
       ALL Appointments 
    </h1>

    <table class="table table-bordered table-hover">
         <tr class="bg-dark text-white">
             <th> #</th>
             <th> Name</th>
             <th> Email</th>
             <th> Phone</th>
             <th> Message</th>
             <th> Action</th>
         </tr>

         @forelse($data as $item)
             <tr>
                 <td>{{$loop->iteration}}</td>
                 <td>{{$item->name}}</td>
                 <td>{{$item->email}}</td>
                 <td>{{$item->phone}}</td>
                 <td>{{$item->message}}</td>

                 <td>
                   <form class="text-center" action="{{route('admin.remve_contact', $item->id)}}" enctype="multipart/form-data" method="POST">
                      @csrf
                      @method('DELETE')
                             
                             <button onclick="return confirm('Are u Sure ? ')" class="btn btn-danger"> <i class="fas fa-trash"></i></button>
                              
                      </select>
                  </form>
                   
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