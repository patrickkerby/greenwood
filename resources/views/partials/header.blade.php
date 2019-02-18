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
    <div class="subheading col-sm-8">
      <img src="@asset('images/GreenwoodLogo.svg')" alt="Greenwood Distillers Logo" />
      <?php echo $sub_heading; ?>
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
