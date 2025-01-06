<div class="header_section">
         <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <a class="navbar-brand"href="{{url('/')}}"><img src="{{asset('asset/images/logo.png')}}"></a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto">
                     <li class="nav-item active">
                        <a class="nav-link" href="{{Auth::check() && Auth::user()->type == 'admin' ? route('admin.index') : url('/')}}">Home</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{route('front.about')}}">About</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{route('front.treatment')}}">Treatment</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{route('front.doctors')}}">Doctors</a>
                     </li>
                     
                     <li class="nav-item">
                        <a class="nav-link" href="{{route('front.contact')}}">Contact Us</a>
                     </li>
                  </ul>
                  <form class="form-inline my-2 my-lg-0">
                  </form>
               </div>
            </nav>
            <div class="custom_bg">
               <div class="custom_menu">
                  <ul>
                     <li class="active"><a href="{{url('/')}}">Home</a></li>
                     <li><a href="{{route('front.about')}}">About</a></li>
                     <li><a href="{{route('front.treatment')}}">Treatment</a></li>
                     <li><a href="{{route('front.doctors')}}">Doctors</a></li>
                     <li><a href="{{route('front.contact')}}">Contact Us</a></li>

                  </ul>
               </div>
               @guest
               <form class="form-inline my-2 my-lg-0">
                  <div class="search_btn">
                     <li><a href="{{route('login')}}"><i class="fa fa-user" aria-hidden="true"></i><span class="signup_text">Login</span></a></li>
                     <li><a href="{{route('register')}}"><i class="fa fa-user" aria-hidden="true"></i><span class="signup_text">Sign Up</span></a></li>
                  </div>
               </form>
              @endguest 
                @auth
                     
                          <form class="form-inline my-2 my-lg-0" 
                          action="{{route('logout')}}" method="POST">
                             @csrf

                             <button class="btn btn-dark"> Logout</button>
                          </form>
                     @endauth
    
               
            </div>
         </div>
         <!-- header section end -->
         <!-- banner section start --> 
         <div class="banner_section layout_padding">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <h1 class="banner_taital">We care Of You</h1>
                     <p class="banner_text">When looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to </p>
                     <div class="read_bt"><a href="#">Read More</a></div>
                  </div>
               </div>
            </div>
         </div>
         <!-- banner section end -->
      </div>