<?php
/**
 * Checkout login form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */
echo('<div class="content-sidebar">');
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( is_user_logged_in() || 'no' == get_option( 'woocommerce_enable_checkout_login_reminder' ) ) return;

$info_message  = apply_filters( 'woocommerce_checkout_login_message', __( 'Returning customer?', 'woocommerce' ) );
//$info_message .= ' <a href="#" class="showlogin">' . __( 'Click here to login', 'woocommerce' ) . '</a>';
wc_print_notice( $info_message, 'notice' );
?>
			<div class="checktitlelo">Iniciar Sesión</div>
<?php
	woocommerce_login_form(
		array(
			'message'  => __( 'Si ya tienes una cuenta Lilipink ingresa rapidamente.', 'woocommerce' ),
			'redirect' => get_permalink( wc_get_page_id( 'checkout' ) ),
			'hidden'   => false
		)
	);
?>