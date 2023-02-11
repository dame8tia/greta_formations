<?php get_header(); ?>

<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>

<?php endwhile; endif; ?>


<?php wp_reset_postdata(); ?>
<!-- 

<div class="row">
    <?php
    //$query = new WP_Query([
    //    'post_type'=> 'formation',
    //    'order' => 'DESC', // 
    //    'orderby' => 'meta_value',
    //    'meta_key' => 'date_debut', // C'est ici qu'on indique quel est ce champ
    //]);

    //while($query->have_posts()): $query->the_post();?>
    <div class="col-sm-6">
    <h1><?//= //the_title(); ?>	</h1>
    <?//= //"Du ".get_field( 'date_debut' )." au ".get_field( 'date_fin' );  ?></br>

    <?php //echo "Code EN : ".get_field( 'code_en' ); ?></br>

    <?php //echo "Lieu de la formation : ".get_field( 'lieu_de_la_formation' ); ?></br>
    <a href="<?php //echo get_field('lien_maforma'); ?>" target="_blank">Lien A faire vers fiche indiv</a></br>
    </div>
    <?php //endwhile; wp_reset_postdata(); ?>
</div>


 -->
<?php get_footer(); ?>