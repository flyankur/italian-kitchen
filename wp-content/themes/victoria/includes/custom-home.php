<?php
	global $homepage_id;//get the homepage ID
	//get sidebaroption selection and decide on main division tag styling
	$sidebaroption = get_post_meta($homepage_id, "sidebar_options", TRUE);
	if(function_exists('icl_object_id')){
		$element_id= icl_object_id($homepage_id, 'page');
	}else{
		 $element_id=$homepage_id;
	}
	
?>
	<div id="main">
		<div class="entry-content">
		<?php 
		
			$page_data = get_page( $element_id );  
			$content = apply_filters('the_content', $page_data->post_content); 
			$title = $page_data->post_title; // Get title
			echo $content; // Output Content
		?>
		</div>
		<!-- .content -->
	</div>
	<!-- #main -->

	<?php 
	//get the homepage sidebar if layoiut is not FullWidth
	if($sidebaroption != "fullwidth"){ 
		get_sidebar('home');
	}
	?>
	<div class="clear"></div>