<?php
/**
 * Cart Page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

wc_print_notices();
?>
<!--<?php if ( $woocommerce->cart->coupons_enabled() ) { ?>
<div class="widget coupon-widget shopping-cart-summary">
						<h4 class="md-bordered-title">¿Tienes un cupón promocional Lilipink?</h4>
									<p><?php _e('Ingresa el codigo promocional en la casilla y recibe descuentos especiales, solo Lilipink te da mas.','cb-modello');?></p>
								<input class="coupon-input" type="text" placeholder="Ingresa aqui el codigo del cupón" name="coupon_code" id="coupon_code">
								<input class="md-button small" type="submit" name="apply_coupon" style="padding: 9px 29px!important;margin-top:-34px;font-size: 13px!important; vertical-align: top; height: 41px; width: 20.9%;" value="<?php _e( 'Aplicar Promoción', 'cb-modello' ); ?>"/>

	<?php do_action('woocommerce_cart_coupon'); ?>
								</div><?php } ?>
<?php do_action( 'woocommerce_before_cart' ); ?> 
-->
<form
	action="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>"
	method="post">

	<?php do_action( 'woocommerce_before_cart_table' ); ?>
    <div class="col-md-12 col-lg-9">
	<table class="shop_table cart section-shopping-cart-page" cellspacing="0">
		<tbody>
		<?php do_action( 'woocommerce_before_cart_contents' ); ?>

		<?php
		if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) {
			foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $values ) {
				$_product = $values['data'];
				if ( $_product->exists() && $values['quantity'] > 0 ) {

					$prod_slogan=esc_attr(get_post_meta($values['product_id'], 'cb5_prod_slogan', $single = true));
					?>
			<tr
				class="cart-item <?php echo esc_attr( apply_filters('woocommerce_cart_table_item_class', 'cart_table_item', $values, $cart_item_key ) ); ?>">


				<!-- The thumbnail -->
				<td class="product-thumbnail"><?php
				$thumbnail = apply_filters( 'woocommerce_in_cart_product_thumbnail', $_product->get_image(), $values, $cart_item_key );

				if ( ! $_product->is_visible() || ( ! empty( $_product->variation_id ) && ! $_product->parent_is_visible() ) )
				echo $thumbnail;
				else
				printf('<a href="%s">%s</a>', esc_url( get_permalink( apply_filters('woocommerce_in_cart_product_id', $values['product_id'] ) ) ), $thumbnail );
				?>
				</td>

				<!-- Product Name -->
				<td class="title">
                    <div class="preTitle2">
                        <?php
echo get_post_meta($values['product_id'], "pretitle", $single = true);
                        ?>
                    </div>
                    <?php
				if ( ! $_product->is_visible() || ( ! empty( $_product->variation_id ) && ! $_product->parent_is_visible() ) )
				echo apply_filters( 'woocommerce_in_cart_product_title', $_product->get_title(), $values, $cart_item_key );
				else{
					printf('<a href="%s">%s</a>', esc_url( get_permalink( apply_filters('woocommerce_in_cart_product_id', $values['product_id'] ) ) ), apply_filters('woocommerce_in_cart_product_title', $_product->get_title(), $values, $cart_item_key ) );

				}


				if ( $_product->is_type( array( 'simple', 'variable' ) ) && get_option( 'woocommerce_enable_sku' ) == 'yes' && $_product->get_sku() ) : ?>
					<span itemprop="productID" class="sku_wrapper"><?php _e( 'Product ID:', 'woocommerce' ); ?>
						<span class="sku"><?php echo $_product->get_sku(); ?> </span> </span>
						<?php endif;


						// Meta data
						echo $woocommerce->cart->get_item_data( $values );

						// Backorder notification
						if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $values['quantity'] ) )
						echo '<p class="backorder_notification">' . __( 'Available on backorder', 'woocommerce' ) . '</p>';
						?></td>

				<!-- Product price -->
				<td class="col-sm-6 col-lg-5 cart_price"><?php
				$product_price = get_option('woocommerce_tax_display_cart') == 'excl' ? $_product->get_price_excluding_tax() : $_product->get_price_including_tax();

				echo apply_filters('woocommerce_cart_item_price_html', woocommerce_price( $product_price ), $values, $cart_item_key );
				?>
				</td>

				<!-- Quantity inputs -->
				<td class="quantitys"><?php
				if ( $_product->is_sold_individually() ) {
					$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
				} else {

					$step	= apply_filters( 'woocommerce_quantity_input_step', '1', $_product );
					$min 	= apply_filters( 'woocommerce_quantity_input_min', '', $_product );
					$max 	= apply_filters( 'woocommerce_quantity_input_max', $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(), $_product );

					$product_quantity = sprintf( '<div class="quantity"><input type="number" name="cart[%s][qty]" step="%s" min="%s" max="%s" value="%s" size="4" title="' . _x( 'Qty', 'Product quantity input tooltip', 'woocommerce' ) . '" class="input-text qty text" maxlength="12" /></div>', $cart_item_key, $step, $min, $max, esc_attr( $values['quantity'] ) );
				}

				echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key );
				?>
				</td>

				<!-- Product subtotal -->
				<td class="product-subtotal"><?php
				echo apply_filters( 'woocommerce_cart_item_subtotal', $woocommerce->cart->get_product_subtotal( $_product, $values['quantity'] ), $values, $cart_item_key );
				?>
				</td>
				<!-- Remove from cart link -->
				<td class="product-remove"><?php
				echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s">&times;</a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'woocommerce' ) ), $cart_item_key );
				?>
				</td>
			</tr>
			<?php
				}
			}
		}

		do_action( 'woocommerce_cart_contents' );
		?>
        </tbody>
    </table><input type="submit"
					name="update_cart"
					value="<?php _e( 'Actualizar compra', 'cb-modello' ); ?>" class="md-button large col-xs-12 update norad" />
        </div>

    <div class="col-md-12 col-lg-3">
        <div class="right-sidebar">
            <div class="widget shopping-cart-summary">
                <h4 class="md-bordered-title">Resumen de compra</h4>
                <?php woocommerce_cart_totals(); ?>
                <div class="clearfix"></div>
                <?php woocommerce_shipping_calculator(); ?>
            </div>




               <input type="submit" name="proceed"
					value="<?php _e( 'Comprar', 'cb-modello' ); ?>" class="md-button large col-xs-12 checkout norad"  />






        </div></div>

					<?php do_action('woocommerce_proceed_to_checkout'); ?> <?php wp_nonce_field( 'woocommerce-cart' ); ?>


			<?php do_action( 'woocommerce_after_cart_contents' ); ?>


	<?php do_action( 'woocommerce_after_cart_table' ); ?>

</form>

<div class="cart-collaterals">

<?php do_action('woocommerce_cart_collaterals'); ?>


</div>
<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>
<table class="totaly">
			<tr class="total">
				<th><strong><?php _e( 'Order Total', 'woocommerce' ); ?> </strong></th>
				<td><strong><?php echo $woocommerce->cart->get_total(); ?> </strong>
				<?php
				// If prices are tax inclusive, show taxes here
				if (  $woocommerce->cart->tax_display_cart == 'incl' ) {
					$tax_string_array = array();

					foreach ( $woocommerce->cart->get_tax_totals() as $code => $tax ) {
						$tax_string_array[] = sprintf( '%s %s', $tax->formatted_amount, $tax->label );
					}

					if ( ! empty( $tax_string_array ) ) {
						echo '<small class="includes_tax">' . sprintf( __( '(Includes %s)', 'woocommerce' ), implode( ', ', $tax_string_array ) ) . '</small>';
					}
				}
				?>
				</td>
			</tr></table>

			<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>


<?php do_action( 'woocommerce_after_cart' ); ?>
