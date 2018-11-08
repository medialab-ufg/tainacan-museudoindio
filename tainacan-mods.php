<?php 

Class MuseuDoIndioMods {
	
	
	function __construct() {
		
		add_action('init', [$this, 'init']);
		
		
	}
	
	function init() {
		
		$this->tax_repo = \Tainacan\Repositories\Taxonomies::get_instance();
		$this->col_repo = \Tainacan\Repositories\Collections::get_instance();
		$this->filters_repo = \Tainacan\Repositories\Filters::get_instance();
		
		$this->main_collection = $this->col_repo->fetch_one(['name' => 'Museu do Índio']);
		
	}
	
	/**
	 * Outputs the div used by Vue to render the faceted search
	 */
	function term_faceted_search() {

		$props = ' ';
		
		$default_view_mode = apply_filters( 'tainacan-default-view-mode-for-themes', 'masonry' );
		$enabled_view_modes = apply_filters( 'tainacan-enabled-view-modes-for-themes', ['table', 'cards', 'masonry'] );
		
		// if in a collection page
		$collection_id = $this->main_collection->get_id();
		if ($collection_id) {
			
			$props .= 'collection-id="' . $collection_id . '" ';
			$collection = new  \Tainacan\Entities\Collection($collection_id);
			$default_view_mode = $collection->get_default_view_mode();
			$enabled_view_modes = $collection->get_enabled_view_modes();
		}
		
		// if in a tainacan taxonomy
		$term = tainacan_get_term();
		if ($term) {
			$props .= 'term-id="' . $term->term_id . '" ';
			$props .= 'taxonomy="' . $term->taxonomy . '" ';
		}
		
		// collection filters 
		$filters = $this->filters_repo->fetch_by_collection($this->main_collection, [], 'OBJECT');
		//var_dump($filters);
		$filters_id = array_map(function($a) { return $a->get_id(); }, $filters);
		
		$props .= 'default-view-mode="' . $default_view_mode . '" ';
		$props .= 'enabled-view-modes="' . implode(',', $enabled_view_modes) . '" ';
		$props .= 'custom-filters="' . implode(',', $filters_id) . '" ';

		echo "<div id='tainacan-items-page' $props ></div>";

	}
	
	
}

global $MuseuDoIndioMods;

$MuseuDoIndioMods = new MuseuDoIndioMods();