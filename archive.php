<?php get_header(); ?>

<h2>Listing des formations proposées </h2>
</br>

<?php if( have_posts() ) : ?> 
    <table>
        <thead>
            <td><h3>Nom</h3></td>
            <td><h3>Descriptif</h3></td>
        </thead>
        <?php while( have_posts() ) : the_post(); ?>
        <tbody>

            <tr>
                <td><span><?php the_title(); ?></span></td>
                <td><span><?php the_content(); ?></span></td>
                <td><button id="like" onclick = "like_dislike()"><span class="dashicons dashicons-thumbs-up"></span></button></td>
            </tr>
        </tbody>  
        <?php endwhile; endif; ?>  
    </table>


<?php get_footer(); ?>