<?php

/**
 * Blog Carrusel Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'blog-carrusel-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'blog-carrusel';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

?>

    <div class="contenedor-general-carrusel">
        <div class="contenedor-carrusel owl-carousel owl-theme">
            <?php
            $args = array( 'post_type' => 'blog', 'post_status' => 'publish', 'posts_per_page' => -1);
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
                $thumbID = get_post_thumbnail_id( $post->ID );
                $imgDestacada = wp_get_attachment_url( $thumbID );
            ?>
            <a href="<?php the_permalink(); ?>" class="cont-item">
                <div class="cont-size" style="background-image: url(<?php echo $imgDestacada; ?>);">
                </div>
                <div class="cont-info">
                    <div class="info">
                        <p>
                            <strong>
                                <?php the_title(); ?>
                            </strong>
                        </p>
                        <?php echo get_excerpt(100); ?>
                        <span> Ver más </span>
                    </div>
                </div>
            </a>
            <?php
                endwhile;
            ?>
        </div>
    </div>

<!--
    <div class="uagb-slick-carousel blog-carrusel">
        <div class='single-item' id="slider7">
            <?php
            $args = array( 'post_type' => 'blog', 'post_status' => 'publish', 'posts_per_page' => -1, 'orderby'=>'fecha', 'order'=>'ASC');
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
                $thumbID = get_post_thumbnail_id( $post->ID );
                $imgDestacada = wp_get_attachment_url( $thumbID );
            ?>
            <a href="<?php the_permalink(); ?>" class="cont-item">
                <div class="cont-size" style="background-image: url(<?php echo $imgDestacada; ?>);">
                </div>
                <div class="cont-info">
                    <div class="info">
                        <p>
                            <strong>
                                <?php the_title(); ?>
                            </strong>
                        </p>
                        <?php echo get_excerpt(100); ?>
                        <span> Ver más </span>
                    </div>
                </div>
            </a>
            <?php
                endwhile;
            ?>
        </div>
        <div class="flechas-links">
                <div class="prev-image" style="background: white"> <img src="<?php echo get_template_directory_uri().'/img/flecha-izquierda-azul.png'; ?>" alt=""> </div>
                <div class="next-image" style="background: #0181da"> <img src="<?php echo get_template_directory_uri().'/img/flecha-derecha.png'; ?>" alt=""> </div>
        </div>
    </div>
-->