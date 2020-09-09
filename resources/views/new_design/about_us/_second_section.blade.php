<!-- Mt About Section of the Page -->
<section class="mt-about-sec wow fadeInUp" data-wow-delay="0.4s">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="txt">
          {{-- <h2>{{ $guide_text->title }}</h2> --}}
          {{-- <p>{{ $guide_text->text_body }}</p> --}}
          <h2>@lang('app.welcome_company')</h2>
          @lang('app.txt_company')            
        </div>
        <p style="white-space: pre-line;">
          <strong style="white-space: pre-line;">
            @lang('app.future_with_company')              
            {{-- {{ $guide_text->author_full_name }} --}}
          </strong>
          {{-- {{ $guide_text->author_responsibility }} --}}
        </p>
        <div class="mt-follow-holder">
          <span class="title">@lang('app.subscribe')</span>
          <!-- Social Network of the Page -->
          <ul class="list-unstyled social-network">
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            {{-- <li><a href="#"><i class="fa fa-google-plus"></i></a></li> --}}
            {{-- <li><a href="#"><i class="fa fa-youtube"></i></a></li> --}}
            {{-- <li><a href="#"><i class="fa fa-linkedin"></i></a></li> --}}
            <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
          </ul>
          <!-- Social Network of the Page end -->
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Mt About Section of the Page -->