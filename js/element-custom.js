(function ($) {

    var WidgetCarouselHandler   =   function( $scope, $ ) {

        var element_slides = $scope.find('.element-slides');

        general_owlCarousel_item( element_slides, false, false, false, true );

    };

    $( window ).on( 'elementor/frontend/init', function() {

        elementorFrontend.hooks.addAction( 'frontend/element_ready/slides-theme.default', WidgetCarouselHandler  );

    } );

})(jQuery);