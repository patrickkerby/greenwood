@php
  $footer_background = get_field('footer_background', 'option');
@endphp
<section class="cta container-fluid">
  <a href="https://goo.gl/maps/hcQj7gJSrMq" target="_blank">
    <h5>Come visit us in Sundre, Alberta! <span>Click here for directions.</span></h5>  
  </a>
</section>
<footer class="container-fluid" style="background-image: url('{{ $footer_background }}');">
  <svg viewBox="0 0 100 100" preserveAspectRatio="none">  
    <polygon points="0,100 0,75 50,0 100,75 100,100" class="triangle" />
  </svg>
  <div class="row justify-content-center">
    <div class="col-xs-10 col-sm-5">
      <img src="@asset('images/GreenwoodBadge.svg')" alt="Greenwood Distillers Logo" />
      <?php
      // check if the repeater field has rows of data
      if( have_rows('hours_of_operation', 'option') ):?>
      <div class="hours_operation"></div>
        <?php while ( have_rows('hours_of_operation', 'option') ) : the_row();  
          // get data and store in variables
          $title = get_sub_field('title', 'option');
          $details = get_sub_field('details', 'option'); 
        ?>
          <h4><?php echo $title; ?></h4>
          <p><?php echo $details; ?></p>
        <?php endwhile; ?>
        <address>#2, 306 Main Avenue<br />Sundre, Alberta</address>
        <a href="https://www.instagram.com/greenwooddistillers/" target="_blank" class="social"><img src="@asset('images/instagram.svg')" alt="Instagram Logo" /></a>
        <a href="https://www.facebook.com/greenwooddistillers" target="_blank" class="social"><img src="@asset('images/facebook.svg')" alt="Facebook Logo" /></a>
      </div>
      <?php else :
      endif; ?>
      @php dynamic_sidebar('sidebar-footer') @endphp
      <div class="nav col-sm-12">
        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
        @endif
      </div>
    </div>
  </div>
</footer>
