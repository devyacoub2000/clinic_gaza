
@extends('admin.app')

@section('title', 'WebSite Settings ')

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
          Update Or Create Settings 
    </h1>
    
    <form action="{{route('admin.settings')}}" method="POST" enctype="multipart/form-data">
        
        @csrf
        @method('put')


        <div class="mb-3">
            <label for="website_name"> Website Name </label>
            <input type="text" name="website_name" placeholder="Enter website Name " class="form-control @error('website_name') is-invalid @enderror" id="website_name" value="{{old('website_name', $settings['website_name'])}}">
            @error('website_name')
              <small class="invalid-feedback"> {{$message}} </small>
            @enderror
        </div>

         <div class="mb-3">
              <label for="website_logo"> Website Logo </label>
              <input onchange="return showImg(event)" type="file" name="website_logo" class="form-control @error('website_logo') is-invalid @enderror" value="{{old('website_logo',  $settings['website_logo'])}}">
              @error('website_logo')
                <small class="invalid-feedback"> {{$message}}</small>
              @enderror
              @php
                 
                  if($settings['website_logo']) {
                  	  $src = asset('settings_imgs/'.$settings['website_logo']);
                  } 
              @endphp
              <div class="position-relative d-inline-block">
                  <div id="delete_site_img">x</div>
                  <img src="{{$settings['website_logo'] ? $src : asset('asset/images/logo.png')}}" width="85px" height="85px" id="preview">
              </div> 
              
         </div>

         <div class="mb-3">
            <label for="phone"> Phone Number </label>
            <input type="tel" name="phone" placeholder="Enter website Phone " class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{old('phone',  $settings['phone'])}}">
            @error('phone')
              <small class="invalid-feedback"> {{$message}} </small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email"> Website Email </label>
            <input type="email" name="email" placeholder="Enter website Email " class="form-control @error('email') is-invalid @enderror" id="email" value="{{old('email',  $settings['email'])}}">
            @error('email')
              <small class="invalid-feedback"> {{$message}} </small>
            @enderror
        </div>

         <div class="mb-3">
            <label for="facebaook"> Website facebaook </label>
            <input type="url" name="facebaook" placeholder="Enter website Facebaook " class="form-control @error('facebaook') is-invalid @enderror" id="facebaook" value="{{old('facebaook',  $settings['facebaook'])}}">
            @error('facebaook')
              <small class="invalid-feedback"> {{$message}} </small>
            @enderror
        </div>

         <div class="mb-3">
            <label for="twitter"> Website twitter </label>
            <input type="url" name="twitter" placeholder="Enter website Twitter " class="form-control @error('twitter') is-invalid @enderror" id="twitter" value="{{old('twitter',  $settings['twitter'])}}">
            @error('twitter')
              <small class="invalid-feedback"> {{$message}} </small>
            @enderror
        </div>

         <div class="mb-3">
            <label for="linkedlin"> Website linkedlin </label>
            <input type="url" name="linkedlin" placeholder="Enter website Linkedlin " class="form-control @error('linkedlin') is-invalid @enderror" id="linkedlin" value="{{old('linkedlin',  $settings['linkedlin'])}}">
            @error('linkedlin')
              <small class="invalid-feedback"> {{$message}} </small>
            @enderror
        </div>

        


        <button class="btn btn-success">Save <i class="fas fa-save"></i> </button>
    </form>

@endsection

@section('css')
  <style type="text/css">
     #delete_site_img { 
         position: absolute;
         right: 4px;
         top: 4px;
         width: 10px;
         height: 10px;
         background: red;
         color: white;
         display: flex;
         justify-content: center;
         align-items: center;
         border-radius: 50%;
         padding: 8px;
         cursor: pointer;
     }
     
  </style>
@endsection

@section('js')
   
   <script type="text/javascript">
          
          let del_img = document.querySelector('#delete_site_img');
          del_img.onclick = () => {
               $.get('/admin/del-logo-site')

               .done((res) => {
                   del_img.parentElement.remove()
               })
               .fail((err) => {
                  console.log(err);
               })

          }


   </script>

   <script type="text/javascript">
          function showImg(e) {
            const [file] = e.target.files;
            if(file) {
               preview.src = URL.createObjectURL(file);
            }
          }
     </script>
@endsection
