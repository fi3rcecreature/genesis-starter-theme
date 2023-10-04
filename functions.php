<?php
/**
 * Genesis Starter Theme.
 *
 * @package   SeoThemes\GenesisStarterTheme
 * @link      https://genesisstartertheme.com
 * @author    SEO Themes
 * @copyright Copyright © 2019 SEO Themes
 * @license   GPL-2.0-or-later
 */

// Starts the engine (do not remove).
require_once \get_template_directory() . '/lib/init.php';

// Loads child theme (do not remove).
require_once \get_stylesheet_directory() . '/lib/init.php';

//* Blocks Colors
add_theme_support( 'editor-color-palette', array(
    array(
        'name'  => __( 'Gray', 'genesis-starter-theme' ),
        'slug'  => 'gray',
        'color' => '#48494A',
    ),
    array(
        'name'  => __( 'Red', 'genesis-starter-theme' ),
        'slug'  => 'red',
        'color' => '#E9262B',
    ),
    array(
        'name'  => __( 'Pink', 'genesis-starter-theme' ),
        'slug'  => 'pink',
        'color' => '#FACCD1',
    ),
    array(
        'name'  => __( 'Yellow', 'genesis-starter-theme' ),
        'slug'  => 'yellow',
        'color' => '#EBBA14',
    ),
    array(
        'name'  => __( 'Blue', 'genesis-starter-theme' ),
        'slug'  => 'blue',
        'color' => '#0E6987',
    ),
    array(
        'name'  => __( 'Black', 'genesis-starter-theme' ),
        'slug'  => 'black',
        'color' => '#000000',
    ),
    array(
        'name'  => __( 'White', 'genesis-starter-theme' ),
        'slug'  => 'white',
        'color' => '#ffffff',
    ),
) );

//* Modify the Genesis content limit read more link
add_filter( 'get_the_content_more_link', 'sp_read_more_link' );
function sp_read_more_link() {
    return '[...] <a class="more-link" href="' . get_permalink() . '">read story <i class="fa-solid fa-angles-right"></i></a>';
}

//* Add a custom dashboard widget
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
 
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;

wp_add_dashboard_widget('custom_help_widget', 'Theme Support', 'custom_dashboard_help');
}

function custom_dashboard_help() {
echo '<p>Welcome to your new website! Need help? Contact the developer, Ashley Harper <a href="mailto:ashley@harperdesignco.us">here</a> or call (559) 618-5474. </p>';
}

 add_filter( 'genesis_single_crumb', 'be_add_blog_crumb', 10, 2 );
    add_filter( 'genesis_archive_crumb', 'be_add_blog_crumb', 10, 2 );
    /**
     * Add Blog to Breadcrumbs
     * @author Bill Erickson
     * @link http://www.billerickson.net/adding-blog-to-genesis-breadcrumbs/
     *
     * @param string original breadcrumb
     * @return string modified breadcrumb
     */
    function be_add_blog_crumb( $crumb, $args ) {
        if ( is_singular( 'post' ) || is_category() )
            return '<a href="' . get_permalink( get_option( 'page_for_posts' ) ) . '">' . get_the_title( get_option( 'page_for_posts' ) ) .'</a> ' . $args['sep'] . ' ' . $crumb;
        else
            return $crumb;
    }