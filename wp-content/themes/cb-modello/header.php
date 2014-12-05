<?php
$grid = get_option('cb5_grid');
$con_w = '960';
if ($grid == '1170') $con_w = '1170';
if (!isset($content_width)) $content_width = $con_w;
$cb_header_options = cb_get_header_options($post->ID);
global $post;
$cb_type = esc_attr(get_post_meta($post->ID, '_cb5_post_type', 'true'));

?>

    <!DOCTYPE html>
<html>
    <head>
        <?php if (defined('WPSEO_VERSION')) { ?>
            <title><?php wp_title(''); ?></title>
        <?php } else { ?>
            <title><?php if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
                    if (is_product()) {
                        echo get_the_title() . ' | ';
                    }
                }
                if (get_post_type($post) == 'product') {
                    ?>
                    <?php woocommerce_page_title(); ?> | <?php bloginfo('name'); ?> <?php } else { ?>
                    <?php if (is_front_page()) { ?> <?php bloginfo('description'); ?> | <?php } ?>
                    <?php if (is_search()) { ?>Search Results | <?php bloginfo('name'); ?> <?php } ?>
                    <?php if (is_author()) { ?>Author Archives | <?php bloginfo('name'); ?> <?php } ?>
                    <?php if (is_single()) { ?> <?php the_title(); ?> | <?php bloginfo('name'); ?>
                    <?php } ?> <?php if (is_page()) { ?> <?php the_title(); ?> | <?php bloginfo('name'); ?>
                    <?php } ?> <?php if (is_archive()) {
                        if (is_category()) {
                            single_cat_title();
                        } else {
                            ?>
                            <?php echo single_cat_title();
                            echo single_month_title(' ');
                        } ?> | <?php bloginfo('name'); ?>
                    <?php
                    }
                } ?></title>
        <?php } ?>

        <meta http-equiv="Content-Type"
              content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
        <link rel="profile" href="http://gmpg.org/xfn/11"/>
        <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>"/>
        <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>"/>
        <link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>"/>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
        <?php
        if ($cb_header_options['favi'] != '') {
            ?>
            <link rel="shortcut icon" type="image/png" href="<?php echo $cb_header_options['favi']; ?>"/>
        <?php } else { ?>
            <link rel="shortcut icon" type="image/png" href="<?php echo WP_THEME_URL; ?>/img/favicon.ico" /><?php } ?>

        <!--[if lte IE 7]>
        <link rel="stylesheet" type="text/css" href="<?php echo WP_THEME_URL; ?>/inc/css/drop_ie.css" media="screen"/>
        <![endif]-->
        <!--[if lte IE 7]>
        <link rel="stylesheet" href="<?php echo WP_THEME_URL; ?>/inc/js/anything_slider/css/anythingslider-ie.css"
              type="text/css" media="screen"/><![endif]-->

        <?php
        wp_head();
        ?>
        <link rel="shortcut icon" href="http://lilipink.com/wp-content/uploads/2014/10/favicon.ico">
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-52560577-11', 'auto');
            ga('send', 'pageview');

        </script>
    </head>
<?php $war = '';
if (isset($cb_type)) {
    $war = 'portfolio_project_single';
} ?>
<body <?php body_class($war); ?> id="modello_body">
    <script type="text/javascript">
        var main_w = window.innerWidth;
        var jb = document.getElementById("modello_body");
        if (main_w < 850) {
            jb.className = jb.className + " is_mobile";
        }
    </script>

<div id="bg">
<div class="wrapper">
    <header class="position_<?php echo $cb_header_options['mheadertype']; ?>">
    <?php if ($cb_header_options['lang_top'] == 'yes') { ?>
        <div class="lang-bar">
            <div class="container">

                <div class="col-xs-6">
                    <?php if (is_active_sidebar('header-topleft')) { ?>
                        <ul class="inline"><?php dynamic_sidebar('header-topleft'); ?></ul>
                    <?php } ?>
                </div>
                <div class="col-xs-6 text-right">
                    <?php if (is_active_sidebar('header-topright')) { ?>
                        <ul class="inline"><?php dynamic_sidebar('header-topright'); ?></ul>
                    <?php } ?>
                </div>
            </div>
        </div>

        
        <div id="modal">
            <a href="#cerrar"></a>
            <div id="modalContent-contact">

            <section id="wraper-contact" >
                
                <article >

                    <h2>CONTÁCTENOS</h2>
                    <p>Escríbenos a, pronto estaremos en <br> contacto contigo.</P>
                    <p>Comunícate con Servicio al Cliente al <b>(57) 6702400</b> en Bogotá o Escríbenos un <b>tiendavirtual@innova-quality.com.co</b> </p>
                </article>
                 <?php
        include('enviar.php');

                        if(!empty($_POST["verificar"])){
                            if($error==true){
                                ?>
                                <form name="form1" method="post" action="">
                                    <?php echo "<p id='contact-msn'>Revise los campos en rojo</p>"; ?>
                                    <input type="hidden" name="verificar" value="true"> </input>
                                    <label>Nombre (requerido):</label>
                                    <input type="text" id="contact0" name="nombre" value="<?php if($nombre){echo $nombre;} ;?>" />
                                    <label>Correo electrónico (requerido):</label>
                                    <input type="text" id="contact1" name="correo" value="<?php if($correo){echo $correo;} ;?>"/>
                                    <label>Ciudad (requerido):</label>
                                    <input type="text" id="contact2" name="ciudad" value="<?php if($ciudad){echo $ciudad;} ;?>"/>
                                    <label>Mensaje (requerido):</label>
                                    <textarea tapindex="4" id="contact3" name="mensaje" ><?php if($mensaje){echo $mensaje;} ;?></textarea>
                                    <input id="campo3" name="enviar" type="submit" value="Enviar" />

                                </form>
                                <?php
                            
                        }else{
                            echo "<div id='contact-conten'><p id='contact-p'>Su mensaje fue enviado correctamente pronto estaresmos en contacto </p></div>";
                        }
                        }else{
                            ?>
                                <form name="form1" method="post" action="">
                                    <input type="hidden" name="verificar" value="true"> </input>
                                    <label>Nombre (requerido):</label>
                                    <input type="text" id="contact0" name="nombre" value="<?php if($nombre){echo $nombre;} ;?>" />
                                    <label>Correo electrónico (requerido):</label>
                                    <input type="text" id="contact1" name="correo" value="<?php if($correo){echo $correo;} ;?>"/>
                                    <label>Ciudad (requerido):</label>
                                    <input type="text" id="contact2" name="ciudad" value="<?php if($ciudad){echo $ciudad;} ;?>"/>
                                    <label>Mensaje (requerido):</label>
                                    <textarea tapindex="4" id="contact3" name="mensaje" ><?php if($mensaje){echo $mensaje;} ;?></textarea>
                                    <input id="campo3" name="enviar" type="submit" value="Enviar" />

                                </form>
                            <?php
                        }
                        
                  
                     if(!empty($_POST["verificar"])){
                       
                if($error==true){
                   
                    for($i=0;$i<4;$i++){
                        if ($errorMessage[$i]==true){
                            ?>
                            <style type="text/css">
                            #contact<?php echo $i; ?>{
                                border: 1px solid red;
                            }
                            </style>
                           
                            <?php
                        }
                        
                    }
                
                }else{
                    
                    
                }
            }
        ?>
            </section>




            <a href="#cerrar">X</a>
            </div>
        </div>
        <div id="modalsus">
            <a href="#cerrar">X</a>

            <div id="modalContent">
                <!-- Begin MailChimp Signup Form -->
                <link href="//cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css">

                <div id="mc_embed_signup">
                    <form
                        action="//lilipink.us9.list-manage.com/subscribe/post?u=811b26cc0fbe5c4e316fe7d70&amp;id=0d1ade0c88"
                        method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate"
                        target="_blank" novalidate>
                        <div id="mc_embed_signup_scroll">
                            <h2>Suscríbete ahora</h2>

                            <p style="font-weight: 100; font-family: 'Open Sans', sans-serif; margin-top: -12px;">
                                Ingrese sus datos para recibir mas información acerca de nuestros productos, o
                                registrese para acceder a la tienda UNIQUE. </p>

                            <div class="mc-field-group">
                                <label style="font-weight: 100; font-family: 'Open Sans', sans-serif" for="mce-EMAIL">Dirección
                                    de correo electrónico *</label>
                                <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                            </div>
                            <div class="mc-field-group">
                                <label style="font-weight: 100; font-family: 'Open Sans', sans-serif" for="mce-FNAME">Nombre </label>
                                <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
                            </div>
                            <div id="mce-responses" class="clear">
                                <div class="response" id="mce-error-response" style="display:none"></div>
                                <div class="response" id="mce-success-response" style="display:none"></div>
                            </div>
                            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                            <div style="position: absolute; left: -5000px;"><input type="text" class="btn-mail-1"
                                                                                   name="b_811b26cc0fbe5c4e316fe7d70_0d1ade0c88"
                                                                                   tabindex="-1" value=""></div>
                            <div class="float-submit">
                                <input type="submit" value="Registrate" name="subscribe" id="mc-embedded-subscribe"
                                       class="btn-mail-1">
                            </div>
                        </div>
                    </form>
                </div>

                <!--End mc_embed_signup-->
                <a href="#cerrar">X</a>
            </div>
        </div>
    <?php } ?>
    <div class="container head_tope">
    <section class="style-one-header top-area"
             style="min-height:<?php echo $cb_header_options['header_min']; ?>px;">
        <h2 class="hidem"><?php echo $cb_header_options['logo_text']; ?></h2>

        <div class="row">

            <?php if ($cb_header_options['mheadertype'] == 'left') { ?>


                <div class="col-sm-2 col-xs-12">
                    <div class="top-logo-left">
                        <?php if ($cb_header_options['show_logo'] == 'yes' || $cb_header_options['upload_logo'] == '') { ?>
                            <h1>
                                <a href="<?php echo esc_url(home_url()); ?>/"><?php echo $cb_header_options['cb5_logo_text']; ?><?php if ($cb_header_options['cb5_logo_text'] == '') echo get_bloginfo('name'); ?></a>
                            </h1>
                            <p class="blog-description"><?php echo $cb_header_options['cb5_logo_slogan']; ?></p>
                        <?php
                        } else {
                            if ($cb_header_options['ht_bg_image_url'] != '') $cb_header_options['upload_logo'] = $cb_header_options['ht_bg_image_url']; ?>
                            <a href="<?php echo esc_url(home_url()); ?>/"><img
                                    src="<?php echo $cb_header_options['upload_logo']; ?>"
                                    alt="<?php echo $cb_header_options['logo_text']; ?>"/></a>
                        <?php } ?>

                    </div>
                </div>
                <div class="col-sm-5 col-xs-12 ">
                    <?php if (is_active_sidebar('header-left')) { ?>
                        <ul><?php dynamic_sidebar('header-left'); ?></ul>
                    <?php } ?>


                </div>

                <div class="col-sm-5 col-xs-12">


                    <?php if (is_active_sidebar('header-right')) { ?>
                        <ul><?php dynamic_sidebar('header-right'); ?></ul>
                    <?php } ?>


                </div>

            <?php } else { ?>
                <div class="col-sm-4 col-xs-12 colh1">
                    <?php if (is_active_sidebar('header-left')) { ?>
                        <ul><?php dynamic_sidebar('header-left'); ?></ul>
                    <?php } ?>
                </div>
                <div class="top-logo-holder col-sm-4 col-xs-12 colh2">

                    <div class="top-logo" style="top:<?php echo $cb_header_options['logo_position']; ?>px;">
                        <?php if ($cb_header_options['show_logo'] == 'yes' || $cb_header_options['upload_logo'] == '') { ?>
                            <h1>
                                <a href="<?php echo esc_url(home_url()); ?>/"><?php echo $cb_header_options['cb5_logo_text']; ?><?php if ($cb_header_options['cb5_logo_text'] == '') echo get_bloginfo('name'); ?></a>
                            </h1>
                            <p class="blog-description"><?php echo $cb_header_options['cb5_logo_slogan']; ?></p>
                        <?php
                        } else {
                            if ($cb_header_options['ht_bg_image_url'] != '') $cb_header_options['upload_logo'] = $cb_header_options['ht_bg_image_url']; ?>
                            <a href="<?php echo esc_url(home_url()); ?>/"><img
                                    src="<?php echo $cb_header_options['upload_logo']; ?>"
                                    alt="<?php echo $cb_header_options['logo_text']; ?>"/></a>
                        <?php } ?>

                    </div>

                </div>

                <div class="col-sm-4 col-xs-12 colh3">


                    <?php if (is_active_sidebar('header-right')) { ?>
                        <ul><?php dynamic_sidebar('header-right'); ?></ul>
                    <?php } ?>


                </div>
            <?php } ?>
        </div>
    </section>


    <div class="top-menu visible-md visible-lg">
        <ul>
            <?php

            $walker = new cbWalker;
            wp_nav_menu(array('theme_location' => 'menu-1', 'menu' => 'main-menu', 'container' => '', 'items_wrap' => '%3$s', 'fallback_cb' => false, 'walker' => $walker)); ?>
            <?php $woo_menu = esc_attr(get_option('cb5_woo_menu'));
            if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
                if ($woo_menu == 'yes') {
                    $cat_children = array();
                    $cat_children_vals = array();
                    $cat_children_old = array();
                    $cat_order = array();
                    $catTerms = get_terms('product_cat', array('hide_empty' => 0, 'orderby' => 'menu_order'));
                    $cat_sort = false;
                    $i = 100;
                    foreach ($catTerms as $catTerm) :
                        $set_order = get_woocommerce_term_meta($catTerm->term_id, 'order', true);
                        if ($catTerm->parent != '0') {
                            if ($set_order == 0) {
                                $i++;
                                $cat_children[$catTerm->parent][$i] = $catTerm;
                            } else {
                                $cat_children[$catTerm->parent][$set_order] = $catTerm;
                            }


                        } else {

                            if ($set_order != 0) $cat_sort = true;
                            $cat_order[$catTerm->term_id] = $set_order;
                        }
                    endforeach;


                    if ($cat_sort) natsort($cat_order);

                    foreach ($cat_order as $catID => $key) :
                        $catTerm = get_term($catID, 'product_cat');
                        $curty = get_query_var('product_cat');
                        $si_s = '';
                        foreach ($cat_children as $catck => $catckv) {
                            if ($catck == $catTerm->term_id) {
                                $si_s = 'menu-item-has-children';
                            }
                        }
                        if ($catTerm->parent == '0') {
                            if ($catTerm->slug == $curty) $curty = ' class="current-menu-item current_page_item menu-item product_cat menu-item ' . $si_s . '"'; else $curty = 'class="menu-item ' . $si_s . '"'; ?>
                            <li <?php echo $curty; ?>><a
                                    href="<?php $cattr = $catTerm->slug;
                                    $tr = get_term_link($cattr, 'product_cat');
                                    if (is_wp_error($tr)) continue;
                                    echo $tr; ?>">
                                    <?php echo $catTerm->name; ?> </a> <?php foreach ($cat_children as $catck => $catckv) {
                                    if ($catck == $catTerm->term_id) {
                                        ksort($catckv);
                                        echo '<ul class="sub-menu">';

                                        foreach ($catckv as $cat_f) {
                                            $curty = get_query_var('product_cat');
                                            if ($cat_f->slug == $curty) $curty = ' class="current-menu-item current_page_item menu-item product_cat"'; else $curty = 'class="menu-item"';
                                            $cattr = $cat_f->slug;
                                            $tr = get_term_link($cattr, 'product_cat');
                                            if (is_wp_error($tr)) continue;
                                            echo '<li ' . $curty . '><a href="' . $tr . '">' . $cat_f->name . '</a></li>';
                                        }
                                        echo '</ul>';

                                    }

                                }?></li>
                        <?php
                        } endforeach;
                }
            } ?>
        </ul>
    </div>

    <?php /* mobile menu */
    $walker_mobi = new cbWalker_mobi;
    echo '<div class="nav-mobile"><a title="Show/Hide Menu"></a></div><ul id="mobile-menu">';
    wp_nav_menu(array('theme_location' => 'menu-1', 'menu' => 'main-menu', 'container' => '', 'items_wrap' => '%3$s', 'menu_id' => 'mobi', 'walker' => $walker_mobi));

    $woo_menu = esc_attr(get_option('cb5_woo_menu'));
    if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
        if ($woo_menu == 'yes') {
            $cat_children = array();
            $cat_children_vals = array();
            $cat_children_old = array();
            $cat_order = array();
            $catTerms = get_terms('product_cat', array('hide_empty' => 0, 'orderby' => 'menu_order'));
            $cat_sort = false;
            $i = 100;
            foreach ($catTerms as $catTerm) :
                $set_order = get_woocommerce_term_meta($catTerm->term_id, 'order', true);
                if ($catTerm->parent != '0') {
                    if ($set_order == 0) {
                        $i++;
                        $cat_children[$catTerm->parent][$i] = $catTerm;
                    } else {
                        $cat_children[$catTerm->parent][$set_order] = $catTerm;
                    }


                } else {

                    if ($set_order != 0) $cat_sort = true;
                    $cat_order[$catTerm->term_id] = $set_order;
                }
            endforeach;


            if ($cat_sort) natsort($cat_order);

            foreach ($cat_order as $catID => $key) :
                $catTerm = get_term($catID, 'product_cat');
                $curty = get_query_var('product_cat');
                $si_s = '';
                foreach ($cat_children as $catck => $catckv) {
                    if ($catck == $catTerm->term_id) {
                        $si_s = 'menu-item-has-children';
                    }
                }
                if ($catTerm->parent == '0') {
                    if ($catTerm->slug == $curty) $curty = ' class="current-menu-item current_page_item menu-item product_cat menu-item ' . $si_s . '"'; else $curty = 'class="menu-item ' . $si_s . '"'; ?>
                    <li <?php echo $curty; ?>><a
                            href="<?php $cattr = $catTerm->slug;
                            $tr = get_term_link($cattr, 'product_cat');
                            if (is_wp_error($tr)) continue;
                            echo $tr; ?>">
                            <?php echo $catTerm->name; ?> </a> <?php foreach ($cat_children as $catck => $catckv) {
                            if ($catck == $catTerm->term_id) {
                                ksort($catckv);
                                echo '<ul class="sub-menu">';
                                foreach ($catckv as $cat_f) {
                                    $curty = get_query_var('product_cat');
                                    if ($cat_f->slug == $curty) $curty = ' class="current-menu-item current_page_item menu-item product_cat"'; else $curty = 'class="menu-item"';
                                    $cattr = $cat_f->slug;
                                    $tr = get_term_link($cattr, 'product_cat');
                                    if (is_wp_error($tr)) continue;
                                    echo '<li ' . $curty . '><a href="' . $tr . '">' . $cat_f->name . '</a></li>';
                                }
                                echo '</ul>';

                            }

                        }?></li>
                <?php
                } endforeach;
        }
    }

    echo '</ul>';

    ?>

    <div class="cl"></div>

    </div>

    </header>





<div class="slider_top">


<?php /*  map header type  */
if ($cb_header_options['header_type'] == 'map' && $cb_header_options['map_a'] != '') {
    get_template_part('inc/cb-theme/headers/map');
} ?>




<?php if (($cb_header_options['cb_type'] == 'portfolio' || $cb_header_options['bg_image_url'] != '') && is_single() && $cb_header_options['header_type'] == 'bg_head') { ?>
    <div id="loading"></div><?php
}
$s = '';
if (isset($_GET['s'])) $s = esc_attr(strip_tags($_GET['s']));

if ($cb_header_options['header_type'] == 'slider_head') {

    if (class_exists("RevSlider") && $cb_header_options['home_slider'] != 'no' && $cb_header_options['home_slider'] == 'revo') {
        $slider5 = new RevSlider();
        $arrSliders = $slider5->getArrSliders();
        $salias = '';
        foreach ($arrSliders as $slider5):
            $salias .= $slider5->getAlias();
        endforeach;
        if ($salias != '')
            putRevSlider($cb_header_options['revo_type']);
        else if ($cb_header_options['home_slider'] != 'none') echo '<h1 class="confin" style="font-size:20px;font-weight:300!important;color:#FFF!important;padding-top:100px;">Configure this element in Revolution Slider Settings</h1>';
    } else {
        if ($cb_header_options['home_slider'] != 'none') echo '<h1 class="confin" style="font-size:20px;font-weight:300!important;color:#FFF!important;padding-top:100px;">Please activate Revolution Slider</h1>';
    }
}
?>