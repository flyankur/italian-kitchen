<?php // S H O R T C O D E
// blocks
function full_width( $atts, $content = null ) { return '<div class="sixteen columns">'.do_shortcode($content).'</div>';  }  
add_shortcode("full_width", "full_width");

function one_half( $atts, $content = null ) { return '<div class="eight columns">'.do_shortcode($content).'</div>';  }  
add_shortcode("one_half", "one_half");

function one_third( $atts, $content = null ) { return '<div class="one-third column">'.do_shortcode($content).'</div>';  }  
add_shortcode("one_third", "one_third");

function two_third( $atts, $content = null ) { return '<div class="two-third">'.do_shortcode($content).'</div>';  }  
add_shortcode("two_third", "two_third");

function one_four( $atts, $content = null ) { return '<div class="four columns">'.do_shortcode($content).'</div>';  }  
add_shortcode("one_four", "one_four");

function clear( $atts, $content = null ) { return '<div class="clear"></div>';  }  
add_shortcode("clear", "clear");

function divider( $atts, $content = null ) { return '<hr>';  }  
add_shortcode("divider", "divider");

function my_link( $atts, $content = null ) {
  extract( shortcode_atts( array (
    'href' => ''
  ), $atts ) );
  return '<a href="'.$href.'">'.do_shortcode($content).'</a>';
}
add_shortcode( 'my_link', 'my_link' );

// centered
function center( $atts, $content = null ) {
  extract( shortcode_atts( array (
    'href' => ''
  ), $atts ) );
  return '<div class="pic-center" style="text-align:center;">'.do_shortcode($content).'</div>';
}
add_shortcode( 'center', 'center' );

// youtube
function youtube( $atts, $content = null ) {
  extract( shortcode_atts( array (
    'width' => '',
	'height' => '',
	'url' => '',
  ), $atts ) );
  return '<iframe src="'.$url.'" frameborder="0" width="'.$width.'" height="'.$height.'" allowfullscreen></iframe>';
}
add_shortcode( 'youtube', 'youtube' );

// vimeo
function vimeo( $atts, $content = null ) {
  extract( shortcode_atts( array (
    'width' => '',
	'height' => '',
	'url' => '',
  ), $atts ) );
  return '<iframe src="'.$url.'" frameborder="0" width="'.$width.'" height="'.$height.'" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
}
add_shortcode( 'vimeo', 'vimeo' );

//blockquote
function blockquote_func( $atts, $content = null ) {
  extract( shortcode_atts( array (
    'align' => ''
  ), $atts ) );
  
   if($align=="right"){
	   $pos = "pos-right"; 
   }elseif($align=="left"){
	   $pos = "pos-left";
   }else{
   		$pos = "";
   }
   
  return '<blockquote class="'.$pos.'">'.do_shortcode($content).'</blockquote>';
}
add_shortcode( 'pullquote', 'blockquote_func' );
add_shortcode( 'blockquote', 'blockquote_func' );

// message
function msgbox( $atts, $content = null ) {
  extract( shortcode_atts( array (
    'type' => ''
  ), $atts ) );
  
   if($type=="success"){$class = "msg-success"; 
   }elseif($type=="warning"){$class = "msg-warning";
   }elseif($type=="error"){$class = "msg-error";
   }else{$class = "msg-info";}
   
  return '<div class="msgbox '.$class.'">'.do_shortcode($content).'</div>';
}
add_shortcode( 'msgbox', 'msgbox' );

// button
function button( $atts, $content = null ) {
  extract( shortcode_atts( array (
    'title' => '',
    'style' => '',
	'url' 	=> '',
	'size'	=> '',
	'target'=> '',
	'bgcolor'=> '',
	'textcolor'	=> '',
  ), $atts ) );
  
   if($style=="rounded"){$vstyle = "rounded"; 
   }else{$vstyle = "";}
   
   if($size=="big"){$vsize = "big";
   }elseif($size=="bigger"){$vsize = "bigger"; 
   }elseif($size=="biggest"){$vsize = "biggest"; 
   }else{$vsize = "";}
   
  return '<a href="'.$url.'" class="btn '.$vstyle.' '.$vsize.'" target="'.$target.'" style="background:'.$bgcolor.';color:'.$textcolor.'">'.$title.'</a>';
}
add_shortcode( 'button', 'button' );

// code
function code( $atts, $content = null ) { return '<code>'.$content.'</code>';  }  
add_shortcode("code", "code");

//color{
function color( $atts, $content = null ) {
	extract( shortcode_atts( array (
    'hex' => '',
  ), $atts ) );
  
    return '<span style="color:'.$hex.'">'.do_shortcode($content).'</span>';
}
add_shortcode( 'color', 'color' );


function menus( $atts, $content = null ) {
	extract( shortcode_atts( array (
    'name' => '',
  ), $atts ) );
		if(get_option('DE_count_gallery')!=""){
		$pic_count = get_option('DE_count_gallery');
		}else{
		$pic_count = 9999;	
		};
		$paged = get_query_var('paged') ? get_query_var('paged') : 1;
		$wp_query = new WP_Query(array( 'posts_per_page'=> $pic_count,	'post_type' => 'menu','paged' => $paged,'menu_category' => $name, 'order' => 'ASC'));
		echo '<div class="sixteen columns"><h3 class="menu_category">'.$name.'</h3></div><div class="menu-list">';
		global $post; while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
        	  <div class="menu-item eight columns gallery">
                <div class="pic_hover">
                	<a class="image" href="<?php $image_popup = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); echo $image_popup[0]; ?>" rel="prettyPhoto" title="<?php the_title();?>">
				  <span class="rollover"></span><?php echo get_the_post_thumbnail(get_the_ID(), array(70,70) ); ?></a>
                </div>
           		  <div class="menu-info">
                      <div class="price"><?php echo get_post_meta($post->ID, 'price', true); ?></div>
                      <a class="read_more_menu" href="<?php the_permalink(); ?>"><h4><?php the_title();?></h4></a>
                      <?php echo content(25); ?>
                  </div>
            	  <?php	edit_post_link(esc_html__('Edit this entry.', 'lezzatos'), '<p class="editLink">', '</p>'); ?>
                  <div class="clear"></div>
              </div>
			 
        <?php 		endwhile;	?>
        <div class="clear"></div>
        </div>
       	<?php if (function_exists("pagination")) {
    	pagination();
		} 
        wp_reset_query(); 
		
} 
add_shortcode( 'menus', 'menus' );
?>