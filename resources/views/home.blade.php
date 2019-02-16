{{--
  Template Name: Home Page
--}}

@php

  $product_title = get_field('product_title');
  $product_data = get_field('product_data');
  $product_description = get_field('product_description');
  $product_button = get_field('product_button');
  $product_image = get_field('product_image');

  $image_first_slide = get_field('image_first_slide'); 

@endphp

@extends('layouts.app')
@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-page')

    <div class="row product" style="background-image: url('{{ $product_image }}');">
      <div class="d-block d-sm-none"><img src="{{ $product_image }}" alt="{{ $product_title }} Illustration" /></div>
      <div class="col-sm-7 col-md-6 offset-sm-1">
        <h2>{{ $product_title }}</h2>
        <h3>{{ $product_data }}</h3>
        <div>
          @php echo $product_description; @endphp
        </div>
        @php 
          if( $product_button ): 
            $link_url = $product_button['url'];
            $link_title = $product_button['title'];
            $link_target = $product_button['target'] ? $product_button['target'] : '_self';
            @endphp
            <a class="button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
          <?php endif; ?>
      </div>
    </div>

    <section id="carouselFade" class="carousel carousel-fade slide row" data-ride="carousel">
      <svg viewBox="0 0 100 100" preserveAspectRatio="none" class="frame-top">  
        <polygon points="0,100 0,0 100,0 90,100" />
      </svg>
      <svg viewBox="0 0 100 100" preserveAspectRatio="none" class="frame-bottom">  
        <polygon points="0,100 10,0 100,0 100,100" />
      </svg>
      <div class="carousel-inner">  
          <div class="carousel-item active" style="background-image: url('{{ $image_first_slide }}');"></div>

          @php if( have_rows('image_slider') ):
            while ( have_rows('image_slider') ) : the_row(); 
            $image_slide = get_sub_field('image_slider'); 
          @endphp
          
          <div class="carousel-item" style="background-image: url('{{ $image_slide }}');"></div>
          
          @php endwhile;
            else :
              // no rows found
            endif;
          @endphp
          <a class="carousel-control-prev" href="#carouselFade" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselFade" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>
      </section>
  @endwhile
@endsection
