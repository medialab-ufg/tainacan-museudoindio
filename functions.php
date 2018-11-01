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
    wp_enqueue_style( 'style-museudoindio', get_stylesheet_directory_uri() . '/assets/scss/museudoindio.css' );
}
add_action( 'wp_enqueue_scripts', 'museuindio_enqueue_styles', 99 );

function description_on_header_banner(){ ?>
    <hr class="mi-hr"/>
    <p>Aqui teremos uma breve descrição do repositório em si, do que se trata, histórico,
resumo, etc.</p>
<?php }
add_action('tainacan-interface-banner-header-description', 'description_on_header_banner');