@if( have_rows('news_posts') )        

  <div class="row posts justify-content-center align-items-center">
    <div class="col-md-4">
      <h2>What is happenin</h2>
      <h3>News, updates, etc.</h3>
    </div>
    <div id="carouselExampleControls" class="carousel slide row justify-content-around col-md-8 " data-ride="carousel">
      <div class="carousel-inner">
        
          @foreach($news_posts as $post)
            @if($post->post_image)
              @php $text_or_image = "img"; @endphp
            @else
              @php $text_or_image = "text"; @endphp
            @endif
                    
            @if ($loop->first)
              @php $active = "active"; @endphp               
            @else 
              @php $active = ""; @endphp
            @endif

            @if ($loop->first || $loop->iteration == 3 || $loop->iteration == 5 || $loop->iteration == 7 )
              <div class="carousel-item {{ $active }}">
                <div class="row">  
            @endif
                  <div class="col-sm-6 slide-item">
                    <div class="post-card {{ $text_or_image }}">
                      @if($post->post_image)
                        <img src="{{ $post->post_image->url }}" />
                      @endif
                      <p>{{ $post->post_text }}</p>
                      @if($post->additional_information)
                        <a href="#" target="_blank" class="more" data-toggle="modal" data-target="#postModal-{{ $loop->iteration }}">+tell me more</a>
                      @endif
                    </div>
                  </div>
                
            @if ($loop->last || $loop->iteration == 2 || $loop->iteration == 4 || $loop->iteration == 6 )
                </div>
              </div>
            @endif          
          @endforeach
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  @endif        
