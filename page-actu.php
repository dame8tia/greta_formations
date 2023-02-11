<?php get_header(); ?>

<h2>Retrouvez ici toutes nos actualités </h2>

<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    <h1><?= the_title(); ?>	</h1>
    <h2><?= the_content(); ?>	</h2>

<?php endwhile; endif; ?>

<?php get_footer(); ?>