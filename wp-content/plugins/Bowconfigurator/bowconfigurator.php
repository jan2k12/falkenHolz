<?php
/**
 * Plugin Name: Bowconfigurator
 * Plugin URI: http://wpdevart.com/wordpress-lightbox-plugin
 * Description: Configurator for Bows   
 * Version: 0.0.1
 * Author:Jan Siegl
 * Author URI: http://siegl-netz.de
 * License: GNU General Public License, v2 (or newer)
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/**
 * Description of bowconfigurator
 *
 * @author Jan-David Siegl <jan@siegl-netz.de>
 */
add_action( 'admin_menu', 'bowConfig' );
function bowconfigurator_init(){
    add_action('admin_menu', 'Register bowConfig');
}

function bowConfig(){
    add_menu_page( "Bogenkonf.", "bowconf", "manage_options", "bowconfigmenue", "registerSettings", $icon_url, $position );



}

function registerSettings(){
    add_option("Test");
}
