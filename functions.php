<?php 

/**
 * Ajoute des éléments au thème 
 */
function greta_support_theme(){
	add_theme_support('title-tag'); 
	add_theme_support('post-thumbnails');

    // Ajout le sous menu menu dans apparence
    add_theme_support('menus');
    register_nav_menu( 'header', 'Menu du header');
    register_nav_menu( 'footer', 'Menu du footer');

}
add_action('after_setup_theme', 'greta_support_theme');


/**
 * Enqueue scripts and styles Bootstrap
 */
function greta_style_bootstrap() {
	wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css');
	wp_enqueue_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js');
}
add_action('wp_enqueue_scripts', 'greta_style_bootstrap');


/**
 * Enqueue mon style css
 */
function greta_my_style() {
    wp_enqueue_style( 'mon-style', get_stylesheet_uri());

}
add_action('wp_enqueue_scripts', 'greta_my_style',11);

// script JS pour la WishList
function greta_js_like() {

    // Seulement sur la page d'archive pour les formations
    if( is_archive() || is_page('wishlist')) {
        wp_enqueue_script( 'script-like', get_template_directory_uri().'/scripts/like.js', true);
    }

}
add_action('wp_enqueue_scripts', 'greta_js_like');


/**
 * modification de la classe des li du menu cf.header
 */
function greta_menu_class(array $classes):array
{
    $classes[] = 'nav-item';
    return $classes;
}
add_filter('nav_menu_css_class', 'greta_menu_class');

function greta_menu_link(array $attr):array
{
    $attr['class'] = 'nav-link';
    return $attr;
}
add_filter( 'nav_menu_link_attributes', 'greta_menu_link');


// création CPT 
function greta_register_post_types() {
	    // CPT Formations
        $labels = array(
            'name' => 'formation',
            'all_items' => 'Toutes les formations',  // affiché dans le sous menu
            'singular_name' => 'formation',
            'add_new_item' => 'Ajouter une formation',
            'edit_item' => 'Modifier une formation',
            'menu_name' => 'Formations'
        );
    
        $args = array(
            'labels' => $labels,
            'public' => true,
            'show_in_rest' => true,
            'has_archive' => true,
            'supports' => array( 'title', 'editor','thumbnail' ),
            'menu_position' => 5, 
            'menu_icon' => 'dashicons-admin-customizer',
        );
    
        register_post_type( 'formation', $args );
}
add_action( 'init', 'greta_register_post_types' );



/* function capitaine_override_query( $wp_query ) {
    echo "<pre>";
    var_dump( $wp_query->query_vars );
    echo "</pre>";
}
add_action( 'pre_get_posts', 'capitaine_override_query' ); */

// Ajout fonction Short Code formation_accordeon 

function formation_accordeon_shortcode() {
    ob_start();
    $query = new WP_Query([
        'post_type'=> 'formation'
    ]);
    ?>
    <div class="accordion" id="accordionExample">
        <?php $i = 1; ?>
        <?php while($query->have_posts()): $query->the_post();?>
        <div class="accordion-item ">
           <h2 class="accordion-header" id="<?php echo $i; ?>">
             <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne<?php echo $i; ?>" aria-expanded="false" aria-controls="plush-collapseOne<?php echo $i; ?>">
              <?= the_title(); ?>
             </button>
           </h2>
           <div id="flush-collapseOne<?php echo $i; ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne<?php echo $i; ?>">
             <div class="accordion-body">
                  <p>Du <?= get_field( 'date_debut' ); ?> au <?= get_field( 'date_fin' ); ?></p>
                  <p>Code EN : <?= get_field( 'code_en' ); ?></p>
                  <p>Lieu de la formation : <?= get_field( 'lieu_de_la_formation' ); ?></p>
                  <a href="<?= the_permalink(); ?>" target="_blank">voir</a>
             </div>
           </div>
        </div>
        <?php $i++; ?>
      <?php endwhile; ?>
    </div>
    <?php
    $output = ob_get_clean();
    return $output;
}

add_shortcode( 'formation_accordeon', 'formation_accordeon_shortcode' );

// shortcode listingFormationsAvenirAccueil

/* function shortCode_form_venir(){

    $code_listing = 
    "<div class=\"row\">".    
    $query = new WP_Query([
        "post_type"=> "formation"
    ]);
    while($query->have_posts()):

        $query->the_post()
    
        ."<div class=\"col-sm-6\">"
        ."<h1>".the_title()."</h1> "
        ."</div>".
    // endwhile ;
    wp_reset_postdata();
    

    return $code_listing;
}
add_shortcode('shortcode1', 'shortCode_form_venir'); */


// ajout une meta box pour le CPT formation : Ce n'est pas ce qu'on veut. Pour notre besoin (aff. des CPT Formations sur la page d'accueil, faire WP_Query cf. front-page)

/* function greta_initialisation_metaboxes(){
  //on utilise la fonction add_metabox() pour initialiser une metabox
  add_meta_box('cpt_formation', 'Formation', 'greta_meta_box_cpt_formation', 'formation');
}

function greta_meta_box_cpt_formation(){
    echo "salut";
}
add_action('add_meta_boxes','greta_initialisation_metaboxes'); */