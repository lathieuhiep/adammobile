<?php

$adammobile_video = get_post_meta(  get_the_ID() , '_format_video_embed', true );

if ( $adammobile_video != '' ):

?>

    <div class="site-post-video">

        <?php if(wp_oembed_get( $adammobile_video )) : ?>

            <?php echo wp_oembed_get($adammobile_video); ?>

        <?php else : ?>

            <?php echo balanceTags($adammobile_video); ?>

        <?php endif; ?>

    </div>

<?php endif;?>