<<<<<<< HEAD
<?php get_header(); ?>

    <?php
        $post = get_post($id); 
        $content = apply_filters('the_content', $post->post_content);
        echo $content;
    ?>

<?php get_footer(); ?>
=======
<?php
    get_header();

    if (have_posts()):
        while (have_posts()):
            the_post();
            the_content();
        endwhile;
    endif;

    get_footer();
<<<<<<< HEAD
?>
=======
?>
>>>>>>> ff23a202443885ceb97e00c37f0a3afabebea7c4
>>>>>>> 9a42d25f8be39023a2dca9355c059a992ad33acc
