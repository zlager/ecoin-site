<?php

function admania_child_theme_scripts() {
    wp_enqueue_style( 'admania-parent-style', get_template_directory_uri() .'/style.css' ); //parent theme's style.css
    wp_enqueue_style( 'admania-child-style', get_stylesheet_uri(), array( 'admania-parent-style' ) ); //child theme's style.css
}

add_action( 'wp_enqueue_scripts', 'admania_child_theme_scripts' );



