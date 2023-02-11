<?php get_header(); ?>

<h2>Ma wish List </h2>
</br>
<?php //echo is_page('wishlist'); ?>
<?php if(is_page('wishlist') ): ?>
    <script>display_wish()</script>
<?php endif; ?>

<?php
if (isset($_GET['wish'])) {

    echo "traitement du GET";
    $myFormations = "";
    $myFormations = $_GET['wish'];
    echo "</br>";
    echo "Wish récup : "+$myFormations ;
    echo "</br>";
    //echo preg_match($myFormations, "308");
    echo "</br>";
    //echo is_null(preg_match($myFormations, "308"))
    echo "traitement du GET";
}
?>

<?php
$query = new WP_Query([
    'post_type'=> 'formation',
]); ?>	

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
<?php if (strpos($myFormations,the_ID() ) !== true) {;?>
<tr>
    <td><?php echo strval(the_ID());?> </td>   
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

<?php };?>

<?php endwhile; wp_reset_postdata(); ?>
</tboby>
        
</table>


<?php get_footer(); ?>