<?php
/**
 * Plugin Name: Set percentage for Sale price
 * Plugin URI: https://github.com/HarisPap11/set-percentage-for-sale-price
 * Description: When you download this plugin, you will be able to set percentage discounts into your products and not a fixed price.. You could schedule the discount availability too. 
 * Version: 1.0.1
 * Author: Haris Papadakis
 * Author URI: https://harispapadakis.com
 * Requires at least: 3.1
 * Tested up to: 4.9.8
 *
 * Copyright: @ 2018 Haris Papadakis.
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

if(!defined('ABSPATH')) exit; // Exit if accessed directly

// Checks if the WooCommerce plugins is installed and active.
if(in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))){
  require_once dirname( __FILE__ ) . '/run.php';
}