<?php
/**
 * Checkout coupon form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

if ( ! $woocommerce->cart->coupons_enabled() )
return;

$info_message = apply_filters('woocommerce_checkout_coupon_message', __( 'Have a coupon?', 'woocommerce' ));
?>

<p class="woocommerce-info">
<?php echo $info_message; ?>
	<!--<a href="#" class="showcoupon"><?php //_e( 'Click here to enter your code', 'woocommerce' ); ?>
	</a>-->
</p>

<form class="checkout_coupon2" method="post" style="display: block !important">
<div class="cuponli">¿Tienes un cupón?</div>
	<p class="form-row form-row-first">
		<input type="text" name="coupon_code" class="input-text"
			placeholder="<?php _e( 'Coupon code', 'woocommerce' ); ?>"
			id="ccoupon_code" value="" />
	</p>

	<p class="form-row form-row-last">
		<div class="xxx"><input type="submit" class="button" name="apply_coupon"
			value="<?php _e( 'Aplicar', 'woocommerce' ); ?>" /></div>
	</p>

	<div class="clear"></div>
</form>
