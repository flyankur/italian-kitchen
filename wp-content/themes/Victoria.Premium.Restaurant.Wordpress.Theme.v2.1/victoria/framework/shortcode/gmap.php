<?php

	/*** Google Map shortcode
	###############################################*/
	
	function sysgooglemap( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'width'     => false,
			'height'    => '500',
			'address'   => '',
			'controls'  => '[]',
			'longitude' => '',
			'latitude'	=> '',
			'html'      => '',
			'popup'     => 'false',
			'zoom'      => 1,
			'align'     => false,
		), $atts));

	
		
		// Width set as integer
		if( $width && is_numeric($width) ){
			$width = 'width:'.$width.'px;';
		}else{
			$width = '';
		}

		// Height set as integer
		if( $height && is_numeric($height) ){
			$height = 'height:'.$height.'px';
		}else{
			$height = '';
		}
		
		$align = $align ?' align'.$align:'';
		$id = rand(1,1000);
		add_action('wp_footer', 'gmap_script');
		$out = '<script type="text/javascript">
			/* <![CDATA[ */
			jQuery(document).ready(function() {
				jQuery("#g_map'.$id.'").gMap({
					icon: {
					    image: "'.THEME_URI.'/images/gmap_marker.png",
				        iconsize: [20, 32],
				        iconanchor: [0, 32],
				        infowindowanchor: [20, 0],
					    },
					zoom:'.$zoom.',
					markers:[';
					if($latitude && $longitude)
					{
						$out .= '{
						latitude:'.$latitude.',
						longitude:'.$longitude.',
						html:"_latlng"}, ';
					}

					$array_address = @explode("|", $address);
					$array_html = @explode("|", $html);
					$counts=count($array_address);
					$j=1;
					
					for($i=0; $i<$counts; $i++) {
						$html_address=$array_html[$i] ? $array_html[$i]: '_address';
						$out .= '{
						address:"'.$array_address[$i].'",
						html:"'.html_entity_decode($html_address).'" } ';
						if( $counts != $j ){
							$out .= ',';
						}
						$j++;
					}
					$out .= '],
					controls: false,
				});
			});	
			/* ]]> */
			</script>';
		$out .= '<div class="atpmap" id="g_map'.$id.'"  style="'.$width.$height.'"></div>';
		return $out;
	}
	
	add_shortcode('gmap', 'sysgooglemap');

	function gmap_script() {
		wp_print_scripts('jquery-gmap');
		wp_print_scripts('jquery-gmapmin');
	}


?>