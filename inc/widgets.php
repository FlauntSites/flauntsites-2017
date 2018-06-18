<?php
/**
 * Register our sidebars and widgetized areas.
 *
 */


function fs_widgets_init() {

	register_sidebar( array(
		'name'          => 'Footer Column 1',
		'id'            => 'footer_col_1',
	) );


	register_sidebar( array(
		'name'          => 'Footer Column 2',
		'id'            => 'footer_col_2',
	) );

	register_sidebar( array(
		'name'          => 'Footer Column 3',
		'id'            => 'footer_col_3',
	) );


	register_sidebar( array(
		'name'          => 'Footer Column 4',
		'id'            => 'footer_col_4',
	) );

}

add_action( 'widgets_init', 'fs_widgets_init' );



