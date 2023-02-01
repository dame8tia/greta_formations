<?php get_header(); ?>

<h1>Pages</h1>

<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

    <?php the_content(); ?>	

<?php endwhile; endif; ?>

<?php get_footer(); ?>