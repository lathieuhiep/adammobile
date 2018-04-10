<?php

$adammobile_gallery = get_post_meta(  get_the_ID() , '_format_gallery_images', true );

if( $adammobile_gallery != '' ) :

?>

    <div class="site-post-slides owl-carousel owl-theme">

            <?php

            foreach($adammobile_gallery as $adammobile_image) :

                $adammobile_image_src = wp_get_attachment_image_src( $adammobile_image, 'full-thumb' );

                $adammobile_caption = get_post_field('post_excerpt', $adammobile_image);
            ?>

                <div class="site-post-slides__item">

                    <img src="<?php echo esc_url($adammobile_image_src[0]); ?>" <?php echo ( $adammobile_caption != '' ? 'title="' . esc_attr( $adammobile_caption ) . '"' : '' ); ?> alt="<?php echo sanitize_title(get_the_title())?>"/>
                </div>

            <?php endforeach; ?>

    </div>

<?php endif; ?>