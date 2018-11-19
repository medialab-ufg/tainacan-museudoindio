<?php 

Class MuseuDoIndioMods {
	
	
	function __construct() {
		
		add_action('init', [$this, 'init']);
		
		//add_filter('term_link', [$this, 'term_link_filter'], 10, 3);
		
		
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
	
	function get_term_link(\Tainacan\Entities\Term $term) {
		
		return get_term_link($term->get_id(), $term->get_taxonomy());
		
		// $link = "fetch_only%5B0%5D=thumbnail&fetch_only%5B1%5D=creation_date&fetch_only%5B2%5D=author_name&fetch_only%5B3%5D=title&fetch_only%5B4%5D=description&&fetch_only%5Bmeta%5D%5B0%5D=0&view_mode=masonry&perpage=48&paged=1&order=DESC&orderby=date&taxquery%5B0%5D%5Btaxonomy%5D=".$term->get_taxonomy()."&taxquery%5B0%5D%5Bterms%5D%5B0%5D=". $term->get_id() ."&taxquery%5B0%5D%5Bcompare%5D=IN";
		// 
		// $base_link = get_post_type_archive_link($this->main_collection->get_db_identifier());
		// 
		// return trailingslashit($base_link) . '#/?' . $link; 
		
	}
	
	function term_link_filter($link, $term, $taxonomy) {
		$theme_helper = \Tainacan\Theme_Helper::get_instance();
		if ( $theme_helper->is_taxonomy_a_tainacan_tax($taxonomy) ) {
			$termEntity = new \Tainacan\Entities\Term($term);
			if ( $termEntity instanceof \Tainacan\Entities\Term ) {
				return $this->get_term_link($termEntity);
			}
		}
		return $link;
	}
	
	function get_nomes_povos_home() {
		$meta_repo = \Tainacan\Repositories\Metadata::get_instance();
		
		$metas = $meta_repo->fetch_by_collection( $this->main_collection, ['name' => 'Nome Principal do povo'], 'OBJECT' );
		//var_dump($metas);
		if (is_array($metas) && sizeof($metas) > 0) {
			$meta = $metas[0];
			
			$args = [
				'collection_id' => $this->main_collection->get_id(),
				'count_items' => true,
				'items_filter' => false
			];
			
			$nomes = $meta_repo->fetch_all_metadatum_values($meta->get_id(), $args);
			
			if (isset($nomes['values'])) {
				foreach ($nomes['values'] as $value) {
					
					?>
					<li>
						<a href="<?php echo get_term_link( (int) $value['value'], $value['taxonomy'] ); ?>">
							<?php echo $value['label']; ?>
							(<?php echo $value['total_items']; ?>)
						</a>
					</li>
					<?php
					
				}
			}
			
			return $nomes;
			
		}
		
	}
	
	
}

global $MuseuDoIndioMods;

$MuseuDoIndioMods = new MuseuDoIndioMods();