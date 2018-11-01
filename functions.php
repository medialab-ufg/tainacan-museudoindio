<?php

require_once ('functions/class-tainacanmuseuIndiothemeterm.php');

// Estilos
function museuindio_enqueue_styles() {
    $parent_style = 'tainacan-interface';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'tainacan-museudoindio',
    get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}
add_action( 'wp_enqueue_scripts', 'museuindio_enqueue_styles', 99 );

