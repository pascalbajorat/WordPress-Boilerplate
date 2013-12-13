<?php

class WordPressBoilerplate{

	function __construct(){
		/* jQuery Google CDN */
		add_action( 'init', array(__CLASS__, 'jQuery_CDN') );
		/* Editor Styles */
		add_action( 'init', array($this, 'addEditorStyles') );
		/* jQuery Frontend */
		add_action( 'wp_enqueue_scripts', array(__CLASS__, 'FrontendScripts') );
		/* Theme Setup */
		add_action( 'after_setup_theme', array(__CLASS__, 'ThemeSetup') );

		/* JPEG Image Quality */
		add_filter( 'jpeg_quality', function($arg){return 90;} );
	}

    /**
     * Theme Setup with default Theme functions
     */
    public static function ThemeSetup(){
		/* Thumbnail */
		add_theme_support( 'post-thumbnails' );
  		set_post_thumbnail_size( 150, 150 );
		add_image_size( 'image', 640, 480, true );

		/* Navigation */
		register_nav_menus(array(
			'primary' => __( 'Hauptnavigation' )
		));

		/* Sidebar */
		register_sidebar(array(
			'name' => __('Sidebar'),
			'id' => 'sidebar',
			'description' => __('In dieser Sidebar werden die Leistungen auf der Startseite dargestellt.'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>'
		));

        /* Add Custom Background Support */
        self::add_custom_background();

        /* Add Custom Header Support */
        self::add_custom_header();
	}

    /**
     * Add Custom-Background Support for this Theme
     */
    public static function add_custom_background(){

        /*
         * Allowed Arguments:
         *
         *  'default-color'          => '',
	     *  'default-image'          => '',
	     *  'wp-head-callback'       => '_custom_background_cb',
	     *  'admin-head-callback'    => '',
	     *  'admin-preview-callback' => ''
         *
         */

        $args = array(
            'default-color' => 'ffffff',
            'default-image' => ''
        );

        add_theme_support('custom-background', $args);
    }

    /**
     * Add Custom-Header Support for this Theme
     */
    public static function add_custom_header(){

        /*
         * Allowed Arguments:
         *
         *  'default-image'          => '',
	     *  'random-default'         => false,
	     *  'width'                  => 0,
	     *  'height'                 => 0,
	     *  'flex-height'            => false,
	     *  'flex-width'             => false,
	     *  'default-text-color'     => '',
	     *  'header-text'            => true,
	     *  'uploads'                => true,
	     *  'wp-head-callback'       => '',
	     *  'admin-head-callback'    => '',
	     *  'admin-preview-callback' => '',
         *
         */

        $args = array(
            'width' => 800,
            'height' => 350,
            'uploads' => true,
            'header-text' => false,
            'default-image' => get_template_directory_uri().'/img/default-header.jpg'
        );

        add_theme_support('custom-header', $args);
    }

    /**
     * Add Editor-Styles for TinyMCE
     */
    public static function addEditorStyles(){
		add_editor_style( 'custom-editor-styles.css' );
	}

    /**
     * Use jQuery CDN instead of WordPress own jQuery
     */
    public static function jQuery_CDN(){
		if ( !is_admin() ){
    		wp_deregister_script('jquery');
    		wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false, '1.10.2');
      		wp_enqueue_script('jquery');
      	}
	}

    /**
     * Use jQuery in your Frontend
     */
    public static function FrontendScripts(){
		wp_enqueue_script( 'jquery' );
	}

}

$WordPressBoilerplate = new WordPressBoilerplate();
