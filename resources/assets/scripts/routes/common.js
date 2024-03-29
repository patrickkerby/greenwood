import mapboxgl from 'mapbox-gl/dist/mapbox-gl.js';

export default {
  init() {
    // JavaScript to be fired on all pages
    $('.hamburger').click(function() {
      $(this).toggleClass('is-active');
      $('.nav-mobile').toggleClass('is-active');
      $('body').toggleClass('is-active');
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    $(document).ready(function(){
      $('.grid-layout').slickLightbox({
        itemSelector: '> div > a.slick',
      });
    });

    $(document).ready(function(){
      $('.gallery').slickLightbox({
        itemSelector: '> div > a.slick',
      });

      mapboxgl.accessToken = 'pk.eyJ1IjoicGF0cmlja2tlcmJ5IiwiYSI6ImpxWDBaVFkifQ.t3gbX7-Sfy3Z9Nh14aLFow';
     
      var map = new mapboxgl.Map({
        container: 'map',
        height: '680px',
        style: 'mapbox://styles/patrickkerby/cjsqwgczl5brf1fsea87owcfa',
        center: [-114.297732, 51.767254],
        zoom: 8.0,
      });
    
      map.scrollZoom.disable();
      map.addControl(new mapboxgl.NavigationControl());
    });

    // the current open accordion will not be able to close itself
    $('[data-toggle="collapse"]').on('click',function(e){
      if ( $(this).parents('.accordion').find('.collapse.show') ){
          var idx = $(this).index('[data-toggle="collapse"]');
          if (idx == $('.collapse.show').index('.collapse')) {
              e.stopPropagation();
          }
      }
    });
  },
};
