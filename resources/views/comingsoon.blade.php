{{--
  Template Name: Coming Soon
--}}

@extends('layouts.app')
@section('content')
  @while(have_posts()) @php the_post() @endphp
      @include('partials.content-page')
  @endwhile
  <img class="doodle" src="@asset('images/sketchBottle.svg')" />
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
  </div>
  <?php else :
  endif; ?>
<img src="@asset('images/GreenwoodBadge.svg')" />
@endsection
