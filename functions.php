<?php
//Teste commit
// Variáveis globais do Tema 
// Sobreescreva elas no seu ambiente de desenvolvimento
// copiando o dev-vars-sample.php e salvando como dev-vars.php


require_once ('functions/class-tainacanmuseuIndiothemeterm.php');
require_once ('tainacan-mods.php');
require_once ('functions/theme-options.php');

// Estilos
function museuindio_enqueue_styles() {
    
	global $MuseuDoIndioMods;

	$parent_style = 'tainacan-interface';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'tainacan-museudoindio',
    get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
	wp_enqueue_script( 'tainacna_readMore', get_stylesheet_directory_uri() . '/assets/js/readmore.js', array( 'jquery' ), '1.0', true );
	wp_localize_script( 'tainacna_readMore', 'readmoreVars', array(
		'moreLink' => '<a href="#">' . __( 'Show more', 'tainacan-interface' ) . '</a>',
		'lessLink' => '<a href="#">' . __( 'Show less', 'tainacan-interface' ) . '</a>',
	));
    wp_enqueue_style( 'style-museudoindio', get_stylesheet_directory_uri() . '/assets/scss/museudoindio.css' );
    wp_enqueue_script( 'script-museudoindio', get_stylesheet_directory_uri() . '/assets/js/scripts.js', '', '', true );
	wp_localize_script('script-museudoindio', 'museudoindio', [
		'search_target_url' =>  get_permalink( $MuseuDoIndioMods->main_collection->get_id() ) . '/#/'
	]);
}
add_action( 'wp_enqueue_scripts', 'museuindio_enqueue_styles', 99 );

function description_on_header_banner(){ ?>
    <hr class="mi-hr"/>
    <p><?php echo bloginfo('description'); ?></p>
<?php }
add_action('tainacan-interface-banner-header-description', 'description_on_header_banner');

/**
 * Register the menu for use before the banner
 */
add_action( 'after_setup_theme', 'mi_top_menu' );
function mi_top_menu() {
	register_nav_menu( 'MenuBannerBefore', __( 'Nav Menu Before Header', 'tainacan-theme' ) );
	
	/* show_admin_bar( false ); */
	
}

/**
 * Adiciona classes extras à lista de elementos que mudam de cor de acordo com a preferência do usuário
 * 
 */
function add_class_customize($colors) {
	return <<<CSS
	.front-page .front-page-header h1 { color: {$colors['tainacan_link_color']}; }
	.front-page .front-page-list li a:hover { color: {$colors['tainacan_link_color']}; }
CSS;
}
add_filter('tainacan-customize-css-class', 'add_class_customize');

function tainacan_mi_get_home_categories() {
	global $mindio_nome_tax_categoria;
	$terms_repo = \Tainacan\Repositories\Terms::get_instance();
	$tax_repo = \Tainacan\Repositories\Taxonomies::get_instance();
	$tax_id = get_theme_option('tax_colecoes');
	if (is_numeric($tax_id)) {
		$tax = $tax_repo->fetch( (int) $tax_id );
		if (false !== $tax) {
			$terms = $terms_repo->fetch([], $tax);
			return $terms;
		}
	}

	return [];
	
	
}

function tainacan_mi_get_nomes_povos() {
	global $MuseuDoIndioMods;
	
	return $MuseuDoIndioMods->get_nomes_povos_home();
	
	
}

add_filter('tainacan-get-term-description', function($description, $term) {
	return nl2br($description);
}, 10, 2);


// check tainacan 
add_action('init', function() {
	
	remove_filter('theme_mod_header_image', [\Tainacan\Theme_Helper::get_instance(), 'header_image']);
	
	if ( !function_exists('tainacan_the_document') ) {
		die('Plugin do Tainacan não encontrado');
	}
});

