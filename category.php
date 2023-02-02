<?php get_header(); ?>

<?php 
    if ( is_category() ) {
        $title = "Catégorie : " . single_tag_title( '', false );
    }
    elseif ( is_tag() ) {
        $title = "Étiquette : " . single_tag_title( '', false );
    }
    elseif ( is_search() ) {
        $title = "Vous avez recherché : " . get_search_query();
    }
    elseif ( is_archive() ) {
        $title =  "Archive : " . wp_title();
    }
	else {
        $title = 'Le Blog';
    }
?>
<h1><?php echo $title; ?></h1>

<?php if( have_posts() ) : ?>	
    <?php while( have_posts() ) : the_post(); ?>
    <h1><?= the_title(); ?>	</h1>
    
    <?php the_content(); ?>	
    <?= "_____________________________________"; ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>