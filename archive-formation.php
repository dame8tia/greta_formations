<?php get_header(); ?>

<h2>Listing des formations proposées </h2>
</br>
<button class="btn btn-primary" onclick="delete_fav()" > suppr. favoris </button>

<?php if( have_posts() ) : ?> 
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
            <td colspan = 3><h5>Action</h5></td>
        </thead>

        <tboby>
        <?php while( have_posts() ) : the_post(); ?>

            <tr>
                <td><span><b><?php the_title(); ?></b></span></td>
                <td colspan="3"><span><?php the_content(); ?></span></td>
                <td><?php echo get_field( 'code_en' ); ?></td>
                <td><?php echo get_field( 'reconnaissance' ); ?></td>
                <td><?php echo get_field( 'date' ); ?></td>
                <td><?php echo get_field( 'lieu_de_la_formation' ); ?></td>
                <td><a href="<?php echo get_field('lien_maforma'); ?>" target="_blank">Lien</a></td>
                <td><?php echo get_field( 'modalite' ); ?></td>

                <td><a href="<?php echo the_permalink(); ?>"><button >voir</button></a></td>
                <td><a href="#"><button >contact</button></a></td>
                <td><button id="<?php echo the_ID(); ?>" onclick = "like_dislike(<?php echo the_ID(); ?>)" class="btn btn-outline-warning"><span class="dashicons dashicons-star-empty"></span></button></td>
            </tr>
        <?php endwhile; endif; ?>
        </tboby>
        
    </table>
    
<?php if(is_archive('formation') ): ?>
    <script>init()</script> <!-- Pour mise à jour des icones pour les formations dans la WishList -->
<?php endif; ?>

<?php get_footer(); ?>