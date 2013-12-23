<?php
/*
$path = __FILE__;
$pathwp = explode( 'wp-content', $path );
$wp_url = $pathwp[0];
// Loading the wp core functions and variables
require_once( $wp_url.'/wp-load.php' );
*/

Header("Content-type: text/css");
$atp_option_var = array(
'atp_themecolor','atp_stickybarcolor','atp_bodyp','atp_h1','atp_h2','atp_h3','atp_h4','atp_h5','atp_h4','atp_h6','atp_sidebartitle','atp_footertitle','atp_copyrights','atp_entrytitle','atp_entrytitlelinkhover','atp_bodyproperties',
'atp_logo','atp_logotitle','atp_tagline','atp_breadcrumblink','atp_breadcrumblinkhover',
'atp_footerlink','atp_footerlinkhover','atp_footerbgcolor','atp_copybgcolor','atp_footertextcolor','atp_copyrightlink',
'atp_subheaderproperties','atp_mainmenu','atp_mainmenudropdown','atp_mainmenu_bg',
'atp_mainmenu_linkhover','atp_mainmenu_sub_bg','atp_mainmenu_sub_link','atp_mainmenu_sub_linkhover','atp_mainmenu_sub_hoverbg',
'atp_mainmenu_bordercolor','atp_entrytitle','atp_overlayimages','atp_subheadertext',
'atp_wrapbg','atp_link','atp_linkhover','atp_subheaderlink','atp_subheaderlinkhover','atp_subheader_pt',
'atp_subheader_pb','atp_logo_mt','atp_logo_mb','atp_extracss','atp_fpwidget_title','atp_homepageteaser','atp_teaser_bg','atp_headings','atp_secmenubg'
);

foreach($atp_option_var as $value){
	$$value = get_option($value);
}

//------------------------------------------------------------------------------------------------------
// B O D Y  B G  P R O P E R T I E S
//------------------------------------------------------------------------------------------------------

$bodyimage =  generate_imagecss($atp_bodyproperties,array('background-color'=>'color'));
if($atp_overlayimages) 
	$overlayimages =  generate_css(array('background-image'=>'url('.THEME_URI.'/images/patterns/'.$atp_overlayimages.')'));
else
	$overlayimages = '';
$themecolor		= $atp_themecolor	? $atp_themecolor : '';
$bodyp = generate_fontcss($atp_bodyp);

//------------------------------------------------------------------------------------------------------
// S L I D E R   B A C K G R O U N D   P R O P E R T I E S
//------------------------------------------------------------------------------------------------------
$subheaderbg =  generate_imagecss($atp_subheaderproperties,array('background-color'=>'color'));
$subheader_pt = $atp_subheader_pt ? 'padding-top:'.(int)$atp_subheader_pt.'px;': '';
$subheader_pb = $atp_subheader_pb ? 'padding-bottom:'.(int)$atp_subheader_pb.'px;': '';
$footerbgcolor = $atp_footerbgcolor ? 'background-color:'.$atp_footerbgcolor.';': '';
$footertextcolor = $atp_footertextcolor ? 'color:'.$atp_footertextcolor.';': '';
$copybgcolor = $atp_copybgcolor ? 'background-color:'.$atp_copybgcolor.';': '';
$subheadertext = $atp_subheadertext ? 'color:'.$atp_subheadertext.';': '';
//------------------------------------------------------------------------------------------------------
// L O G O   T A G L I N E 
//------------------------------------------------------------------------------------------------------
$logotitle = generate_fontcss($atp_logotitle);
$tagline = generate_fontcss($atp_tagline);
$logo_mt = $atp_logo_mt ? 'padding-top:'.(int)$atp_logo_mt.'px;': '';
$logo_mb = $atp_logo_mb ? 'padding-bottom:'.(int)$atp_logo_mb.'px;': '';

//------------------------------------------------------------------------------------------------------
// S T I C K Y
//------------------------------------------------------------------------------------------------------
$stickybgcolor	= $atp_stickybarcolor? 'background:'.$atp_stickybarcolor.';': '';;
$copyright = generate_fontcss($atp_copyrights);

//------------------------------------------------------------------------------------------------------
// Secondary Menu 
//------------------------------------------------------------------------------------------------------
$mainmenubg	= $atp_mainmenu_bg? 'background-color:'.$atp_mainmenu_bg.';': '';
$mainmenufont = generate_fontcss($atp_mainmenu);
$mainmenudropdown = generate_fontcss($atp_mainmenudropdown);
$mainmenu_linkhover	= $atp_mainmenu_linkhover? 'color:'.$atp_mainmenu_linkhover.';': '';
$mainmenu_sub_bg	= $atp_mainmenu_sub_bg? 'background:'.$atp_mainmenu_sub_bg.';': '';
$mainmenu_sub_link	= $atp_mainmenu_sub_link? 'color:'.$atp_mainmenu_sub_link.';': '';
$mainmenu_sub_linkhover	= $atp_mainmenu_sub_linkhover? 'color:'.$atp_mainmenu_sub_linkhover.';': '';
$mainmenu_sub_hoverbg	= $atp_mainmenu_sub_hoverbg? 'background:'.$atp_mainmenu_sub_hoverbg.';': '';
$mainmenu_bordercolor	= $atp_mainmenu_bordercolor? 'border-color:'.$atp_mainmenu_bordercolor.';': '';

//------------------------------------------------------------------------------------------------------
// HEADINGS
//------------------------------------------------------------------------------------------------------
$h1font = generate_fontcss($atp_h1);
$h2font = generate_fontcss($atp_h2);
$h3font = generate_fontcss($atp_h3);
$h4font = generate_fontcss($atp_h4);
$h5font = generate_fontcss($atp_h5);
$h6font = generate_fontcss($atp_h6);

//------------------------------------------------------------------------------------------------------
// ENTRY TITLE
//------------------------------------------------------------------------------------------------------
$entrytitlefont = generate_fontcss($atp_entrytitle);
$entrytitlelinkhover= $atp_entrytitlelinkhover? 'color:'.$atp_entrytitlelinkhover.';': '';
$homepageteaser = generate_fontcss($atp_homepageteaser);
//------------------------------------------------------------------------------------------------------
// WIDGET TITLE
//------------------------------------------------------------------------------------------------------
$sidebartitlefont = generate_fontcss($atp_sidebartitle);
$footertitlefont = generate_fontcss($atp_footertitle);
$fpwidgettitle = generate_fontcss($atp_fpwidget_title);

$wrapbg	= $atp_wrapbg ? 'background-color:'.$atp_wrapbg.';': '';
$secmenubg	= $atp_secmenubg ? 'background-color:'.$atp_secmenubg.';': '';
$linkcolor	= $atp_link ? 'color:'.$atp_link.';': '';
$linkhovercolor	= $atp_linkhover ? 'color:'.$atp_linkhover.';': '';
$subheaderlink	= $atp_subheaderlink ? 'color:'.$atp_subheaderlink.';': '';
$subheaderlinkhover	= $atp_subheaderlinkhover ? 'color:'.$atp_subheaderlinkhover.';': '';
$breadcrumblink	= $atp_breadcrumblink ? 'color:'.$atp_breadcrumblink.';': '';
$breadcrumblinkhover = $atp_breadcrumblinkhover ? 'color:'.$atp_breadcrumblinkhover.';': '';
$teaser_bg = $atp_teaser_bg ? 'background-color:'.$atp_teaser_bg.';': '';

$footerlink = $atp_footerlink ? 'color:'.$atp_footerlink.';': '';
$footerlinkhover = $atp_footerlinkhover ? 'color:'.$atp_footerlinkhover.';': '';
$copyrightlink = $atp_copyrightlink ? 'color:'.$atp_copyrightlink.';': '';
$headings = $atp_headings ? 'color:'.$atp_headings.';': '';
// THEME COLOR 
$out='';
if($themecolor != '' ) {
$out.=<<<CSS
/*---- T H E M E   C O L O R ----*/
.topbar, 
.copyright, 
.button span,
.widget-title span,
table.fancy_table th {
	background-color:{$themecolor}
}

a,
a:focus,
a:visited,
.sf-menu li:hover, .sf-menu li.sfHover,
.sf-menu a:focus, .sf-menu a:hover, 
.sf-menu a:active,
.sf-menu li li:hover, .sf-menu li li.sfHover,
.sf-menu li li a:focus, .sf-menu li li a:hover, 
.sf-menu li li a:active,
.sf-menu li.current-cat > a, 
.sf-menu li.current_page_item > a {
	color:{$themecolor}
}

.topbar, #subheader, #footer {
	border-color:{$themecolor}
}
CSS;
}
if($atp_logo === 'title' && $logotitle != '' || $logo_mt !='' || $logo_mb !='') {
$out .= <<<CSS
/*---- T E X T   L O G O  ----*/
h1#site-title a     { {$logotitle} }
h2#site-description { {$tagline} }
.logo               { {$logo_mt} {$logo_mb} }
CSS;
}
if($bodyimage != '' || $overlayimages != '' || $bodyp != '') {
$out .= <<<CSS

/*---- B O D Y ----*/
body {
	{$bodyimage}
	{$bodyp}
}

.bodyoverlay {
	{$overlayimages}
}
CSS;
}
if($secmenubg != '') {
$out .= <<<CSS

/*----  ----*/
.topbar { 
	{$secmenubg}
}
CSS;
}
if($headings != '') {
$out .= <<<CSS

/*---- Headings----*/
h1, h2, h3, h4, h5, h6 { 
	{$headings}
}
CSS;
}
if($subheaderbg || $subheader_pt || $subheadertext || $subheader_pb !='' ) {
$out .= <<<CSS

/*---- S U B H E A D E R ----*/
#subheader {
	{$subheadertext}
	{$subheaderbg}
	{$subheader_pt}
	{$subheader_pb}
}
CSS;
}

if($stickybgcolor != '') {
$out .= <<<CSS

/*----  S T I C K Y  ----*/
#sticky { 
	{$stickybgcolor}
}
CSS;
}
if($mainmenubg != '') {
$out .= <<<CSS
#menuwrap {
	{$mainmenubg}
}
CSS;
}
if($mainmenufont != '') {
$out .= <<<CSS

/*---- Primary Menu  ----*/
.sf-menu a {
	{$mainmenufont}
}
CSS;
}
if($mainmenudropdown != '') {
$out .= <<<CSS

.sf-menu li li a {
	{$mainmenudropdown}
}
CSS;
}
if($mainmenu_linkhover != '') {
$out .= <<<CSS

/* Link Hover Color   */
.sf-menu li:hover, 
.sf-menu li.sfHover,
.sf-menu a:focus, 
.sf-menu a:hover, 
.sf-menu a:active {
	{$mainmenu_linkhover}
}
CSS;
}
if($mainmenu_sub_bg != '') {
$out .= <<<CSS

/* Dropdown Bg Color   */
.sf-menu li:hover, .sf-menu li.sfHover,
.sf-menu a:focus, .sf-menu a:hover, .sf-menu a:active,
.sf-menu  .current_page_ancestor,
.sf-menu ul.sub-menu,
.sf-menu ul.sub-menu li.current_page_item a {
	{$mainmenu_sub_bg}
}
CSS;
}
if($mainmenu_sub_link != '') {
$out .= <<<CSS

/* Dropdown Link Color   */
.sf-menu ul a {
	{$mainmenu_sub_link}
}
CSS;
}
if($mainmenu_sub_linkhover != '') {
$out .= <<<CSS

/* Dropdown Link Hover Color   */
.sf-menu li li:hover, .sf-menu li li.sfHover,
.sf-menu li li a:focus, .sf-menu li li a:hover, 
.sf-menu li li a:active {
	{$mainmenu_sub_linkhover}
}
CSS;
}
if($mainmenu_sub_hoverbg != '') {
$out .= <<<CSS

/* Dropdown Hover BG Color   */
.sf-menu li li:hover, .sf-menu li li.sfHover,
.sf-menu li li a:focus, .sf-menu li li a:hover, 
.sf-menu li li a:active {
	{$mainmenu_sub_hoverbg}
}
CSS;
}
if($mainmenu_bordercolor != '') {
$out .= <<<CSS

/* Dropdown Border Color   */
.sf-menu li li a {
	{$mainmenu_bordercolor}
}
CSS;
}
if($h1font != '') {
$out .= <<<CSS

/* --- H1 --- */
h1 {
	{$h1font}
}
CSS;
}
if($h2font != '') {
$out .= <<<CSS

/* --- H2 --- */
h2 {
	{$h2font}
}
CSS;
}
if($h3font != '') {
$out .= <<<CSS

/* --- H3 --- */
h3 {
	{$h3font}
}
CSS;
}
if($h4font != '') {
$out .= <<<CSS

/* --- H4 --- */
h4 {
	{$h4font}
}
CSS;
}
if($h5font != '') {
$out .= <<<CSS

/* --- H5 --- */
h5 {
	{$h5font}
}
CSS;
}
if($h6font != '') {
$out .= <<<CSS

/* --- H6 --- */
h6 {
	{$h6font}
}
CSS;
}
if($entrytitlefont != '') {
$out .= <<<CSS

/* --- Post Entry Title --- */
h2.entry-title a { 
	{$entrytitlefont}
}
CSS;
}
if($entrytitlelinkhover != '') {
$out .= <<<CSS

h2.entry-title a:hover { 
	{$entrytitlelinkhover}
}
CSS;
}
if($homepageteaser != '') {
$out .= <<<CSS
.teaserbox .teaserbox_content { 
	{$homepageteaser}
}
CSS;
}
if($teaser_bg != '') {
$out .= <<<CSS
.teaserbox { 
	{$teaser_bg}
}
CSS;
}

if($sidebartitlefont != '' || $fpwidgettitle !='') {
$out .= <<<CSS

/* --- Widget Title --- */
.widget-title { 
	{$sidebartitlefont}
}
.fp-widget h4 {
	{$fpwidgettitle}
}
CSS;
}
if($footertitlefont != '') {
$out .= <<<CSS

#footer .widget-title { 
	{$footertitlefont}
}
CSS;
}
if($wrapbg != '') {
$out .= <<<CSS

/*---- P A G E M I D ----*/
.pagemid { 
	{$wrapbg}
}
CSS;
}
if($linkcolor != '') {
$out .= <<<CSS

/*---- L I N K   C O L O R S ----*/
a,
.entry-title a { 
	{$linkcolor}
}
CSS;
}
if($linkhovercolor != '') {
$out .= <<<CSS

/*---- L I N K   H O V E R  C O L O R S ----*/
a:hover,
.entry-title a:hover { 
	{$linkhovercolor}
}
CSS;
}
if($subheaderlink || $subheaderlinkhover !='' ) {
$out .= <<<CSS

#subheader a { 
	{$subheaderlink}
}
#subheader a:hover { 
	{$subheaderlinkhover}
}
CSS;
}
if($breadcrumblink || $breadcrumblinkhover !='' ) {
$out .= <<<CSS
#breadcrumbs a { 
	{$breadcrumblink}
}
#breadcrumbs a:hover { 
	{$breadcrumblinkhover}
}
CSS;
}
if($footerbgcolor || $footertextcolor !='' ) {
$out .= <<<CSS

#footer { 
	{$footerbgcolor}
	{$footertextcolor}
}
CSS;
}
if($footerlink || $footerlinkhover !='' ) {
$out .= <<<CSS

#footer a { 
	{$footerlink}
}
#footer a:hover { 
	{$footerlinkhover}
}
CSS;
}

if($copybgcolor || $copyright !='' ) {
$out .= <<<CSS

.copyright { 
	{$copybgcolor}
	{$copyright}
}
CSS;
}
if($copyrightlink !='' ) {
$out .= <<<CSS

.copyright a { 
	{$copyrightlink}
}
CSS;
}
if($atp_extracss !='' ) {
$out .= <<<CSS
/*----------- Custom CSS -------------------*/
{$atp_extracss}
CSS;
}
	return $out;


//for font css attributes
function generate_fontcss($arr_var) {
	$font			= $arr_var['face'] 			? 'font-family: '.$arr_var['face'].'; ': '';
	$size			= $arr_var['size'] 			? 'font-size: '.$arr_var['size'].'; ': '';
	$color			= $arr_var['color'] 		? 'color: '.$arr_var['color'].'; ': '';
	$lineheight		= $arr_var['lineheight']	? 'line-height: '.$arr_var['lineheight'].'; ': '';
	$style			= $arr_var['style'] 		? 'font-style: '.$arr_var['style'].'; ': '';
	$variant		= $arr_var['fontvariant'] 	? 'font-weight: '.$arr_var['fontvariant'].'; ': '';
	
	return "{$font}{$size}{$color}{$lineheight}{$style}{$variant}";
}

//for background image css attributes
function generate_imagecss($arr,$include_others) {

	$str='';
	if($arr['image']!='') {
		$str .='background-image:url('.$arr['image'].');
        background-repeat:'.$arr['style'].';
        background-position:'.$arr['position'].';
        background-attachment:'.$arr['attachment'].';';
	}
	
	if(is_array($include_others)) {
		foreach($include_others as $key => $val) {
			if($arr[$val]!='')
				$str .=$key.':'.$arr[$val].';';
		}
	}
	return trim($str);
}

//forkey value css pairs
function  generate_css($arr) {
	$str='';
	if(is_array($arr)) {
		foreach($arr as $key => $val) {
			$str .=$key.':'.$val.';';
		}
	}
	return $str;
}
?>