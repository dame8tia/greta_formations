<?php

/* 
Template Name: template articles
Template Post Type: page, post
*/

?>

<?php get_header(); ?>

<h1>ici notre Template Card articles</h1>

<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>