<?php get_header(); ?>
        
<div class="container">
    <?php
    if (have_posts()):
    while (have_posts()): the_post();
    
        get_template_part( 'loop' );

    endwhile;
    endif;
    ?>
</div>

<?php get_footer(); ?>