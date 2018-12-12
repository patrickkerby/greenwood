<?php

  $image = get_field('bg_image');
  $size = 'full'; // (thumbnail, medium, large, full or custom size)
  $overlay = get_field('overlay');	
  $sub_heading = get_field('sub_heading');

  if( $image ) { ?>
      <header class="banner angle--bottom-left" style="background-image: linear-gradient(rgba(34,39,32,0.<?php echo $overlay; ?>), rgba(34,39,32,0.<?php echo $overlay; ?>)), url('<?php echo $image; ?>');">
    <?php }
    else { ?>
      <header class="banner angle--bottom-left">
  <?php }
  ?>
    {{-- <a class="brand" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a> --}}
    <img src="@asset('images/GreenwoodLogo.svg')" />
    <h2><?php echo $sub_heading; ?></h2>
    {{-- <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </nav> --}}
</header>

