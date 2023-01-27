@extends('layouts.sidebar')

@section('main')
 <!-- main -->
 <main class="container">
    <section id="contact-us">
      <h1>Get in Touch!</h1>

      <!-- contact info -->
      <div class="container">
        <div class="contact-info">
          <div class="mapouter">
              <div class="gmap_canvas">
                  <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=technorio&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                      <a href="https://piratebay-proxys.com/"></a>
              </div>
              <style>.mapouter{position:relative;text-align:right;width:100%;height:400px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:365px;padding-right: 25px;}.gmap_iframe {height:400px!important;}</style>
          </div>
          <div class="specific-info">
            <i class="fas fa-home"></i>
            <div>
              <p class="title">6th floor, Shankamul Tower</p>
              <p class="subtitle">Moi Avenue</p>
            </div>
          </div>
          <div class="specific-info">
            <i class="fas fa-phone-alt"></i>
            <div>
              <a href="">+254 720 XXX XXX </a>
              <br />
              <a href="">+254 721 XXX XXX</a>

              <p class="subtitle">Mon to Fri 9am-6pm</p>
            </div>
          </div>
          <div class="specific-info">
            <i class="fas fa-envelope-open-text"></i>
            <div>
              <a href="mailto:info@alphayo.co.ke">
                <p class="title">info@blogstation.com.np</p>
              </a>
              <p class="subtitle">Send us your query anytime!</p>
            </div>
          </div>
        </div>

        <!-- Contact Form -->
        <div class="contact-form">
          <form action="" method="">
            <!-- Name -->
            <label for="name"><span>Name</span></label>
            <input type="text" id="name" name="name" value="" />

            <!-- Email -->
            <label for="email"><span>Email</span></label>
            <input type="text" id="email" name="email" value="" />

            <!-- Subject -->
            <label for="subject"><span>Subject</span></label>
            <input type="text" id="Subject" name="subject" value="" />

            <!-- Message -->
            <label for="message"><span>Message</span></label>
            <textarea id="message" name="message"></textarea>

             <!-- Button -->
            <input type="submit" value="Submit" />
          </form>
        </div>
      </div>
    </section>
  </main>
@endsection
