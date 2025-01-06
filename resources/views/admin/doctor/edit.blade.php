
@extends('admin.app')

@section('title', 'Edit Doctors')

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
       Edit Doctor 
    </h1>
    
    <form action="{{route('admin.doctor.update', $doctor->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="name"> Name </label>
            <input type="text" name="name" placeholder="Enter Name Department" class="form-control @error('name') is-invalid @enderror" id="name" value="{{old('name', $doctor->name)}}">
            @error('name')
              <small class="invalid-feedback"> {{$msg}} </small>
            @enderror
        </div>

         <div class="mb-3">
              <label for="image"> Image </label>
              <input onchange="return showImg(event)" type="file" name="image" class="form-control @error('image') is-invalid @enderror">
              @error('image')
                <small class="invalid-feedback"> {{$message}}</small>
              @enderror
               @php 
                $src = '';
               if($doctor->image) {
                  $src = asset('images/'.$doctor->image->path);
               }
              @endphp
              <img src="{{$src}}" width="100" id="preview">
         </div>

         <div class="mb-3">
             <label for="department_id"> Department </label> 
             <select name="department_id" class="form-control @error('department_id') is-invalid @enderror" value="{{old('department_id', $doctor->department_id)}}">
                 
                  <option disabled>--- Select Department ----</option>
                  @foreach($data as $item)
                     
                   <option value="{{$item->id}}" 
                        <?php if($doctor->department->id == $item->id) echo 'selected' ?> >
                           {{$item->name}}
                   </option>

                  @endforeach
             </select> 
             @error('department_id')
               <small class="invalid-feedback"> {{$message}} </small>
             @enderror
         </div>


        <button class="btn btn-info">Save <i class="fas fa-edit"></i> </button>
    </form>

@endsection

@section('js')
   <script type="text/javascript">
          function showImg(e) {
            const [file] = e.target.files;
            if(file) {
               preview.src = URL.createObjectURL(file);
            }
          }
     </script>
@endsection












