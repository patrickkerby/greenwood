{{--
  Template Name: About Page
--}}
@php
  $team_title = get_field('team_title');    
  $team_subtitle = get_field('team_subtitle');    

  $distillery_title = get_field('distillery_title');  
  $distillery_content = get_field('distillery_content');    

  $gallery_bg = get_field('gallery_image');    

@endphp

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-page')

    <section class="team container">
      <div class="row justify-content-center">
        <h2 class="col-md-10">{{ $team_title }}</h2>
        <h3 class="col-md-10">{{ $team_subtitle }}</h3>
        <div class="row">
      @php
      // check if the repeater field has rows of data
      if( have_rows('team_member') ):      
         // loop through the rows of data
          while ( have_rows('team_member') ) : the_row();
      
              // display a sub field value
              $name = get_sub_field('name');
              $headshot = get_sub_field('headshot');

            @endphp
              <div class="col-md-6 member">
                <img src="{{ $headshot }}" alt="{{ $name }}" />
                <h4>{{ $name }}</h4>
              </div>
            
            @php endwhile;      
            else :      
                // no rows found      
            endif;            
            @endphp
        </div>
      </div>    
    </section>
    <section class="distillery row justify-content-center">
      <div class="col-md-6">
        <h2>{{ $distillery_title }}</h2>
        <div class="content">
            {!! $distillery_content !!}
        </div>
      </div>
    </section>
    <section class="gallery row">
        <div class="col-md-5 feature">
          <h2>Visit us!</h2>
          <p><em><strong>visit us, we’re open for sales and tours!</strong></em></p>
          <a href="https://goo.gl/maps/hcQj7gJSrMq" class="button" target="_blank">Get Directions</a>
        </div>
        <div class="col-md-7 image" style="background-image: url('{{ $gallery_bg }}'); ">
          
        </div>
    </section>

  @endwhile
@endsection
