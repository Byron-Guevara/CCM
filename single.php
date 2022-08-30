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
?>
>>>>>>> ff23a202443885ceb97e00c37f0a3afabebea7c4
