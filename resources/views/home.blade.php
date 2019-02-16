{{--
  Template Name: Home Page
--}}

@php

  $product_title = get_field('product_title');
  $product_data = get_field('product_data');
  $product_description = get_field('product_description');
  $product_button = get_field('product_button');
  $product_image = get_field('product_image');

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
  @endwhile
@endsection
