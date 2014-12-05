<?php
/**
 * Single Product Share
 *
 * Sharing plugins can hook into here or you can add your own code directly.
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<div class="social-buttons">
    <span>Comparte</span>
    <ul class="inline list-inline square-icons">
        <?php do_action('woocommerce_share'); // Sharing plugins can hook into here ?>
        <li class="lipinks"><a
                href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>"
                onClick="window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent('<?php the_permalink() ?>')+�&amp;title=�+encodeURIComponent('<?php the_title() ?>'),'sharer', 'toolbar=no,width=550,height=550'); return false;"
                title="Share on Facebook" target="_blank" id="fbook-share"><i class="fa fa-facebook"></i></a></li>
        <li class="lipinks"><a onClick="MyWindow=window.open('http://twitter.com/home?status=Currently Reading <?php the_title(); ?> (<?php the_permalink(); ?>)','MyWindow','width=600,height=400'); return false;"
                               title="Share on Twitter" target="_blank" id="twitter-share"><i class="fa fa-twitter"></i></a></li>
        <li class="lipinks"><a
                onClick="MyWindow=window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>&amp;source=<?php echo home_url(); ?>','MyWindow','width=600,height=400'); return false;"
                title="Share on LinkedIn" target="_blank" id="linkedin-share"><i class="fa fa-linkedin"></i></a></li>
        <!-- <li class="gplus"><a
                onClick="MyWindow=window.open('https://plus.google.com/share?url=<?php the_permalink(); ?>','MyWindow','width=600,height=400'); return false;"
                title="Share on Google+" target="_blank" id="google-share"><i class="fa fa-google-plus"></i></a></li> -->
        <li class="lipinks"><a  href="#"><i class="fa fa-instagram"></i></a></li>
        <li class="lipinks"><a  href="#"><i class="fa fa-pinterest"></i></a></li>  
        <li class="lipinks"><a  href="#"><i class="fa fa-vimeo-square"></i></a></li> 
        <?php /*
        <li class="dribbble"><a  href="#"><i class="fa fa-dribbble"></i></a></li>
        <li class="rss"><a  href="#"><i class="fa fa-rss"></i></a></li>
 */?>
    </ul>
</div>
