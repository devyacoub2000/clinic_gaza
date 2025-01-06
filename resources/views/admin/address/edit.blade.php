
@extends('admin.app')

@section('title', 'Edit Address')

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
       Edit Address 
    </h1>
    
    <form action="{{route('admin.address.update', $address->id)}}" method="POST">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="phone"> Phone </label>
            <input type="number" name="phone" placeholder="Enter phone Address" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{old('phone', $address->phone)}}">
            @error('phone')
              <small class="invalid-feedback"> {{$message}} </small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email"> Email </label>
            <input type="email" name="email" placeholder="Enter email Address" class="form-control @error('email') is-invalid @enderror" id="email" value="{{old('email', $address->email)}}">
            @error('email')
              <small class="invalid-feedback"> {{$message}} </small>
            @enderror
        </div>

         <div class="mb-3">
            <label for="location"> Location </label>
            <input type="text" name="location" placeholder="Enter location Address" class="form-control @error('location') is-invalid @enderror" id="location" value="{{old('location', $address->location)}}">
            @error('location')
              <small class="invalid-feedback"> {{$message}} </small>
            @enderror
        </div>


        <button class="btn btn-info">Save <i class="fas fa-edit"></i> </button>
    </form>

@endsection












