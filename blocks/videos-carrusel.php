<?php

/**
 * Videos Carrusel Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'videos-carrusel-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'videos-carrusel';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

?>
<?php if(have_rows('videos')): ?>
    <div class="contenedor-general-carrusel">
        <div class="contenedor-carrusel owl-carousel owl-theme">
            <?php while(have_rows('videos')): the_row(); ?>
                <div class="cont-item">
                    <video preload playsinline loop autobuffer controls>
                        <source src="<?php the_sub_field('video'); ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>