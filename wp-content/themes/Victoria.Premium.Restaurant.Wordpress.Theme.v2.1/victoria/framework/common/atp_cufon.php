<?php
	// C U F O N   E N Q U E U E
	//--------------------------------------------------------
	function sys_cufon_function() {

		
		$cufon_font_location = THEME_JS . '/cufon';
		$cufonenable = get_option('atp_cufonenable');
		if($cufonenable == "on") {
			wp_enqueue_script('cufon-yui', THEME_JS. '/cufon-yui.js' );
			wp_print_scripts('cufon-yui');

			foreach (glob( THEME_DIR . "/js/cufon/*") as $path_to_files) {

				$file_name = basename($path_to_files);

				if (get_option('atp_cufon')) {
					$file_contents	= file_get_contents($path_to_files,true);
					$delimeterLeft	= 'font-family":"';
					$delimeterRight	= '"';
					$font_names		= font_name($file_contents, $delimeterLeft,$delimeterRight, $debug = false);
						
					if( get_option('atp_cufon')==$font_names) {
						wp_enqueue_script($font_names,  THEME_JS. '/cufon/'.$file_name);
						wp_print_scripts($font_names);
						if(get_option('atp_wpcuf_code') =="") {
							echo '<script>';
							echo '/* <![CDATA[ */';
							$cufon_scripts="Cufon.replace('h1, h2, h3, h4, h5', { hover:true, hoverables: { strong: true, em: true }, fontFamily: '$font_names' });\n";
							echo 	$cufon_scripts;
							echo '/* ]]> */';
							echo '</script>';
						}
					}	
				}
			}
		}
	}
	add_action('wp_head', 'sys_cufon_function');
?>