<?php

// Estilos
function museuindio_enqueue_styles() {

	$parent_style = 'parent-style';

	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style',
	get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style )
	);

}
add_action( 'wp_enqueue_scripts', 'museuindio_enqueue_styles', 99 );

add_filter('tainacan-get-term-description', function($description, $term){
	
	if ($term->taxonomy != 'tnc_tax_375282') {
		return $description;
	}
	
	$etnias = [
		'Ajuru' => 'Q4017693',
		'Akuntsu' => 'Q423752',
		'Amanayé' => 'Q1832976',
		'Apalaí' => 'Q617636',
		'Apiaká' => 'Q2415009',
		'Apinajé' => 'Q2469268',
		'Apinayé' => 'Q2469268',
		'Apurinã' => 'Q963221',
		'Arára do Pará' => 'Q1091115',
		'Araweté' => 'Q3621312',
		'Asuriní do Xingu' => 'Q1091271',
		'Aticum' => 'Q3628096',
		'Aweti' => 'Q791722',
		'Bakairi' => 'Q804230',
		'Baníwa' => 'Q614455',
		'Botocudo' => 'Q894756',
		'Canela Ramkókamekra' => 'Q3510129',
		'Carnijó' => 'Q3754271',
		'Cinta Larga' => 'Q1092569',
		'Cinta-larga' => 'Q1092569',
		'Desana' => 'Q618073',
		'Fulnió' => 'Q3754271',
		'Galibi Marworno' => 'Q3757609',
		'Gorotire' => 'Q1028240',
		'Guaikurú' => 'Q1552954',
		'Guarani' => 'Q46429',
		'Guarani Kaiwá' => 'Q32017',
		'Guarani Nhandéva' => 'Q3778251',
		'Guató' => 'Q1090780',
		'Hixkaryana' => 'Q3785971',
		'Huamói' => 'Q3628096',
		'Ingarikó' => 'Q922476',
		'Irantxe' => 'Q3801844',
		'Iwalapiti' => 'Q2537324',
		'Jabuti' => 'Q3712260',
		'Juruna' => 'Q3512896',
		'Kadiwéu' => 'Q2932811',
		'Kaiapó' => 'Q1028240',
		'Kaingang' => 'Q35533',
		'Kaiowá' => 'Q32017',
		'Kalapálo' => 'Q2520155',
		'Kamayurá' => 'Q1722872',
		'Kanamari' => 'Q3513512',
		'Karafawyana' => 'Q3812922',
		'Kariri' => 'Q3813014',
		'Karitiana' => 'Q1091084',
		'Kaxuyana' => 'Q3814068',
		'Kayapó' => 'Q1028240',
		'Kinikináo' => 'Q3510071',
		'Krahô' => 'Q3509829',
		'Kreen-Akarôre' => 'Q545219',
		'Krenak' => 'Q3816974',
		'Krikatí' => 'Q3816997',
		'Kulina' => 'Q3507494',
		'Makurap' => 'Q3843707',
		'Makuxi' => 'Q2520166',
		'Marubo' => 'Q3508898',
		'Mawé' => 'Q2259699',
		'Mayoruna' => 'Q2708837',
		'Munduruku' => 'Q1273591',
		'Nambikwára' => 'Q1476741',
		'Ninam-Xirixana ' => 'Q34188',
		'Ninan' => 'Q34188',
		'Ofaié' => 'Q2258646',
		'Ofayé' => 'Q2258646',
		'Pakaa Nova' => 'Q2549328',
		'Pakaanova' => 'Q2549328',
		'Palikur' => 'Q2712146',
		'Panará (Kreen-akarôre)' => 'Q545219',
		'Pankararu' => 'Q3512942',
		'Parakanã' => 'Q3895145',
		'Paresi' => 'Q3895812',
		'Parintintin' => 'Q2258581',
		'ParkatêJê' => 'Q3514010',
		'Parkatejê (Gavião do Pará)' => 'Q3514010',
		'Pataxó' => 'Q432324',
		'Paumari' => 'Q3898252',
		'Pukanu' => 'Q1028240',
		'Rikbaktsa' => 'Q202511',
		'Rikbatsa' => 'Q202511',
		'Sataré' => 'Q2259699',
		'Sataré-Mawé' => 'Q2259699',
		'Suyá' => 'Q7650652',
		'Suyá- Kisêjê' => 'Q7650652',
		'Tapayuna' => 'Q3980976',
		'Tapirapé' => 'Q1099041',
		'Tembé' => 'Q1099047',
		'Terena' => 'Q1028268',
		'Timbira' => 'Q3991397',
		'Tiriyó' => 'Q2299416',
		'Truká' => 'Q3509706',
		'Trumai' => 'Q2522647',
		'Tupari' => 'Q4000527',
		'Tupiniquim' => 'Q2261742',
		'Turiwara' => 'Q4000626',
		'Tuxá' => 'Q4000968',
		'Tuyuca' => 'Q12972479',
		'Tuyúka' => 'Q12972479',
		'Txicão' => 'Q4001119',
		'Txikão' => 'Q4001119',
		'Waiãpi' => 'Q1431998',
		'Waimiri Atroari' => 'Q1560134',
		'Wajãpi' => 'Q1431998',
		'Wajuru' => 'Q4017693',
		'Waurá' => 'Q1099056',
		'Wayampi' => 'Q1431998',
		'Wayana' => 'Q2299931',
		'Wayoró' => 'Q4017693',
		'Xavante' => 'Q978982',
		'Xereu' => 'Q12645323',
		'Xikrin' => 'Q1028240',
		'Xinkrin' => 'Q1028240',
		'Xirianã' => 'Q34188',
		'Yamamadi' => 'Q1091090',
		'Yaminawa' => 'Q572484',
		'Yanomama' => 'Q34188',
		'Yanomami' => 'Q34188',
		'Yanomany' => 'Q34188',
		'Yawalapití' => 'Q2537324',
		'Yawanawá' => 'Q1102274',
		"Zo'é" => 'Q153639',
		'Zoró' => 'Q4024837',
		'Zuruahã' => 'Q230469',
	];
	
	
	$q = isset($etnias[$term->name]) ? $etnias[$term->name] : false;
	
	if (!$q) {
		return $description;
	}
	
	$request = wp_remote_get("https://www.wikidata.org/w/api.php?action=wbgetentities&format=json&languages=pt&ids=$q");

	if( ! is_wp_error( $request ) ) {
		
		$body = wp_remote_retrieve_body( $request );
		
		$body = json_decode($body);
		
		$r = '';
		
		if (is_object($body) && isset($body->entities->$q)) {
			$entity = $body->entities->$q;
			$aliases = [];
			if (isset($entity->aliases) && isset($entity->aliases->pt)) {
				$r .= '<br/><b>Também conhecido como:</b> ';
				$aliases = array_map(function($alias) { return $alias->value; }, $entity->aliases->pt);
				$r .= implode(', ', $aliases);
			}
			
			if (isset($entity->claims)) {
				$claims = $entity->claims;
				
				// População
				if (
					isset($claims->P1082) && is_array($claims->P1082) && isset($claims->P1082[0]) && is_object($claims->P1082[0]) &&
					isset($claims->P1082[0]->mainsnak) && is_object($claims->P1082[0]->mainsnak) &&
					isset($claims->P1082[0]->mainsnak->datavalue) && is_object($claims->P1082[0]->mainsnak->datavalue) &&
					isset($claims->P1082[0]->mainsnak->datavalue->value) && is_object($claims->P1082[0]->mainsnak->datavalue->value) &&
					isset($claims->P1082[0]->mainsnak->datavalue->value->amount)
				
				) {
					$amount = $claims->P1082[0]->mainsnak->datavalue->value->amount;
					$r .= '<br/><b>População:</b> ';
					$r .= (int) $amount;
					
					$prop = $claims->P1082[0];
					
					// Qualificador
					if (
						isset($prop->qualifiers) && is_object($prop->qualifiers) &&
						isset($prop->qualifiers->P585) && is_array($prop->qualifiers->P585) && 
						isset($prop->qualifiers->P585[0])  && is_object($prop->qualifiers->P585[0]) &&
						isset($prop->qualifiers->P585[0]->datavalue) && is_object($prop->qualifiers->P585[0]->datavalue) &&
						isset($prop->qualifiers->P585[0]->datavalue->value) && is_object($prop->qualifiers->P585[0]->datavalue->value) &&
						isset($prop->qualifiers->P585[0]->datavalue->value->time)
					
					
					) {
						$time = $prop->qualifiers->P585[0]->datavalue->value->time;
						$ano = substr($time, 1, 4);
						$r .= " (em $ano)";
					}
					
				}
				
				// Wiki Commons Category
				if (
					isset($claims->P373) && is_array($claims->P373) && isset($claims->P373[0]) && is_object($claims->P373[0]) &&
					isset($claims->P373[0]->mainsnak) && is_object($claims->P373[0]->mainsnak) &&
					isset($claims->P373[0]->mainsnak->datavalue) && is_object($claims->P373[0]->mainsnak->datavalue) &&
					isset($claims->P373[0]->mainsnak->datavalue->value)
				
				) {
					$commons = $claims->P373[0]->mainsnak->datavalue->value;
					$link = 'https://commons.wikimedia.org/wiki/Category:' . $commons;
					$r .= '<br/><b>Categoria na Wikimedia Commons:</b> ';
					$r .= "<a href='$link' target='_blank'>$link</a>";
					
				}
				
			}
			
		}
		
	}

	if (!empty($r)) {
		$r = '<br/><br/>Informações da WikiData:' . $r;
	}
	
	return $description . $r;
	
}, 10, 2);



