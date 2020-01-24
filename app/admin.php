<?php

namespace App;

/**
 * Theme customizer
 */
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {
    // Add postMessage support
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);
});

/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});

/**
 * Theme option pages
 */
if ( class_exists('ACF') && function_exists('acf_add_options_page') ) {
    acf_add_options_page([
      'page_title' => 'Theme Options',
      'menu_title' => 'Theme Options',
      'menu_slug'  => 'theme-options',
      'capability' => 'edit_posts',
      'icon_url'   => 'dashicons-admin-site-alt3',
      'redirect'   => false
    ]);
}
