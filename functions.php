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
