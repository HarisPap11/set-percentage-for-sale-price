<?php
/**
 * Plugin Name: Set percentage for Sale price
 * Description: When you download this plugin, you will be able to set percentage discounts into your products and not a fixed price.. You could schedule the discount availability too. Requires at Wordpress 4.6.1 or newer and Woocommerce 3.1 or newer
 * Version: 1.0.1
 * Author: Haris Papadakis
 * Author URI: https://harispapadakis.com
 * Requires at least: 3.1
 * Tested up to: 4.6.1
 *
 * Copyright: @ 2018 Haris Papadakis.
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */


if(!defined('ABSPATH')) exit; // Exit if accessed directly


// Required minimum version of WordPress.
if(!function_exists('wc_productdata_options_wp_requred')){
  function wc_productdata_options_wp_requred(){
    global $wp_version;
    $plugin = plugin_basename(__FILE__);
    $plugin_data = get_plugin_data(__FILE__, false);

    if(version_compare($wp_version, "3.3", "<")){
      if(is_plugin_active($plugin)){
        deactivate_plugins($plugin);
        wp_die("'".$plugin_data['Name']."' requires WordPress 3.3 or higher, and has been deactivated! Please upgrade WordPress and try again.<br /><br />Back to <a href='".admin_url()."'>WordPress Admin</a>.");
      }
    }
  }
  add_action('admin_init', 'wc_productdata_options_wp_requred');
}


// Checks if the WooCommerce plugins is installed and active.
if(in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))){

  require_once dirname( __FILE__ ) . '/run.php';

}