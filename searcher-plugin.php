<?php
/**
 * Seacher Importer
 *
 * @package     searcher-plugin
 * @author      hudson van-dal
 * @license     GPLv3
 *
 * @wordpress-plugin
 * Plugin Name: Searcher plugin
 * Version: 1.0.0
 * Description: Add more options to search page
 * Author: hudsonvandal
 * Author URI: https://hudsonvandal.com
 * Text Domain: hudsonvandal-seacher-plugin
 * Domain Path: /languages
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl-3.0
 */


 if ( ! defined( 'WPINC' ) ) {
 	die;
 }





 function wpse_load_custom_search_template(){
    if( isset($_REQUEST['s']) ) {
        wp_enqueue_style( 'seacher_plugin_css', plugin_dir_url( __FILE__ ).('assets/css/style.css'), array(), '1.1', 'all');
        wp_enqueue_style( 'seacher_plugin_css_bootstrap', plugin_dir_url( __FILE__ ).('assets/css/bootstrap.min.css'), array(), '1.1', 'all');
        wp_enqueue_script( 'seacher_plugin_js', plugin_dir_url( __FILE__ ).('assets/js/script.js'), array (), 1.1, true);
        require_once plugin_dir_path( __FILE__ ) . 'searchpage.php';
        die();
    }
}
add_action('init','wpse_load_custom_search_template');
