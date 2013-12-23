<?php 
	get_header(); 
	
	if(!empty($_GET['var']))
	{
		$recipe_style = $_GET['var'];
		
		if( $recipe_style == "1")
		{
			get_template_part( 'inc/recipe-single-template-1' );
		} 
		else 
		{
			get_template_part( 'inc/recipe-single-template-2' );
		}
	}
	else
	{
			if ( function_exists( 'ot_get_option' ) )
			{
				$recipeTemplate = ot_get_option( 'recipe_template_type' );
				if($recipeTemplate == 'Recipe Template Full Width')
				{
						get_template_part('inc/recipe-single-template-2');
				}						
				else
				{
						get_template_part('inc/recipe-single-template-1');
				}
			}
	}

	get_footer(); 