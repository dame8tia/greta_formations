<?php get_header(); ?>

<h1>Retrouvez ici nos valeurs</h1>

<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

    <?= the_category(); ?>	
    <?= the_content(); ?>	

<?php endwhile; endif; ?>

<?php get_footer(); ?>