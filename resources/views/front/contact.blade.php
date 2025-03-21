  
   @include('front.css')
   <body>
      <!-- header top section start -->
      <div class="header_top_section">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">

                  <div class="header_top_main">
                     @foreach(App\Models\Address::all() as $item)
                     <div class="call_text"><a href="#"><span class="padding_right0"><i class="fa fa-phone" aria-hidden="true"></i></span>  Call : {{$item->phone}}</a></div>
                     <div class="call_text_2"><a href="#"><span class="padding_right0"><i class="fa fa-envelope" aria-hidden="true"></i></span> {{$item->email}}</a></div>
                     <div class="call_text_1"><a href="#"><span class="padding_right0"><i class="fa fa-map-marker" aria-hidden="true"></i></span> {{$item->location}}</a></div>
                     @endforeach
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- header top section end -->
      <!-- header section start -->
       @include('front.header_page')
        



    <div class="contact_section layout_padding">
         <div class="container-fluid">
            <div class="contact_section_2">
               <div class="row">
                  <div class="col-md-6">
                     <h1 class="contact_taital">Get In Touch</h1>
                     <form action="{{route('front.store_conatct')}}" method="POST">
                        @csrf
                           <div class="mail_section_1">
                              <input type="text" class="mail_text" placeholder="Name" name="name">

                              <input type="tel" class="mail_text" placeholder="Phone Number" name="phone"> 

                              <input type="email" class="mail_text" placeholder="Email" name="email">

                              <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment" name="message">
                                 
                              </textarea>

                              <div class="send_bt">
                                 <button class="btn btn-primary" style="width:120px; height: 40px;"> Send</button>
                              </div>
                           </div>
                     </form>
                  </div>
                  <div class="col-md-6 padding_left_15">
                     <div class="map_main">
                        <div class="map-responsive">
                           <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France" width="600" height="600" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>



            
      <!-- about section end -->
      <!-- footer section start -->
      <div class="footer_section">
         <div class="container">
            <div class="input_bt">
               <input type="text" class="mail_bt" placeholder="Enter Your Email" name="Enter your email">
               <span class="subscribe_bt" id="basic-addon2"><a href="#">Subscribe</a></span>
            </div>
            <div class="footer_section_2">
               <div class="row">
                  <div class="col-lg-3 col-sm-6">
                     <h3 class="footer_taital">Address</h3>
                     <div class="location_main">
                        <ul>
                           <li>
                              <a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>
                              <span class="padding_15">Making this the first true</span></a>
                           </li>
                           <li>
                              <a href="#"><i class="fa fa-phone" aria-hidden="true"></i>
                              <span class="padding_15">Call : +01 1234567890</span></a>
                           </li>
                           <li>
                              <a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>
                              <span class="padding_15">Email : demo@gmail.com</span></a>
                           </li>
                        </ul>
                     </div>
                     <div class="footer_social_icon">
                        <ul>
                           <li>
                              <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                           </li>
                           <li>
                              <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                           </li>
                           <li>
                              <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                           </li>
                           <li>
                              <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <h3 class="footer_taital">Useful Link</h3>
                     <div class="footer_menu">
                        <ul>
                           <li>
                              <a href="index.html">Home</a>
                           </li>
                           <li class="active">
                              <a href="about.html">About</a>
                           </li>
                           <li>
                              <a href="doctors.html">Doctors</a>
                           </li>
                           <li>
                              <a href="news.html">News</a>
                           </li>
                           <li>
                              <a href="treatment.html">Treatment</a>
                           </li>
                           <li>
                              <a href="contact.html">Contact Us</a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <h3 class="footer_taital">Help & Support</h3>
                     <p class="ipsum_text">Opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page</p>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <h3 class="footer_taital">News</h3>
                     <div class="dryfood_text"><img src="images/img-4.png"><span class="padding_15">Normal distribution</span></div>
                     <div class="dryfood_text"><img src="images/img-5.png"><span class="padding_15">Normal distribution</span></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">2024 All Rights Reserved. Design by <a href="https://html.design">Free Html Templates</a> Distribution By <a href="https://themewagon.com">ThemWagons</a></p>
         </div>
      </div>
           @include('front.js')

   </body>
</html>

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