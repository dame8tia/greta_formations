<?php get_header(); ?>

<h2>Ma wish List </h2>
</br>

<?php if(is_page('wishlist') ): ?>
    <script>display_wish()</script>
<?php endif; ?>

<?php
$query = new WP_Query([
    'post_type'=> 'formation',
]); ?>	

<div class = "container-tableau">

<table class="table">
    <thead>
        <td><h5>Intitulé</h5></td>
        <td colspan=3><h5>Descriptif</h5></td>
        <td><h5>Code EN</h5></td>
        <td><h5>Reconnaissance</h5></td>
        <td><h5>Date</h5></td>
        <td><h5>Lieu de formation</h5></td>
        <td><h5>Lien région</h5></td>
        <td><h5>Modalité</h5></td>
        <td><h5>Préférence</h5></td>
    </thead>

    <tboby>
    <?php while($query->have_posts()): $query->the_post();?>

    <!-- tr style = "display:none" C'est la fonction display qui se chargera de les rendre visible si stockées dans LocalStorage -->
    <tr class="ligne" id="<?php echo the_ID(); ?>" style = "display:none";>
        <td><span><b><?php the_title(); ?></b></span></td>
        <td colspan="3"><span><?php the_content(); ?></span></td>
        <td><?php echo get_field( 'code_en' ); ?></td>
        <td><?php echo get_field( 'reconnaissance' ); ?></td>
        <td><?php echo get_field( 'date' ); ?></td>
        <td><?php echo get_field( 'lieu_de_la_formation' ); ?></td>
        <td><a href="<?php echo get_field('lien_maforma'); ?>" target="_blank">Lien</a></td>
        <td><?php echo get_field( 'modalite' ); ?></td> 
        <td><button id="<?php echo the_ID(); ?>" onclick = "like_dislike(<?php echo the_ID(); ?>)"><span class="dashicons dashicons-star-filled"></span></button></td>  
    </tr>

    <?php endwhile; wp_reset_postdata(); ?>
</tboby>
        
</table>

</div>



<?php get_footer(); ?>