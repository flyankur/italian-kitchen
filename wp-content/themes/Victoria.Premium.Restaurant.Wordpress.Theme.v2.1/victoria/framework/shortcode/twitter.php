<?php
	// T W I T T E R 
	//--------------------------------------------------------
	function sys_twitter ($atts, $content = null) {
		$username=get_option('sys_twitter_username');
		extract(shortcode_atts(array(
			'limit'		=> '',
			'username'	=>$username,
		), $atts));

		$out = '<div>';
		$out .= atp_generator('twitter_parse_cache_feed',$username,$limit,'');
		$out .= '</div>';
		return $out;
	}
	add_shortcode('twitter','sys_twitter');
?>