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
    wp_enqueue_script('custom.js', get_template_directory_uri().'/js/custom.js', array('jquery'), get_stylesheet_directory() . '/js/custom.js', false);
    wp_enqueue_style('generales', get_template_directory_uri() . '/css/generales.css', array(), filemtime(get_stylesheet_directory() . '/css/generales.css'), 'all');
    wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css', array(), filemtime(get_stylesheet_directory() . '/css/animate.css'), 'all');
}
add_action('wp_enqueue_scripts', 'ccm_theme_name_scripts');


//BLOG
add_action( 'init', 'ccm_post_type_blog' );
function ccm_post_type_blog() {

    $labels = array(
    'name'               => __( 'Blog' ),
    'singular_name'      => __( 'Blog' ),
    'add_new'            => __( 'Agregar Nuevo' ),
    'add_new_item'       => __( 'Agregar Nuevo' ),
    'edit_item'          => __( 'Editar' ),
    'new_item'           => __( 'Nuevo' ),
    'all_items'          => __( 'Todos' ),
    'view_item'          => __( 'Ver' ),
    'search_items'       => __( 'Buscar' ),
    'not_found' => 'No se han encontrado resultados',
		'not_found_in_trash' => 'No se han encontrado resultados en la papelera'
    );

    $args = array(
    'labels'            => $labels,
    'description'       => 'Información especifica',
    'public'            => true,
    'menu_position'     => 5,
    'show_in_rest'      => true,
    'supports'          => array( 'title', 'editor', 'page-attributes', 'editor', 'thumbnail', 'excerpt', 'comments'),
    'has_archive'       => true,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'query_var'         => 'blog'
    );

    register_post_type( 'blog', $args);

}
function taxonomias_blog() {
    register_taxonomy(
      'blog_categorias',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
      'blog',        //post type name
        array(
            'hierarchical' => true,
            'label' => 'Categoría',  //Display name
            'query_var' => true,
            'rewrite' => array(
              'slug' => 'slug_blog', // This controls the base slug that will display before each term
              'with_front' => false // Don't display the category base before
            )
        )
    );
}
add_action( 'init', 'taxonomias_blog');

//WEBINAR
add_action( 'init', 'ccm_post_type_webinar' );
function ccm_post_type_webinar() {

    $labels = array(
    'name'               => __( 'Webinar' ),
    'singular_name'      => __( 'Webinar' ),
    'add_new'            => __( 'Agregar Nuevo' ),
    'add_new_item'       => __( 'Agregar Nuevo' ),
    'edit_item'          => __( 'Editar' ),
    'new_item'           => __( 'Nuevo' ),
    'all_items'          => __( 'Todos' ),
    'view_item'          => __( 'Ver' ),
    'search_items'       => __( 'Buscar' ),
    'not_found' => 'No se han encontrado resultados',
		'not_found_in_trash' => 'No se han encontrado resultados en la papelera'
    );

    $args = array(
    'labels'            => $labels,
    'description'       => 'Información especifica',
    'public'            => true,
    'menu_position'     => 5,
    'show_in_rest'      => true,
    'supports'          => array( 'title', 'editor', 'page-attributes', 'editor', 'thumbnail', 'excerpt', 'comments'),
    'has_archive'       => true,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'query_var'         => 'webinar'
    );

    register_post_type( 'webinar', $args);

}
function taxonomias_webinar() {
    register_taxonomy(
      'webinar_categorias',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
      'webinar',        //post type name
        array(
            'hierarchical' => true,
            'label' => 'Categoría',  //Display name
            'query_var' => true,
            'rewrite' => array(
              'slug' => 'slug_webinar', // This controls the base slug that will display before each term
              'with_front' => false // Don't display the category base before
            )
        )
    );
}
add_action( 'init', 'taxonomias_webinar');

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // Carrusel Blog.
        acf_register_block_type(array(
            'name'              => 'blog-carrusel',
            'title'             => __('Blog Carrusel'),
            'description'       => __('Blog Carrusel.'),
            'render_template'   => 'blocks/blog-carrusel.php',
            'category'          => 'ap-blocks',
            'icon'              => 'format-gallery',
            'keywords'          => array( 'blog-carrusel', 'quote' ),
        ));

        // Carrusel Videos.
        acf_register_block_type(array(
            'name'              => 'videos-carrusel',
            'title'             => __('Videos Carrusel'),
            'description'       => __('Videos Carrusel.'),
            'render_template'   => 'blocks/videos-carrusel.php',
            'category'          => 'ap-blocks',
            'icon'              => 'format-gallery',
            'keywords'          => array( 'videos-carrusel', 'quote' ),
        ));

    }
}
add_post_type_support( 'themes', 'thumbnail' );

function get_excerpt( $count ) {
    $excerpt = get_the_content();
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $count);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = '<p>'.$excerpt.'...</p>';
    return $excerpt;
}