(function ($) {

    /* Start element slider */
    let ElementCarouselSlider   =   function( $scope, $ ) {

        let element_slides = $scope.find('.element-slides');

        $( document ).general_owlCarousel_item( element_slides );

    };
    /* End element slider */

    /* Start element slides blog  */
    let ElementBlogCarouselSlider   =   function( $scope, $ ) {

        let element_blog_slides = $scope.find('.element-blog__container');

        $( document ).general_multi_owlCarouse( element_blog_slides );

    };
    /* End element slides blog  */

    $( window ).on( 'elementor/frontend/init', function() {

        /* Element slider */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/slides-theme.default', ElementCarouselSlider  );

        /* Element slides blog  */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/blog.default', ElementBlogCarouselSlider  );

    } );

})( jQuery );