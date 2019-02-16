@php
  $footer_background = get_field('footer_background', 'option');
@endphp
<section class="cta container-fluid">
  <a href="">
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
      </div>
      <?php else :
      endif; ?>
      @php dynamic_sidebar('sidebar-footer') @endphp
      <div class="nav col-sm-12">
        <a href="">Home / Product</a>
        <a href="">The Distillery</a>
        <a href="">Location / Contact</a>
      </div>
    </div>
  </div>
</footer>
