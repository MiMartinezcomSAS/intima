<?php
/**
 * Show error messages
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! $messages ) return;
?>
<div class="popUpErrorPay" onclick="myFunction()">

</div>
<div class="errorMessagePay">
    <div class="closePopUp" onclick="myFunction()">x</div>
    <div class="logoerror"><img src="http://lilipink.com/wp-content/uploads/2014/09/logo2.png"></div>
    <div class="errortexto">Importante</div>
    <ul>
        <?php foreach ( $messages as $message ) : ?>
            <li><?php echo wp_kses_post( $message ); ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<ul class="woocommerce-error">
	<?php foreach ( $messages as $message ) : ?>
		<li><?php echo wp_kses_post( $message ); ?></li>
	<?php endforeach; ?>
</ul>

<script>
    function myFunction() {
        jQuery('.errorMessagePay').remove();
        jQuery('.popUpErrorPay').remove();
    }
</script>