<?php

// function handle load css script
function load_asset()
{
    wp_enqueue_style("bootstrap", get_theme_file_uri() . '/build/bootstrap.min.css', array(), "1.0", "all");
    wp_enqueue_style("mystyle", get_theme_file_uri() . '/css/my_style.css', array(), "1.0", "all");
    wp_enqueue_script('scriptbootstrap', get_theme_file_uri() . '/build/bootstrap.bundle.min.js', array('jquery'), '1.0', true);
}

// action call function load css script
add_action("wp_enqueue_scripts", "load_asset");

function  register_navwalker()
{
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
    register_nav_menus(array(
        'primary' => __('Primary Menu'),
        'mobile' => __('Mobbile Menu'),
    ));
}

add_action('after_setup_theme', 'register_navwalker');

add_filter( 'nav_menu_link_attributes', 'prefix_bs5_dropdown_data_attribute', 20, 3 );
/**
 * Use namespaced data attribute for Bootstrap's dropdown toggles.
 *
 * @param array    $atts HTML attributes applied to the item's `<a>` element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @return array
 */
function prefix_bs5_dropdown_data_attribute( $atts, $item, $args ) {
    if ( is_a( $args->walker, 'WP_Bootstrap_Navwalker' ) ) {
        if ( array_key_exists( 'data-toggle', $atts ) ) {
            unset( $atts['data-toggle'] );
            $atts['data-bs-toggle'] = 'dropdown';
        }
    }
    return $atts;
}

