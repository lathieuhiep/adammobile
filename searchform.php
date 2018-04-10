<?php $adammobile_unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label for="<?php echo $adammobile_unique_id; ?>">
        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'adammobile' ); ?></span>
    </label>
    <input type="search" id="<?php echo $adammobile_unique_id; ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Tìm kiếm &hellip;', 'placeholder', 'adammobile' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    <button type="submit" class="search-submit">
        <span class="search-reader-text">
            <i class="fa fa-search"></i>
        </span>
    </button>
</form>