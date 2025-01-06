
@extends('admin.app')

@section('title', 'All Doctors')

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
       ALL Doctors 
    </h1>

    <table class="table table-bordered table-hover">
         <tr class="bg-dark text-white">
             <th> #</th>
             <th> Image</th>
             <th> Name</th>
             <th> Department</th>
             <th> Action</th>
         </tr>

         @forelse($data as $item)
             <tr>
                 <td>{{$loop->iteration}}</td>
                 <td><img style="width: 100px; height: 100px; object-fit: cover;" src="{{asset('images/'.$item->image->path)}}"></td>
                 <td>{{$item->name}}</td>
                 <td>{{$item->department->name}}</td>
                 <td>
                     <a href="{{route('admin.doctor.edit', $item->id)}}" class="btn btn-info"
                       > <i class="fas fa-edit"></i> </a>

                     <form class="d-inline" action="{{route('admin.doctor.destroy', $item->id)}}" method="POST">
                         @csrf
                         @method('DELETE')
                         <button class="btn btn-danger"  onclick="return confirm('Are u Sure !?')"> <i class="fas fa-trash"></i> </button>
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