
@extends('admin.app')

@section('title', 'All Address')

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
       ALL Address 
    </h1>

    <table class="table table-bordered table-hover">
         <tr class="bg-dark text-white">
             <th> #</th>
             <th> Phone</th>
             <th> Email</th>
             <th> Location</th>
             <th> Action</th>
         </tr>

         @forelse($data as $item)
             <tr>
                 <td>{{$loop->iteration}}</td>
                 <td>{{$item->phone}}</td>
                 <td>{{$item->email}}</td>
                 <td>{{$item->location}}</td>
                 <td>
                     <a href="{{route('admin.address.edit', $item->id)}}" class="btn btn-info"
                       > <i class="fas fa-edit"></i> </a>

                     <form class="d-inline" action="{{route('admin.address.destroy', $item->id)}}" method="POST">
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