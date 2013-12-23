<?php

	// G O O G L E   W E B   F O N T S
	//--------------------------------------------------------
	
	add_action( 'wp_head', 'atp_google_webfonts' );	
	
	//
	//--------------------------------------------------------
	if (!function_exists( "atp_google_webfonts")) {
		function atp_google_webfonts() {
		
			global  $options;
			$google_fonts = array(	
				array( 	'name' => "Abel",				'variant' => 'r'),
				array( 	'name' => "Antic",				'variant' => ''),	
				array( 	'name' => "Andika",				'variant' => ''),
				array( 	'name' => "Amaranth", 			'variant' => ''),
				array( 	'name' => "Allerta",			'variant' => ''),
				array( 	'name' => "Anonymous Pro",		'variant' => ':r,b,bi'),
				array( 	'name' => "Arimo",		 		'variant' => 'r,b,bi'),
				array(  'name' => "Bangers", 			'variant' => ''),
				array(  'name' => "Bitter", 			'variant' => ''),
				array( 	'name' => "Cantarell",	 		'variant' => ':r,b,i,bi'),
				array( 	'name' => "Carme",		 		'variant' => ''),
				array( 	'name' => "Coustard",	 		'variant' => ':r,b'),
				array( 	'name' => "Cabin",		 		'variant' => ':r,b,i,bi'),
				array( 	'name' => "Crushed",	 		'variant' => ''),
				array( 	'name' => "Cantarell",	 		'variant' => ':r,b,i,bi'),
				array( 	'name' => "Crimson Text", 		'variant' => ':r,b,i,bi'),
				array( 	'name' => "Crete Round",		'variant' => ''),
				array( 	'name' => "Cuprum",		 		'variant' => ''),
				array( 	'name' => "Cardo",		 		'variant' => ':r,b,i'),
				array( 	'name' => "Cookie",		 		'variant' => ''),
				array( 	'name' => "Dr Sugiyama",		'variant' => ''),
				array( 	'name' => "Dorsa",				'variant' => ''),
				array( 	'name' => "Droid Sans",			'variant' => ':r,b'),
				array( 	'name' => "Droid Serif",		'variant' => ':r,b,i,bi'),
				array( 	'name' => "Federo",				'variant' => ''),
				array( 	'name' => "Istok Web",			'variant' => ':r,b,bi'),
				array( 	'name' => "Josefin Slab",		'variant' => ':r,b,i,bi'),
				array( 	'name' => "Lemon",				'variant' => ':400'),
				array( 	'name' => "Lato",				'variant' => ':r,b,i,bi'),								
				array( 	'name' => "Miss Fajardose",		'variant' => ''),						
				array( 	'name' => "Merienda One",		'variant' => ''),
				array( 	'name' => "Metrophobic",		'variant' => ''),
				array( 	'name' => "Muli",				'variant' => ':400'),
				array( 	'name' => "Mako",				'variant' => ''),
				array( 	'name' => "Maven Pro",			'variant' => ':r,b'),
				array( 	'name' => "Nova Mono",			'variant' => ':400'),
				array( 	'name' => "Neuton",				'variant' => ':r,i,b'),
				array( 	'name' => "Numans",				'variant' => ''),
				array( 	'name' => "Open Sans",			'variant' => ':300,600,700'),								
				array( 	'name' => "PT Serif Caption",	'variant' => ':400'),
				array(  'name' => "Podkova", 			'variant' => ':400'),
				array(  'name' => "Petrona", 			'variant' => ''),
				array(  'name' => "PT Sans Narrow", 	'variant' => ':400'),
				array(  'name' => "Quattrocento Sans", 	'variant' => ''),
				array( 	'name' => "Spinnaker",			'variant' => ''),
				array( 	'name' => "Shanti",				'variant' => ''),
				array( 	'name' => "Terminal Dosis",		'variant' => ''),
				array( 	'name' => "Tienne",				'variant' => ':r,b'),
				array( 	'name' => "Tenor Sans",			'variant' => ''),
				array(  'name' => "Varela", 			'variant' => ''),
				array(  'name' => "Vollkorn", 			'variant' => ':r,b,bi'),
				array(  'name' => "Yellowtail", 		'variant' => ''),								
				array(  'name' => "Zeyada", 			'variant' => ''),
			);
			$fonts = '';
			// Go through the options
			if ( !empty($options) ) {
				foreach ( $options as $key => $option ) {
					$option_types = $option['type'];
					if($option_types == "typography"){ 
						foreach ($google_fonts as $font) {
							$gfont = get_option($option['id']);
							$googlefont=$gfont['face'];

							if ( $googlefont == $font['name']){
								$fonts .= $font['name'].$font['variant']."|";
							}
						}
					}
				}	
			}

			// Output google font css in header
			if ( $fonts ) {
				$fonts = str_replace( " ","+",$fonts);	
				$out = "\n<!-- Google Fonts -->\n";
				$out .= '<link href="http://fonts.googleapis.com/css?family=' . $fonts .'" rel="stylesheet" type="text/css" />'."\n\n";
				echo str_replace( '|"','"',$out);
			}
			return $google_fonts;
		}
	}

	/**
	 * C U F O N   F O N T 
	 *--------------------------------------------------------
	 * @param inputStr - Fetch Cufon file content
	 * @param delimeterLeft - delimeter prefix
	 * @param delimeterRight - delimeter suffix
	 * @param debug true/false
	 */
	function font_name($inputStr, $delimeterLeft, $delimeterRight, $debug = false) {
		$posLeft = strpos($inputStr, $delimeterLeft);
		if ($posLeft === false) {
			if ($debug) {
				echo "Warning: left delimiter '{$delimeterLeft}' not found";
			}
			return false;
		}

		$posLeft += strlen($delimeterLeft);
		$posRight = strpos($inputStr, $delimeterRight, $posLeft);
		if ($posRight === false) {
			if ($debug) {
				echo "Warning: right delimiter '{$delimeterRight}' not found";
			}
			return false;
		}
		return substr($inputStr, $posLeft, $posRight - $posLeft);
	}
?>