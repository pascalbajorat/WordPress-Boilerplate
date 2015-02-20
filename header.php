<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        
        <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

        <!-- See: http://www.webdesign-podcast.de/2015/02/06/favicons-best-practice-guideline/ -->
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <meta name="apple-mobile-web-app-title" content="AppName" />
        <meta name="msapplication-TileColor" content="#3d5064" />
        <meta name="msapplication-TileImage" content="<?php bloginfo('template_url') ?>/img/tileicon.png" />

        <link rel="apple-touch-icon" href="<?php bloginfo('template_url') ?>/img/touch-icon-iphone.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_url') ?>/img/touch-icon-ipad.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_url') ?>/img/touch-icon-iphone-retina.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_url') ?>/img/touch-icon-ipad-retina.png" />

        <link rel="icon" href="<?php bloginfo('template_url') ?>/img/favicon.png" type="image/x-icon" />

        <!--[if IE]>
        <link rel="shortcut icon" href="<?php bloginfo('template_url') ?>/img/favicon.ico" type="image/x-icon" />
        <link rel="icon" href="<?php bloginfo('template_url') ?>/img/favicon.ico" type="image/x-icon" />
        <![endif]-->

        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/normalize.css" />
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />

        <script src="<?php bloginfo('template_url'); ?>/js/vendor/modernizr-2.8.3.js"></script>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <nav>
            <?php
            wp_nav_menu(array(
                'container' => false,
                'menu' => 'primary_navigation',
                'menu_id' => 'primary_navigation',
                'theme_location' => 'primary'
            ));
            ?>
        </nav>