export default {
  init() {
    // JavaScript to be fired on the about us page
    $(document).ready(function(){
      $('.gallery').slickLightbox({
        itemSelector: '> div > a',
      });
    });
  },
};
