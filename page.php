<?php get_header(); ?>

    <?php
        $post = get_post($id); 
        $content = apply_filters('the_content', $post->post_content); 
        echo $content;
    ?>

<?php get_footer(); ?>