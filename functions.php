<?php

function ccm_setup_theme_supported_features()
{
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    // add_theme_support( 'post-formats' );
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('menus');

    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('editor-style');
    add_theme_support('custom-logo');
    add_theme_support('custom-background');
    add_theme_support('custom-spacing');




    add_theme_support(
        'html5',
        array(
            'comment-list',
            'comment-form',
            'search-form',
            'gallery', 'caption',
            'style',
            'script'
        )
    );

    add_image_size('logo-footer', 100, 100, true);
    add_filter('image_size_names_choose', 'wpshout_custom_sizes');

    function wpshout_custom_sizes($sizes)
    {
        return array_merge($sizes, array(
            'logo-footer' => __('Logo Footer'),
        ));
    }
}

add_action('after_setup_theme', 'ccm_setup_theme_supported_features');

function ccm_menu()
{
    register_nav_menus(array(
        'header_menu' => __('Header Menu', 'CCM'),
    ));

    register_sidebar(
        array(
            'name'          => __( 'Footer Columna 1', 'ccm' ),
            'id'            => 'footer-1',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>'
        )
    );

    register_sidebar(
        array(
            'name'          => __( 'Footer Columna 2', 'ccm' ),
            'id'            => 'footer-2',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

    register_sidebar(
        array(
            'name'          => __( 'Footer Columna 3', 'ccm' ),
            'id'            => 'footer-3',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );


    register_sidebar(
        array(
            'name'          => __( 'Footer Columna 4', 'ccm' ),
            'id'            => 'footer-4',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

    register_sidebar(
        array(
            'name'          => __( 'Footer base', 'ccm' ),
            'id'            => 'footer-base',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );


}
add_action('widgets_init', 'ccm_menu');


function ccm_theme_name_scripts()
{
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', array(), null, true);
    wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css', array(), filemtime(get_stylesheet_directory() . '/css/animate.css'), 'all');

    // generals
    wp_enqueue_style('generals', get_template_directory_uri() . '/css/generals.css', array(), '1.1', 'all');

    if (is_front_page()){
        // wp_enqueue_style('home', get_template_directory_uri() . '/css/home.css', array(), filemtime(get_stylesheet_directory() . '/css/home.css'), 'all');
        /*
        wp_enqueue_style('owl.carousel.min', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), '1.1', 'all');
        wp_enqueue_style('owl.theme.default.min', get_template_directory_uri() . '/css/owl.theme.default.min.css', array(), '1.1', 'all');
        wp_enqueue_script('owl.carousel.min.js', get_template_directory_uri().'/js/owl.carousel.min.js', array('jquery'), get_stylesheet_directory() . '/js/owl.carousel.min.js', false);
        */
    }

}
add_action('wp_enqueue_scripts', 'ccm_theme_name_scripts');