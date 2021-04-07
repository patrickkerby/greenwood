{{--
  Template Name: Home Page
--}}

@extends('layouts.app')
@section('content')

  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-page')

    <div class="row products justify-content-center">
       
        @if( have_rows('products') )     
          
          @foreach ($products as $item)

            {{-- Determine how many columns the grid should have --}}
            @if ($loop->count === 3 )
              <div class="col-sm-4 justify-content-center product">
            @else
              <div class="col-sm-5 justify-content-center product">
            @endif
              <img class="thumb" src="{{ $item->product_thumbnail }}" alt="{{ $item->product_title }}" />
              <h2>{{ $item->product_title }}</h2>
              <h3>{{ $item->product_subtitle }}</h3>
              <a class="button" href="#" data-toggle="modal" data-target="#exampleModalCenter-{{ $loop->iteration }}">Tell me more&hellip;</a>
              </div>
            {{-- Product Modal --}}
            @if ($item->product_details)
            <section>
              <div class="product_detail modal fade" id="exampleModalCenter-{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">                 
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
                          <div class="col-sm-8">{!! $item->product_details !!}</div>
                        </div>
                        {{-- Product Recipes --}}
                        @if($item->recipes_title)
                          <section id="recipes" class="stockists container">
                            <div class="row justify-content-center">
                              <div class="col-md-10">
                                <h2>{{ $item->recipes_title }}</h2>
                                <h3>{{ $item->recipes_subtitle }}</h3>
                              </div>
                            </div>
                            <div class="row"> 
                            @if($item->recipes)         
                              @foreach($item->recipes as $recipe)
                                <div class="col-md-4 col-sm-6 info">
                                  {!! $recipe->info !!}
                                  <svg viewBox="0 0 10 10"><polygon points="5,0 0,5 5,10 10,5"></polygon></svg>
                                </div>
                              @endforeach
                            @endif
                            </div>
                          </section>
                          @else
                        @endif
                        {{-- Product specific gallery --}}
                        
                        @if($item->product_gallery)
                        <section class="gallery row">
                            <div class="grid-layout col-md-12">                            
                                @foreach ($item->product_gallery as $photo)
                                  <div class="grid-item image" style="background-image: url('{{ $photo->sizes->large }}');">
                                    <a href="{{ $photo->url }}" target="_blank"></a>
                                  </div>
                                @endforeach
                            </div>  
                          </section>
                        @endif 
                        <div class="row justify-content-center">
                          <img src="@asset('images/GreenwoodBadge.svg')" alt="Greenwood Distillers Logo" class="logo-badge col-sm-4" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            @else
            @endif
          @endforeach
        @else
          // no rows found      
      @endif            
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
            <h3>{{ $stockists_subtitle }}</h3>
          </div>
        </div>
        <div class="row">          
          @if ($stockists)
            @foreach ($stockists as $item)
              <div class="col-md-4 col-sm-6 info">
                {!! $item->info !!}
                <svg viewBox="0 0 10 10"><polygon points="5,0 0,5 5,10 10,5"></polygon></svg>
              </div>
            @endforeach
          @endif
          </div>
        @if ($stockists_cta)
          <a class="button" href="{{ $stockists_cta->url }}" target="{{ $stockists_cta->target }}">{{ $stockists_cta->title }}</a>
        @endif
      </section>
  @endwhile
@endsection
