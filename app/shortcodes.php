<?php

namespace App;

add_shortcode('testimonials', function( $atts ) {
    extract(shortcode_atts([
        'limit' => 4,
    ], $atts));

    $query = new \WP_Query([
        'post_type'      => 'testimonials',
        'posts_per_page' => !is_admin() ? $limit : 1
    ]);

    if ( $query->have_posts() ) {
        return \App\template('partials.shortcodes.testimonials', ['posts' => $query->posts]);
    }

    return;
});

add_shortcode('featured-listings', function( $atts ) {
    extract(shortcode_atts([
        'limit' => 3,
    ], $atts));

    $query = new \WP_Query([
        'post_type'      => 'listings',
        'posts_per_page' => $limit
    ]);

    if ( $query->have_posts() ) {
        return \App\template('partials.shortcodes.featured-listings', ['posts' => $query->posts]);
    }

    return;
});

add_shortcode('portals', function( $atts ) {

});
