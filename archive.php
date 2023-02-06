<?php get_header(); ?>

<h2>Listing des formations proposées </h2>
</br>

<?php if( have_posts() ) : ?> 
    <table>
        <thead>
            <td><h5>Intitulé</h5></td>
            <td colspan="3"><h5>Descriptif</h5></td>
            <td><h5>Code Rome</h5></td>
            <td><h5>Reconnaissance</h5></td>
            <td><h5>Date</h5></td>
            <td><h5>Lieu de formation</h5></td>
            <td><h5>Lien région</h5></td>
            <td><h5>Modalité</h5></td>
        </thead>
        <tboby>
        <?php while( have_posts() ) : the_post(); ?>
            <tr>
                <td><span><b><?php the_title(); ?></b></span></td>
                <td colspan="3"><span><?php the_content(); ?></span></td>
                <td><?php echo get_field( 'code_rome' ); ?></td>
                <td><?php echo get_field( 'reconnaissance' ); ?></td>
                <td><?php echo get_field( 'date' ); ?></td>
                <td><?php echo get_field( 'lieu_de_la_formation' ); ?></td>
                <td><a href="<?php echo get_field('lien_maforma'); ?>" target="_blank">Lien</a></td>
                <td><?php echo get_field( 'modalite' ); ?></td>
                <td><a href="#"><button >voir</button></a></td>
                <td><a href="#"><button >contact</button></a></td>
                <td><button id="<?php echo get_field( 'code_rome' ); ?>" onclick = "like_dislike(<?php echo get_field( 'code_rome' ); ?>)"><span class="dashicons dashicons-thumbs-up"></span></button></td>
                <!-- <td><button id="<?php /* echo "1" */ ?>" class="like" onclick=like_dislike(<?php /* echo "1" */ ?>) ><span>  <i class="bi bi-star"></i></span></button></td> -->
            </tr>
        <?php endwhile; endif; ?>
        </tboby>
        
    </table>
    


<?php get_footer(); ?>