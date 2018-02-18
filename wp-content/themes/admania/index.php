<?php

/**
 * Theme Index Section for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */


$admania_blog_layout = ((admania_get_option('admania_blog_scheme')) ? admania_get_option('admania_blog_scheme') : 'amblyt1');

get_template_part('amblayouts/'.$admania_blog_layout); // Calls the bloglayouts 
 

 
