<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        
        <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/apple-touch-icon-precomposed.png" />

        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/normalize.css" />
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />

        <script src="<?php bloginfo('template_url'); ?>/js/vendor/modernizr-2.6.2.min.js"></script>
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