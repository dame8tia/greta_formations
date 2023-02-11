<?php get_header(); ?>

<?php get_template_part('template-part-tp'); ?>

<?php get_template_part('template-part-tab'); ?>



<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    <?= the_category(); ?>	
    <?= the_content(); ?>	

<?php endwhile; endif; ?>
<?php get_footer(); ?>

