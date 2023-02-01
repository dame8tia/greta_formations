<?php get_header(); ?>

<?php if( have_posts() ) : ?>	
    <?php while( have_posts() ) : the_post(); ?>
    <h1><?= the_title(); ?>	</h1>
    
    <?php the_content(); ?>	
    <?= "_____________________________________"; ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>