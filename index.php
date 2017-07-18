<?php 
/*
Plugin Name: Eewee Flattr
Plugin URI: http://www.eewee.fr/
Description: Flattr. Support with microdonations. Social microdonations.
Version: 1.1
Author: Michael DUMONTET
Author URI: http://www.eewee.fr/wordpress/
License: copyright eewee
*/

/**
 * Define
 * @since 1.0.0
 */
define( 'EEWEE_FLATTR_VERSION', '1.1' );
define( 'EEWEE_FLATTR_NAME', 'eeweeFlattr' );
define( 'EEWEE_FLATTR_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . dirname( plugin_basename( __FILE__ ) ) );
define( 'EEWEE_FLATTR_PLUGIN_URL', WP_PLUGIN_URL . '/' . dirname( plugin_basename( __FILE__ ) ) );

/**
 * Add CSS
 * @since 1.0.0
 */
function addCssFlattr(){
	wp_enqueue_style( 'cssCountdown-style', '/wp-content/plugins/eewee_flattr/css/style.css' );
}
add_action( 'init', 'addCssFlattr' );

/**
 * Add JS
 * @since 1.0.0
 */
function addJsFlattr(){
//	wp_enqueue_style( 'jsFlattr', '/wp-content/plugins/eewee_flattr/js/xxx.css' );
}
add_action( 'init', 'addJsFlattr' );


/**
 * Add Files
 * @since 1.0.0
 */
require_once( EEWEE_FLATTR_PLUGIN_DIR . '/controllers/EeweeFlattr.php' );


/**
 * Instantiate Classe
 * @since 1.0.0
 */
$eewee_admin = new EeweeFlattr();


/**
 * Wordpress Activate/Deactivate
 *
 * @uses register_activation_hook()
 * @uses register_deactivation_hook()
 *
 * @since 1.0.0
 */
register_activation_hook( __FILE__, array( $eewee_admin, 'eewee_activate' ) );
register_deactivation_hook( __FILE__, array( $eewee_admin, 'eewee_deactivate' ) );


/**
 * Required action filters
 *
 * @uses add_action()
 *
 * @since 1.0.0
 */
add_action( 'admin_menu', array( $eewee_admin, 'eewee_adminMenu' ) );
?>