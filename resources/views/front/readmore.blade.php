
    
      @extends('front.app')

      @section('title', env('APP_NAME'))
     
      @section('content')
         
        <div class="treatment_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h1 class="treatment_taital">Hospital Treatment</h1>
               </div>
            </div>
            <div class="treatment_section_2">
            <div class="row">
            
               <div class="col-lg-3 col-sm-6 dapartment">
                  <h2 class="care_text">{{$data->name}}</h2>
                  <p class="treatment_text">{{$data->body}}</p>
                
               </div>
              
            </div>
         </div>
         </div>
      </div>

      @endsection

      @section('css')
           
          <style type="text/css">
             
             .dapartment {
                 margin: 5px auto;
             }
             .dapartment .treatment_text {

                  width: 500px;
             }

          </style>  

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

    
     