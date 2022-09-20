<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo the_title(); ?> | <?php bloginfo('name'); ?> </title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="secondary-menu-cont">

</div>

<header class="main-header">
    <div class="container">
        <div class="logo-img">
            <?php echo get_custom_logo()?>
        </div>
        <div class="nav_menu">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'header_menu' ,
                'menu_class' => 'menu',
                'container_class' => 'menu_container')
            );
            ?>
        </div>
        <div class="secondary-menu-button">
            <i></i><i></i><i></i>
        </div>
    </div>
</header>