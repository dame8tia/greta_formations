<?php get_header(); ?>

<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    <?php 
/*     echo "<pre>";
    echo(get_post_type());
    echo "</pre>"; */
    ?>
    <?php the_content(); ?>

<?php endwhile; endif; ?>
<?php wp_reset_postdata(); ?>

<div class="row">
    <?php
    $query = new WP_Query([
        'post_type'=> 'formation'
    ]);
    /* echo "<pre>";
    var_dump($query->get_posts());
    echo "</pre>"; */
    while($query->have_posts()): $query->the_post();?>
    <div class="col-sm-6">
    <h1><?= the_title(); ?>	</h1>
    <?php
    /* the_id();  */
    /* echo the_date(get_field( 'date_debut' )); */
    ?>
    <?= "Du ".get_field( 'date_debut' )." au ".get_field( 'date_fin' );  ?></br>
    <!-- get_post_meta( $post_id, $key ) -->
    <?php echo "Code ROME : ".get_field( 'code_rome' ); ?></br>
    <?php 
    /*     if (!empty(get_field( 'date_debut' )))
            {echo "Prochaine session : du ".get_field( 'date_debut' )." au ".get_field( 'date_fin' );}
        else
            {echo "Prochaine session : ".get_field( 'date' )."</br>"; }
    endif; */
    ?>
    <?php echo "Lieu de la formation : ".get_field( 'lieu_de_la_formation' ); ?></br>
    <a href="<?php echo get_field('lien_maforma'); ?>" target="_blank">Lien A faire vers fiche indiv</a></br>
    </div>
    <?php endwhile; wp_reset_postdata(); ?>
</div>

<?php get_footer(); ?>