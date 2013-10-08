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
	}

	public static function addEditorStyles(){
		add_editor_style( 'custom-editor-styles.css' );
	}

	public static function jQuery_CDN(){
		if ( !is_admin() ){
    		wp_deregister_script('jquery');
    		wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false, '1.10.2');
      		wp_enqueue_script('jquery');
      	}
	}

	public static function FrontendScripts(){
		wp_enqueue_script( 'jquery' );
	}

}

$WordPressBoilerplate = new WordPressBoilerplate();

?>