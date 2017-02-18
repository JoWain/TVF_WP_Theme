<?php

/*
=====================
MENU SETUP
=====================
*/

function tvf_ns_theme_setup() {

	add_theme_support( 'menus' );

	register_nav_menu( 'primary' , 'Hauptnavigation unter dem Titelbild' );

	}

add_action( 'init' , 'tvf_ns_theme_setup' );

/*
======================
FONT ENQUEUE
======================
*/

function wpb_add_google_fonts() {

wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Abel|Yanone+Kaffeesatz:300,400|PT+Serif', false );
}

add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

/*
======================
SCRIPT ENQUEUE
======================
*/

function tvf_script_enqueue() {

	//	stylesheets enqueue
	//wp_enqueue_style( 'toastgrid' , get_template_directory_uri() . '/css/toast/grid.css', array() , '1.0.0' , 'all' );

	wp_enqueue_style( 'customstyle' , get_template_directory_uri() . '/css/turnverein-2.css', array() , '1.0.0' , 'all' );

	// javascript enqueue
	wp_enqueue_script('custom-jquery' , get_template_directory_uri() . '/js/jquery.min.js' , '2.1.4' , true );

  wp_enqueue_script('customjs' , get_template_directory_uri() . '/js/turnverein.js' , '1.0.0' , true );

}

add_action( 'wp_enqueue_scripts' , 'tvf_script_enqueue' );

/*
===============
THEME SUPPORT
===============
*/

add_theme_support( 'post-thumbnails' );
add_theme_support( 'page-thumbnails' );

/*
==================
SIDEBAR FUNCTION
==================
*/

 function tvf_widget_setup() {


	register_sidebar(
			array(
			'name'					=>	'Rechte Seitenleiste TV',
			'id'						=>	'widgets-right-tv',
			'class'					=>	'custom-wid',
			'description'		=>	'Dieses Widget erscheint nur auf der TV-seite',
			'before_widget'	=>	'<aside id="%1$s" class="widget widget-rechts %2$s">',
			'after_widget'	=>	'</aside>',
			'before_title'	=>	'<h1 class="widget-title-rechts">',
			'after_title'		=>	'</h1>'
		)
	);

	register_sidebar(
			array(
			'name'					=>	'Rechte Seitenleiste Faustball',
			'id'						=>	'widgets-right-fb',
			'class'					=>	'custom-wid',
			'description'		=>	'Dieses Widget erscheint nur auf der Faustballseite',
			'before_widget'	=>	'<aside id="%1$s" class="widget widget-rechts %2$s">',
			'after_widget'	=>	'</aside>',
			'before_title'	=>	'<h1 class="widget-title-rechts">',
			'after_title'		=>	'</h1>'
		)
	);

	register_sidebar(
			array(
			'name'					=>	'Rechte Seitenleiste Jugendriege',
			'id'						=>	'widgets-right-jr',
			'class'					=>	'custom-wid',
			'description'		=>	'Dieses Widget erscheint nur auf der Jugiseite',
			'before_widget'	=>	'<aside id="%1$s" class="widget widget-rechts %2$s">',
			'after_widget'	=>	'</aside>',
			'before_title'	=>	'<h1 class="widget-title-rechts">',
			'after_title'		=>	'</h1>'
		)
	);


	register_sidebar(
			array(
			'name'					=>	'Rechte Seitenleiste Mädchenriege',
			'id'						=>	'widgets-right-maer',
			'class'					=>	'custom-wid',
			'description'		=>	'Dieses Widget erscheint nur auf der Seite der Mädchenriege',
			'before_widget'	=>	'<aside id="%1$s" class="widget widget-rechts %2$s">',
			'after_widget'	=>	'</aside>',
			'before_title'	=>	'<h1 class="widget-title-rechts">',
			'after_title'		=>	'</h1>'
		)
	);


	register_sidebar(
			array(
			'name'					=>	'Rechte Seitenleiste Männerriege',
			'id'						=>	'widgets-right-mr',
			'class'					=>	'custom-wid',
			'description'		=>	'Dieses Widget erscheint nur auf der Seite der Männerriege',
			'before_widget'	=>	'<aside id="%1$s" class="widget widget-rechts %2$s">',
			'after_widget'	=>	'</aside>',
			'before_title'	=>	'<h1 class="widget-title-rechts">',
			'after_title'		=>	'</h1>'
		)
	);


	register_sidebar(
			array(
			'name'					=>	'Rechte Seitenleiste Damenturnverein',
			'id'						=>	'widgets-right-dtv',
			'class'					=>	'custom-wid',
			'description'		=>	'Dieses Widget erscheint nur auf der Seite des Damenturnvereins',
			'before_widget'	=>	'<aside id="%1$s" class="widget widget-rechts %2$s">',
			'after_widget'	=>	'</aside>',
			'before_title'	=>	'<h1 class="widget-title-rechts">',
			'after_title'		=>	'</h1>'
		)
	);


	register_sidebar(
			array(
			'name'					=>	'Rechte Seitenleiste ELKI-Turnen',
			'id'						=>	'widgets-right-elki',
			'class'					=>	'custom-wid',
			'description'		=>	'Dieses Widget erscheint nur auf der Seite des ELKI-Turnens',
			'before_widget'	=>	'<aside id="%1$s" class="widget widget-rechts %2$s">',
			'after_widget'	=>	'</aside>',
			'before_title'	=>	'<h1 class="widget-title-rechts">',
			'after_title'		=>	'</h1>'
		)
	);

	register_sidebar(
			array(
			'name'					=>	'Seitenende Feld 1',
			'id'						=>	'bottomline-1',
			'class'					=>	'custom-wid',
			'description'		=>	'Dieses Widget erscheint ganz unten an der Seite und wird für Kontakte usw. gebraucht.',
			'before_widget'	=>	'<aside id="%1$s" class="widget widget-unten %2$s">',
			'after_widget'	=>	'</aside>',
			'before_title'	=>	'<h1 class="bottomline-title">',
			'after_title'		=>	'</h1>'
		)
	);

	register_sidebar(
			array(
			'name'					=>	'Seitenende Feld 2',
			'id'						=>	'bottomline-2',
			'class'					=>	'custom-wid',
			'description'		=>	'Dieses Widget erscheint ganz unten an der Seite und wird für Kontakte usw. gebraucht.',
			'before_widget'	=>	'<aside id="%1$s" class="widget widget-unten %2$s">',
			'after_widget'	=>	'</aside>',
			'before_title'	=>	'<h1 class="bottomline-title">',
			'after_title'		=>	'</h1>'
		)
	);

	// register_sidebar(
	// 		array(
	// 		'name'					=>	'Seitenende Feld 3',
	// 		'id'						=>	'bottomline-3',
	// 		'class'					=>	'custom-wid',
	// 		'description'		=>	'Dieses Widget erscheint ganz unten an der Seite und wird für Kontakte usw. gebraucht.',
	// 		'before_widget'	=>	'<aside id="%1$s" class="widget widget-unten %2$s">',
	// 		'after_widget'	=>	'</aside>',
	// 		'before_title'	=>	'<h1 class="bottomline-title">',
	// 		'after_title'		=>	'</h1>'
	// 	)
	// );
	//
	// register_sidebar(
	// 		array(
	// 		'name'					=>	'Seitenende Feld 4',
	// 		'id'						=>	'bottomline-4',
	// 		'class'					=>	'custom-wid',
	// 		'description'		=>	'Dieses Widget erscheint ganz unten an der Seite und wird für Kontakte usw. gebraucht.',
	// 		'before_widget'	=>	'<aside id="%1$s" class="widget widget-unten %2$s">',
	// 		'after_widget'	=>	'</aside>',
	// 		'before_title'	=>	'<h1 class="bottomline-title">',
	// 		'after_title'		=>	'</h1>'
	// 	)
	// );
	//
	// register_sidebar(
	// 		array(
	// 		'name'					=>	'Seitenende Feld 5',
	// 		'id'						=>	'bottomline-5',
	// 		'class'					=>	'custom-wid',
	// 		'description'		=>	'Dieses Widget erscheint ganz unten an der Seite und wird für Kontakte usw. gebraucht.',
	// 		'before_widget'	=>	'<aside id="%1$s" class="widget widget-unten %2$s">',
	// 		'after_widget'	=>	'</aside>',
	// 		'before_title'	=>	'<h1 class="bottomline-title">',
	// 		'after_title'		=>	'</h1>'
	// 	)
	// );


 }

add_action( 'widgets_init' , 'tvf_widget_setup' );


?>
