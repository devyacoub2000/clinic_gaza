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
                           <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment" name="message"></textarea>
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