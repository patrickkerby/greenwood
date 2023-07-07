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
        <div class="row headshots">
      @php
      // check if the repeater field has rows of data
      if( have_rows('team_member') ):     
        $count = 0;	 
         // loop through the rows of data
          while ( have_rows('team_member') ) : the_row();
      
              // display a sub field value
              $name = get_sub_field('name');
              $headshot = get_sub_field('headshot');

            @endphp
            @php if( get_sub_field('bio') ): @endphp
              <div class="col-md-6 member">
                <a href="#" data-toggle="modal" data-target="#exampleModalCenter-{{ $count }}">
                  <img src="{{ $headshot }}" alt="{{ $name }}" />
                  <h4>{{ $name }}</h4>
                </a>
                {{-- Bootstrap Modal --}}
                <div class="bio modal {{ $name }} fade" id="exampleModalCenter-{{ $count }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">                 
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
                            <div class="col-sm-10">@php the_sub_field('bio'); @endphp</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            {{-- If no bio, show only the card --}}
            @php else: @endphp            
              <div class="col-md-6 member">
                <img src="{{ $headshot }}" alt="{{ $name }}" />
                <h4>{{ $name }}</h4>
              </div>
            @php endif;
            
						$count++; 
            
            endwhile;      
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
      <div class="grid-layout col-md-12">
        <div class="grid-item feature"> 
          <h2>Keep up!</h2>
          <p><em><strong>follow us on socials for new product releases.</strong></em></p>
          <a href="https://www.instagram.com/greenwooddistillers/" class="button" target="_blank">Instagram</a>
        </div>
        @php 

          $images = get_field('gallery');
          
          if( $images ): @endphp
                  @php foreach( $images as $image ): @endphp
                      <div class="grid-item image" style="background-image: url('@php echo $image['sizes']['large']; @endphp');">
                          <a href="@php echo $image['url']; @endphp" class="slick" target="_blank"></a>
                      </div>
                  @php endforeach; @endphp
          @php endif;		
        @endphp
      </div>  
    </section>

  @endwhile
@endsection
