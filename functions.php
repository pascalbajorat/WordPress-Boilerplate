<?php

class WordPressBoilerplate{
    static $ver = '2.0.0';
    static $jQuery_in_Footer = true; // true or false
    static $jQuery_Version = '2.1.3'; // 2.1.3 or 1.11.2

	function __construct(){
		/* Custom jQuery */
		add_action( 'init', array(__CLASS__, 'CustomjQuery') );
		/* Editor Styles */
		add_action( 'init', array($this, 'addEditorStyles') );
		/* Frontend Scripts */
		add_action( 'wp_enqueue_scripts', array(__CLASS__, 'FrontendScripts') );
		/* Theme Setup */
		add_action( 'after_setup_theme', array(__CLASS__, 'ThemeSetup') );

		/* JPEG Image Quality */
		add_filter( 'jpeg_quality', function(){return 90;} );

        /* Dashboard Columns */
        //add_action( 'admin_head-index.php', array(__CLASS__, 'dashboardColumns') );

        /* Remove script version from WordPress sources */
        add_filter( 'script_loader_src', array(__CLASS__, 'removeScriptVersion'), 15, 1 );
        add_filter( 'style_loader_src', array(__CLASS__, 'removeScriptVersion'), 15, 1 );

        /* Load Scripts with defer attribut, could cause problems with some scripts */
        add_filter( 'script_loader_tag', function ( $tag, $handle ) {

            /*
             * Here you can exclude plugins that cause problems with defer
             * e.G. syntaxhighlighter = SyntaxHighlighter Evolved
             */
            if( strstr($tag, 'syntaxhighlighter') || is_admin() ) {
                return $tag;
            }

            $tag = str_replace(' type=\'text/javascript\'', '', $tag);
            $tag = str_replace('\'', '"', $tag);
            return str_replace( ' src', ' defer="defer" src', $tag );
        }, 10, 2);
	}

    /**
     * Theme Setup with default Theme functions
     */
    public static function ThemeSetup(){

        /* HTML5 Support */
        add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));

		/* Thumbnail */
		add_theme_support( 'post-thumbnails' );
  		set_post_thumbnail_size( 150, 150 );
		add_image_size( 'image', 640, 480, true );

		/* Navigation */
		register_nav_menus(array(
			'primary' => __( 'Primary Navigation' )
		));

		/* Sidebar */
		register_sidebar(array(
			'name' => __('Sidebar'),
			'id' => 'sidebar',
			'description' => __('Sidebar description'),
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
    public static function CustomjQuery(){
		if ( !is_admin() ){
    		wp_deregister_script('jquery');
    		wp_register_script('jquery', get_stylesheet_directory_uri().'/js/vendor/jquery-'.self::$jQuery_Version.'.js', array(), self::$jQuery_Version, self::$jQuery_in_Footer);
      		wp_enqueue_script('jquery');
      	}
	}

    /**
     * Use jQuery and other Scripts in your Frontend
     */
    public static function FrontendScripts(){
		wp_enqueue_script( 'jquery' );

        wp_register_script('wp-h5bp-plugins', get_stylesheet_directory_uri().'/js/plugins.js', array('jquery'), self::$ver, true);
        wp_register_script('wp-h5bp-main', get_stylesheet_directory_uri().'/js/main.js', array('jquery', 'wp-h5bp-plugins'), self::$ver, true);

        wp_enqueue_script('wp-h5bp-plugins');
        wp_enqueue_script('wp-h5bp-main');
	}

    /**
     * Dashboard Columns
     */
    public static function dashboardColumns(){
        add_screen_option(
            'layout_columns',
            array(
                'max'     => 4,
                'default' => 2
            )
        );
    }

    /**
     * Remove query strings from javascript ressources
     *
     * @param $src
     * @return string
     */
    public static function removeScriptVersion($src)
    {
        // Exclude ressources from fonts.googleapis.com
        if( strstr($src, 'fonts.googleapis.com') || is_admin() ) {
            return $src;
        }

        $parts = explode('?', $src);
        return $parts[0];
    }

}

$WordPressBoilerplate = new WordPressBoilerplate();
