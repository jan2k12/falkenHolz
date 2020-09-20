<?php

update_option("siteurl", "http://testfalkenholz.siegl-netz.de");
update_option("home", "http://testfalkenholz.siegl-netz.de");

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

if (!isset($content_width)) {
    $content_width = 660;
}
add_theme_support('menus');
add_theme_support('post-thumbnails', array('page'));

function custom_theme_setup()
{
    $headerArgs = array(
        'flex-width' => true,
        'flex-height' => true,
        'default-image' => get_template_directory_uri() . '/img/falkenholz_logo.gif',
        'uploads' => true,
    );
    add_theme_support('custom-header', $headerArgs);
}

add_action('after_setup_theme', 'custom_theme_setup');


/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Fifteen 1.1
 */
function twentyfifteen_javascript_detection()
{
    echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}

add_action('wp_head', 'twentyfifteen_javascript_detection', 0);

function register_my_menus()
{
    register_nav_menus(
        array(
            'mainmenue' => __('mainmenue'),
        )
    );
}
add_action( 'init', 'register_my_menus' );

function wpb_mce_buttons_2($buttons)
{
    array_unshift($buttons, 'styleselect');
    return $buttons;
}

add_filter('mce_buttons_2', 'wpb_mce_buttons_2');

/*
* Callback function to filter the MCE settings
*/

function my_mce_before_init_insert_formats($init_array)
{

// Define the style_formats array

    $style_formats = array(
        // Each array child is a format with it's own settings
        array(
            'title' => 'Handschrift',
            'block' => 'span',
            'classes' => 'handwritten',
            'wrapper' => true,

        ),
        array(
            'title' => 'Bank Gothic LT',
            'block' => 'span',
            'classes' => 'bankGothicLT',
            'wrapper' => true,
        ),
        array(
            'title' => 'Phyllisswash',
            'block' => 'span',
            'classes' => 'phyllisswash',
            'wrapper' => true,

        )
    );
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode($style_formats);

    return $init_array;

}

// Attach callback to 'tiny_mce_before_init' 
add_filter('tiny_mce_before_init', 'my_mce_before_init_insert_formats');

if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'CounterArea',
        'id' => 'CounterArea',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ));
}


/**
 * Customizer additions.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/customizer.php';
?>
