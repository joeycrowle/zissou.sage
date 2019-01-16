(function($) {
  // Site title
  wp.customize('blogname', function(value) {
    value.bind(function(to) {
      $('.brand').text(to);
    });
  });


  // Header Colour
  wp.customize('header_colour', function(value) {
    value.bind(function(to) {
      $('head').append('<style>.inner{background-color:'+ to +' !important;}</style>');
    });
  });

})(jQuery);
