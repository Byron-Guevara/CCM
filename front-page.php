<?php get_header(); ?>

    <?php
        $post = get_post($id); 
        $content = apply_filters('the_content', $post->post_content); 
        echo $content;
    ?>

<?php get_footer(); ?>

<link rel='stylesheet' id='uagb-slick-css-css'  href='http://localhost:8888/ccm/wp-content/plugins/ultimate-addons-for-gutenberg/assets/css/slick.min.css?ver=2.0.7' media='all' />
<script src='http://localhost:8888/ccm/wp-content/plugins/ultimate-addons-for-gutenberg/assets/js/slick.min.js?ver=2.0.7' id='uagb-slick-js-js'></script>

<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/owl.theme.default.min.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/owl.carousel.min.css">
<script src="<?php echo get_template_directory_uri() ?>/js/owl.carousel.min.js"></script>

<script>
    $(document).ready(function(e) {
/*
        $('#slider7').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            centerMode: true,
            centerPadding: '60px',
            prevArrow: $(this).find('.prev-image'),
            nextArrow: $(this).find('.next-image'),
            infinite: true,
        });
*/
        $(".contenedor-carrusel").owlCarousel({
            nav: true,
            loop:false,
            dots: false,
            pagination: false,
            margin: 35,
            autoHeight: false,
            stagePadding: 140,
            items: 2,
            navText: ["<img src='<?php echo get_template_directory_uri() ?>/img/flecha-izquierda-azul.png'>", "<img src='<?php echo get_template_directory_uri() ?>/img/flecha-derecha.png'>"],
            responsive : {
                0 : {
                    items: 1,
                    stagePadding: 0,
                },
                768 : {
                    items: 2,
                    stagePadding: 40,
                },
                1024 : {
                    items: 2,
                    stagePadding: 140,
                },
            }
        });

    }); 
</script>