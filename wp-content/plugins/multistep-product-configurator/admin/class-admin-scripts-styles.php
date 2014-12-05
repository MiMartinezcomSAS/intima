<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


if( !class_exists('MSPC_Admin_Scripts_Styles') ) {

	class MSPC_Admin_Scripts_Styles {

		public function __construct() {

			add_action( 'admin_enqueue_scripts', array( &$this, 'enqueue_styles_scripts' ) );

		}

		public function enqueue_styles_scripts( $hook ) {

			global $post, $woocommerce;

			$wc_settings_page = 'wc-settings';

			//woocommerce settings
			if( $hook == 'woocommerce_page_'.$wc_settings_page.'' ) {

				wp_enqueue_style( 'mspc-admin', plugins_url('/css/admin.css', __FILE__) );
				wp_enqueue_script( 'mspc-admin', plugins_url('/js/admin.js', __FILE__), false, Multistep_Product_Configurator::VERSION );

			}

			//woocommerce post types
		    if ( $hook == 'post-new.php' || $hook == 'post.php' ) {

		    	//product
		        if ( 'product' === $post->post_type ) {

		        	wp_enqueue_style( 'mspc-admin', plugins_url('/css/admin.css', __FILE__) );
		        	wp_enqueue_script( 'mspc-meta-box', plugins_url('/js/meta-box.js', __FILE__), false, Multistep_Product_Configurator::VERSION );

		        }
		    }

		    //add attribute form
		    if( ( isset($_GET['page']) && $_GET['page'] == 'product_attributes' ) ) {

				wp_enqueue_media();

				wp_enqueue_style( 'mspc-admin', plugins_url('/css/admin.css', __FILE__) );
				wp_enqueue_script( 'mspc-admin', plugins_url('/js/admin.js', __FILE__), false, Multistep_Product_Configurator::VERSION );

		    }

			//edit attribute form
		    if( $hook == 'edit-tags.php' ) {

				$attributes = wc_get_attribute_taxonomy_names();
				if( !empty($attributes) && in_array($_GET['taxonomy'], $attributes) ) {

					wp_enqueue_media();

					wp_enqueue_style( 'mspc-admin', plugins_url('/css/admin.css', __FILE__) );
					wp_enqueue_script( 'mspc-admin', plugins_url('/js/admin.js', __FILE__), false, Multistep_Product_Configurator::VERSION );

				}

		    }
		}
	}
}

new MSPC_Admin_Scripts_Styles();

?>