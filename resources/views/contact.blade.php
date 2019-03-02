{{--
  Template Name: Contact Page
--}}
@php
  $contact_left = get_field('contact-left');    
  $contact_right = get_field('contact-right'); 
@endphp

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <section class="contact container">
      <div class="row">
          <div class="col-md-8 offset-md-2">
            @include('partials.content-page')
          </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          @php echo $contact_left; @endphp
        </div>
        <div class="col-md-5 offset-md-1">
          @php echo $contact_right; @endphp
        </div>
      </div>
    </section>
    <section id="map" class="map no-gutters"></section>
  @endwhile
@endsection
