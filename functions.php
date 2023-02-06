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

function greta_js_like() {// script js détecté au addEventListener

    // Seulement sur la page d'archive pour les formations
    if( is_archive() ) {
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


// ajout une meta box pour le CPT formation

function greta_initialisation_metaboxes(){
  //on utilise la fonction add_metabox() pour initialiser une metabox
  add_meta_box('cpt_formation', 'Formation', 'greta_meta_box_cpt_formation', 'formation');
}

function greta_meta_box_cpt_formation(){
    echo "salut";
}
add_action('add_meta_boxes','greta_initialisation_metaboxes');