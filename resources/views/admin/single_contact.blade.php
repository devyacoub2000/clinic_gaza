
@extends('admin.app')

@section('title', 'Show Contact')

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
        Contact Messages 
    </h1>

    <div class="card">
         <div class="card-body">
              <h2> <strong style="cursor:pointer;"> Message From</strong> : {{$item->name}} </h2>
              <p> <strong style="cursor:pointer;">Message</strong> : {{$item->message}}</p>
              <p> <strong style="cursor:pointer;">Phone</strong> : {{$item->phone}}</p>
              <p> <strong style="cursor:pointer;">Email</strong> : {{$item->email}}</p>

              <hr>
              <h3> <strong style="cursor:pointer;"> Reply To Message </strong></h3>
              <form action="{{route('admin.contact.reply', $item->id)}}" method="POST">
                  @csrf
                  <div class="form-group">
                       <label for="rely"> Reply</label>
                       <textarea name="reply" id="reply" rows="5" class="form-control" placeholder="Enter Your Reply .... ">
                           
                       </textarea>
                  </div>

                  <button class="btn btn-info px-3"> <i class="fas fa-paper-plane mr-2"></i> Reply</button>
              </form>
         </div>


    </div>

    
@endsection

@section('js')
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
         <script type="text/javascript">
              const Toast = Swal.mixin({
                     toast: true,
                     position: "top-end",
                     showConfirmButton: false,
                     timer: 3000,
                     timerProgressBar: true,
                     didOpen: (toast) => {
                     toast.onmouseenter = Swal.stopTimer;
                     toast.onmouseleave = Swal.resumeTimer;
                     }
                  });
                   
               @if(session('msg'))  
                 Toast.fire({
                 icon: "success",
                 title: "{{session('msg')}}"
               });
               @endif
         </script>
@endsection