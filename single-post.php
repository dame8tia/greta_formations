<?php get_header(); ?>

<p class="">Single post</p>




<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    <h1><?php the_title(); ?></h1>
    <p>
        <img src="<?php the_post_thumbnail_url(); ?>" alt="" width=100px height=100px>

    </p>
    <?php the_content(); ?>	

<?php endwhile; endif; ?>

<?php get_footer(); ?>