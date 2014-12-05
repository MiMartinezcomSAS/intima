<?php
/*
Plugin Name: Multistep Product Configurator for WooCommerce
Plugin URI: http://codecanyon.net/item/multistep-product-configurator-for-woocommerce-/8749384
Description: Create a Multistep Product Configurator with the attributes and variations of your products.
Version: 1.0.1
Author: radykal.de
Author URI: http://radykal.de
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly



if (!defined('MSPC_PLUGIN_DIR'))
    define( 'MSPC_PLUGIN_DIR', dirname(__FILE__) );

if (!defined('MSPC_PLUGIN_ROOT_PHP'))
    define( 'MSPC_PLUGIN_ROOT_PHP', dirname(__FILE__).'/'.basename(__FILE__)  );

if (!defined('MSPC_PLUGIN_ADMIN_DIR'))
    define( 'MSPC_PLUGIN_ADMIN_DIR', dirname(__FILE__) . '/admin' );


if( !class_exists('Multistep_Product_Configurator') ) {

	class Multistep_Product_Configurator {

		const VERSION = '1.0.1';
		const CAPABILITY = "edit_mspc";
		const DEMO = false;

		public function __construct() {

			require_once(MSPC_PLUGIN_DIR.'/inc/mspc-functions.php');
			require_once(MSPC_PLUGIN_ADMIN_DIR.'/class-admin.php');
			require_once(MSPC_PLUGIN_DIR.'/inc/class-scripts-styles.php');

			add_action( 'init', array( &$this, 'init') );

		}

		public function init() {

			require_once(MSPC_PLUGIN_DIR.'/inc/class-frontend-product.php');

		}

	}
}

new Multistep_Product_Configurator();

?>