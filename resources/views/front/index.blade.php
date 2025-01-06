
    
      @extends('front.app')

      @section('title', env('APP_NAME'))
     
      @section('content')
         
      <!-- appointment section start -->
      @include('front.appintment')
      
      <!-- appointment section end -->
      <!-- about section start -->
      <div class="about_section layout_padding" id="about">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <h1 class="about_taital">About Hospital</h1>
                  <p class="about_text"> has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors  has a more-or-less normal distribution of letters, as o</p>
                  <div class="about_bt"><a href="#">Read More</a></div>
               </div>
               <div class="col-md-6">
                  <div class="about_img"><img src="{{asset('asset/images/about-img.png')}}"></div>
               </div>
            </div>
         </div>
      </div>
      <!-- about section end -->
      <!-- treatment section start -->
      <div class="treatment_section layout_padding" id="treatment">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h1 class="treatment_taital">Hospital Treatment</h1>
               </div>
            </div>
            <div class="treatment_section_2">
            <div class="row">
              @foreach(App\Models\Department::latest('id')->get() as $item) 
               <div class="col-lg-3 col-sm-6">
                  <h1 class="number_text">0{{$loop->iteration}}</h1>
                  <h2 class="care_text">{{$item->name}}</h2>
                  <p class="treatment_text">{{$item->body}}</p>
                  <div class="readmore_bt active"><a href="{{route('front.readmore', $item->id)}}">Read More</a></div>
               </div>
              @endforeach 
              
            </div>
         </div>
         </div>
      </div>
      <!-- treatment section end -->
      <!-- doctores section start -->
      <div class="doctores_section" id="doctores">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h1 class="doctores_taital">Our doctores</h1>
               </div>
            </div>
            <div class="doctores_section_2">
               <div id="my_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="row">
                          
                          @foreach(App\Models\Doctor::latest()->limit(3)->get() as $item)
                           <div class="col-md-4">
                              <div class="doctores_box">
                                 <div class="image_1"><img src="{{asset('images/'.$item->image->path)}}"></div>
                                 <h4 class="humour_text"> {{$item->name}}</h4>
                                 <div class="social_icon">
                                    <ul>
                                       <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                       <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                       <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                       <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                          @endforeach  
                          
                        </div>
                     </div>
                    
                  </div>
                <!--   <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
                  </a>
                  <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                  <i class="fa fa-angle-right"></i>
                  </a> -->
               </div>
            </div>
         </div>
      </div>
      <!-- doctores section end -->
      <!-- testimonial section start -->
      <div class="testimonial_section layout_padding" id="testimonial">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h1 class="testimonial_taital">Our Testimonial</h1>
               </div>
            </div>
            <div class="customer_section_2">
               <div class="row">
                  <div class="col-md-12">
                      <div class="box_main">
                        <div id="main_slider" class="carousel slide" data-ride="carousel">
                           <div class="carousel-inner">
                              <div class="carousel-item active">
                                 <div class="customer_main">
                                    <div class="customer_right">
                                       <h3 class="customer_name">Morijorch <span class="quick_icon"><img src="{{asset('asset/images/quick-icon.png')}}"></span></h3>
                                       <p class="default_text">Default model text,</p>
                                       <p class="enim_text">editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Variouseditors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Variouseditors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various</p>
                                    </div>
                                 </div>
                              </div>
                              <div class="carousel-item">
                                 <div class="customer_main">
                                    <div class="customer_right">
                                       <h3 class="customer_name">Morijorch <span class="quick_icon"><img src="{{asset('asset/images/quick-icon.png')}}"></span></h3>
                                       <p class="default_text">Default model text,</p>
                                       <p class="enim_text">editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Variouseditors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Variouseditors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various</p>
                                    </div>
                                 </div>
                              </div>
                              <div class="carousel-item">
                                 <div class="customer_main">
                                    <div class="customer_right">
                                       <h3 class="customer_name">Morijorch <span class="quick_icon"><img src="{{asset('asset/images/quick-icon.png')}}"></span></h3>
                                       <p class="default_text">Default model text,</p>
                                       <p class="enim_text">editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Variouseditors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Variouseditors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                           <i class="fa fa-angle-left"></i>
                           </a>
                           <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                           <i class="fa fa-angle-right"></i>
                           </a>
                        </div>
                     </div>
                  </div>
                </div>
            </div>
         </div>
      </div>
      <!-- testimonial section end -->
      <!-- contact section start -->
      @include('front.connect')
      
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

    
     