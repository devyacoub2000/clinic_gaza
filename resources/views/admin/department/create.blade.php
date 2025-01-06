
@extends('admin.app')

@section('title', 'Create Departments')

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
       Create Departments 
    </h1>
    
    <form action="{{route('admin.department.store')}}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name"> Name </label>
            <input type="text" name="name" placeholder="Enter Name Department" class="form-control @error('name') is-invalid @enderror" id="name" value="{{old('name')}}">
            @error('name')
              <small class="invalid-feedback"> {{$message}} </small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="body"> Body </label>
            <textarea rows="5" name="body" placeholder="Enter Name Department" class="form-control @error('body') is-invalid @enderror" id="body">
                 {{old('body')}}
            </textarea>
            @error('body')
              <small class="invalid-feedback"> {{$message}} </small>
            @enderror
        </div>

        <button class="btn btn-success">Save <i class="fas fa-save"></i> </button>
    </form>

@endsection












