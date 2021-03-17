@php
  $image = get_field('bg_image');
  $size = 'full'; // (thumbnail, medium, large, full or custom size)
  $overlay = get_field('overlay');	
  $sub_heading = get_field('sub_heading');
  
  $intro_bar = get_field('intro_bar');
@endphp

 {{-- Hamburger Menu --}}
 <button class="hamburger hamburger--minus d-md-none" type="button">
    <span class="hamburger-box">
      <span class="hamburger-inner"></span>
    </span>
  </button>
  <nav class="nav-mobile">
    @if (has_nav_menu('primary_navigation'))
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
    @endif
  </nav>
  <?php
  if( $image ) { ?>
      <header class="banner row angle--bottom-left" style="background-image: linear-gradient(rgba(34,39,32,0.<?php echo $overlay; ?>), rgba(34,39,32,0.<?php echo $overlay; ?>)), url('<?php echo $image; ?>');">
    <?php }
    else { ?>
      <header class="banner row angle--bottom-left">
  <?php } ?>
    <nav class="nav-primary d-none d-md-block">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </nav>
    <div class="subheading col-sm-6">
      <img src="@asset('images/GreenwoodLogo.svg')" alt="Greenwood Distillers Logo" />
      <?php echo $sub_heading; ?>
      <div class="row justify-content-center">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Subscribe for updates!
        </button>                     
      </div>
    </div>
  </header>
  @if ( $intro_bar )
  <img class="doodle" src="@asset('images/sketchBottle.svg')" alt="Greenwood Bottle Sketch" />
  <section class="intro-bar container-fluid angle--bottom-right">
    <div class="row no-gutters justify-content-center">
      <div class="col-sm-4 col-xs-8">
        <h3>{{ $intro_bar }}</h3>
      </div>
    </div>
  </section>
  @endif

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Hi!</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body container">
          <div class="row justify-content-center">
            <p class="col-sm-7">We won't spam you. Promise. You can expect to recieve the occasional email about new products as we come up with them, updates to our taproom hours, etc.</p>
          </div>
          <div class="row justify-content-center">
            <!-- Begin Mailchimp Signup Form -->
            <div id="mc_embed_signup" class="col-sm-10 col-md-10">
              <form action="https://greenwooddistillers.us7.list-manage.com/subscribe/post?u=aa10af12443a1e28c18e3f984&amp;id=3b6b5a64da" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                <div id="mc_embed_signup_scroll">
                  <div class="mc-field-group">                  
                    <input type="email" value="" name="EMAIL" placeholder="Email Address *" class="required email" id="mce-EMAIL"> <br />
                  </div>
                  <div class="mc-field-group">
                    <input type="text" value="" name="FNAME" class="" placeholder="First Name" id="mce-FNAME"> <br />
                  </div>
                  <div class="mc-field-group">
                    <input type="text" value="" name="LNAME" class="" placeholder="Last Name" id="mce-LNAME"> <br />
                  </div>
                </div>
                <div id="mce-responses" class="clear">
                  <div class="response" id="mce-error-response" style="display:none"></div>
                  <div class="response" id="mce-success-response" style="display:none"></div>
                </div>    
                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                <div style="position: absolute; left: -5000px;" aria-hidden="true">
                  <input type="text" name="b_aa10af12443a1e28c18e3f984_3b6b5a64da" tabindex="-1" value="">
                </div>
                <div class="clear">
                  <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
                </div>
              </div>
              </form>
            </div>
            <!--End mc_embed_signup-->
          </div>
        </div>        
      </div>
    </div>
  </div> 