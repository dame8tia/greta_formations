<?php get_header(); ?>

<h1>Page.php</h1>


<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    <h1><?= the_title(); ?>	</h1>
    <?= the_category(); ?>	
    <?= the_content(); ?>	

<?php endwhile; endif; ?>

<?php get_footer(); ?>