<?php get_header(); ?>

<h1>Accueil <=> Front-page</h1>

<?= get_post_custom_keys(188)?>

<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    <h1><?= the_title(); ?>	</h1>
    <?= the_category(); ?>	
    <?php the_content(); ?>	

<?php endwhile; endif; ?>
<?php wp_reset_postdata(); ?>

<?php
$query = new WP_Query([
    'post_type'=> 'formation'
]);
/* echo "<pre>";
var_dump($query->get_posts());
echo "</pre>"; */
while($query->have_posts()): $query->the_post();?>
<h1><?= the_title(); ?>	</h1>
<?php the_content(); ?>
<?php echo get_field( 'code_rome' ); ?></br>
<?php echo "Prochaine session : ".get_field( 'date' ); ?></br>
<?php echo "Lieu de la formation : ".get_field( 'lieu_de_la_formation' ); ?></br>
<a href="<?php echo get_field('lien_maforma'); ?>" target="_blank">Lien</a></br>
<?php echo "Modalité : ".get_field( 'modalite' ); ?></br>

<?php endwhile; wp_reset_postdata(); ?>


<?php get_footer(); ?>