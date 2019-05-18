{{--
  Template Name: Home Page
--}}

@php

  $image_first_slide = get_field('image_first_slide'); 

  $stockist_title = get_field('stockist_title');
  $stockist_subtitle = get_field('stockists_subtitle');
  $stockists_cta = get_field('stockists_cta');

@endphp

@extends('layouts.app')
@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-page')

    <div class="row products">
      
      @php 
        if( have_rows('products') ):     
          
          $count = 0;	 

          while ( have_rows('products') ) : the_row();      

            $thumb = get_sub_field('product_thumbnail');
            $title = get_sub_field('product_title');
            $subtitle = get_sub_field('product_subtitle');
            $details = get_sub_field('product_details');
            @endphp 

            <div class="col-sm-6 justify-content-center product">
              <img class="thumb" src="{{ $thumb }}" alt="{{ $title }}" />
              <h2>{{ $title }}</h2>
              <h3>{{ $subtitle }}</h3>
              <a class="button" href="#" data-toggle="modal" data-target="#exampleModalCenter-{{ $count }}">Tell me more&hellip;</a>
            </div>

            {{-- Product Modal --}}
            @php if( get_sub_field('product_details') ): @endphp
            <div class="product_detail modal fade" id="exampleModalCenter-{{ $count }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">                 
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="container-fluid">
                      <div class="row justify-content-center">                            
                        <div class="col-sm-8">@php the_sub_field('product_details'); @endphp</div>
                      </div>
                      {{-- Product specific gallery --}}
                      <section class="gallery row">
                        <div class="grid-layout col-md-12">
                          @php 
                            $images = get_sub_field('product_gallery');
                            
                            if( $images ): @endphp
                                    @php foreach( $images as $image ): @endphp
                                        <div class="grid-item image" style="background-image: url('@php echo $image['sizes']['large']; @endphp');">
                                            <a href="@php echo $image['url']; @endphp" target="_blank"></a>
                                        </div>
                                    @php endforeach; @endphp
                            @php endif;		
                          @endphp
                        </div>  
                      </section>
                      <div class="row justify-content-center">
                        <img src="@asset('images/GreenwoodBadge.svg')" alt="Greenwood Distillers Logo" class="logo-badge col-sm-4" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @php else:         
            // no results
          endif; @endphp

            @php
              $count++; 
                endwhile;      
              else :      
                // no rows found      
              endif;            
            @endphp
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

      <section id="stockists" class="stockists container">
        <div class="row justify-content-center">
          <div class="col-md-10">
            <h2>{{ $stockist_title }}</h2>
            <h3>{{ $stockist_subtitle }}</h3>
          </div>
        </div>
        <div class="row">
          @php if( have_rows('stockists') ):
            while ( have_rows('stockists') ) : the_row(); 
              $info = get_sub_field('info'); 
              echo '<div class="col-md-4 col-sm-6 info">'. $info .'<svg viewBox="0 0 10 10"><polygon points="5,0 0,5 5,10 10,5"></polygon></svg></div>';
            endwhile;
            else :
              // no rows found
            endif;
          @endphp
        </div>
        @php
         if( $stockists_cta ): 
            $link_url = $stockists_cta['url'];
            $link_title = $stockists_cta['title'];
            $link_target = $stockists_cta['target'] ? $stockists_cta['target'] : '_self';
        @endphp
            <a class="button" href="@php echo esc_url($link_url); @endphp" target="@php echo esc_attr($link_target); @endphp">@php echo esc_html($link_title); @endphp</a>
        @php endif;   
        @endphp
      </section>
  @endwhile
@endsection
