<!-- Mt About Section of the Page -->
<section class="mt-about-sec wow fadeInUp" data-wow-delay="0.4s">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="txt">
            <h2>{{ $guide_text->title }}</h2>
            <p>{{ $guide_text->text_body }}</p>            
          </div>
          <p style="white-space: pre-line;">
            <strong style="white-space: pre-line;">{{ $guide_text->author_full_name }}</strong>
            {{ $guide_text->author_responsibility }}
          </p>
          <div class="mt-follow-holder">
            <span class="title">Follow Us</span>
            <!-- Social Network of the Page -->
            <ul class="list-unstyled social-network">
              <li><a href="{{ $guide_text->author_twitter_link }}"><i class="fa fa-twitter"></i></a></li>
              <li><a href="{{ $guide_text->author_facebook_link }}"><i class="fa fa-facebook"></i></a></li>
              {{-- <li><a href="#"><i class="fa fa-google-plus"></i></a></li> --}}
              {{-- <li><a href="#"><i class="fa fa-youtube"></i></a></li> --}}
              {{-- <li><a href="#"><i class="fa fa-linkedin"></i></a></li> --}}
              <li><a href="{{ $guide_text->author_whatsapp_link }}"><i class="fa fa-whatsapp"></i></a></li>
            </ul>
            <!-- Social Network of the Page end -->
          </div>
        </div>
      </div>
    </div>
</section>
<!-- Mt About Section of the Page -->