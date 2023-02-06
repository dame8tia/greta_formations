<?php get_header(); ?>

<h2>Listing des formations proposées </h2>
</br>

<?php if( have_posts() ) : ?> 
    <table>
        <thead>
            <td><h3>Intitulé</h3></td>
            <td><h3>Référence</h3></td>
            <td><h3>Code Rome</h3></td>
            <td><h3>Date</h3></td>
            <td><h3>Lieu de formation</h3></td>
            <td><h3>Contact</h3></td>
            <td><h3>Domaine</h3></td>
            <td><h3>Organisme</h3></td>
            <td><h3>Nom du contact</h3></td>
            <td><h3>Mail du contact</h3></td>
            <td><h3>Lien maforma</h3></td>
            <td><h3>Nature de la formation</h3></td>
        </thead>
        <?php while( have_posts() ) : the_post(); ?>
        <tbody>

            <tr>
                <td><span><?php the_title(); ?></span></td>
                <td><span><?php the_content(); ?></span></td>
                <td><?php echo get_field( 'niveau_detude' ); ?></td>
                <td><?php echo get_field( 'titre_professionnel' ); ?></td>
                <td><?php echo get_field( 'Date' ); ?></td>
                <td><?php echo get_field( 'Lieu de la formation' ); ?></td>
                <td><?php echo get_field( 'Contact' ); ?></td>
                <td><?php echo get_field( 'Domaine' ); ?></td>
                <td><?php echo get_field( 'Organisme' ); ?></td>
                <td><?php echo get_field( 'Nom du contact' ); ?></td>
                <td><?php echo get_field( 'Mail du contact' ); ?></td>
                <td><?php echo get_field( 'Lien maforma' ); ?></td>
                <td><?php echo get_field( 'Nature de la formation' ); ?></td>
                <td><button id="like" onclick = "like_dislike()"><span class="dashicons dashicons-thumbs-up"></span></button></td>
            </tr>
        </tbody>
        <?php endwhile; endif; ?>
        
    </table>
<!--     <table>
        <?php //while( have_posts() ) : the_post(); ?>
        <thead>
            <td><h3>Nom</h3></td>
            <td><h3>Descriptif</h3></td>
        </thead>
        <tbody>
            <tr>
                <td><span><?php //the_title(); ?></span></td>
                <td><span><?php //the_content(); ?></span></td>
                <td>Il faut mettre ici je pense les champs rajoutés, si le the_content() ne parvient pas à les lister, tu dois trouver la fonction qui récupérer les champs de ACF.</td>
                <td>Et pour chaque champ un td</td>
                <td><a href="<?php //the_permalink(); ?>">Voir</span></button></td>
                <td><button id="like" onclick = "like_dislike()"><span class="dashicons dashicons-thumbs-up"></span></button></td>
            </tr>
        </tbody>  
        <?php //endwhile; endif; ?>  
    </table> -->


<?php get_footer(); ?>