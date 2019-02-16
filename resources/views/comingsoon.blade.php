{{--
  Template Name: Coming Soon
--}}

@extends('layouts.app')
@section('content')
  @while(have_posts()) @php the_post() @endphp
      @include('partials.content-page')
  @endwhile
  <img class="doodle" src="@asset('images/sketchBottle.svg')" alt="Greenwood Bottle Sketch" />
@endsection
