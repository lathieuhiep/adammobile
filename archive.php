<?php get_header(); ?>

<div class="site-container site-blog site-archive">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>

                        <div id='post-<?php the_ID(); ?>' <?php post_class('col-md-3'); ?>>
                            <div class="wrapper">
                                <div class="media">
                                    <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                                        <?php the_post_thumbnail(); ?>
                                    </a>
                                </div>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h3>
                            </div>
                            <div class="clearfix"></div>
                        </div>


                    <?php

                    endwhile;

                        adammobile_pagination();

                    endif;

                    ?>
                </div>


            </div>

            <?php get_sidebar(); ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>

