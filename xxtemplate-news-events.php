<?php
/*********************************************
LABEL FOR TEMPLATE
*********************************************/
/**
 * Template Name: Full News & Events Page


*/

$tm_dione_page_layout_private = get_post_meta( get_the_ID(), "infinity_page_layout_private", true );
$tm_dione_header_top          = get_post_meta( get_the_ID(), "infinity_header_top", true );
$tm_dione_sticky_menu         = get_post_meta( get_the_ID(), "infinity_sticky_menu", true );
$tm_dione_custom_logo         = get_post_meta( get_the_ID(), "infinity_custom_logo", true );
$tm_dione_heading_image       = get_post_meta( get_the_ID(), "infinity_heading_image", true );

$pages_custom_title     = get_post_meta( get_the_ID(), "infinity_custom_title", true );
$pages_custom_desc      = get_post_meta( get_the_ID(), "infinity_custom_desc", true );
$tm_dione_custom_height = get_post_meta( get_the_ID(), "infinity_custom_height", true );
$title_margin_bottom    = get_post_meta( get_the_ID(), "infinity_title_margin_bottom", true );

$tm_dione_bread_crumb_enable = get_post_meta( get_the_ID(), "infinity_bread_crumb_enable", true );
$tm_dione_disable_comment    = get_post_meta( get_the_ID(), "infinity_disable_comment", true );
$tm_dione_page_title         = get_post_meta( get_the_ID(), "infinity_page_title", true );
$tm_polygon_menu_overlay     = get_post_meta( get_the_ID(), "infinity_menu_overlay", true );
$tm_polygon_onepage_scroll     = get_post_meta( get_the_ID(), "infinity_onepage_scroll", true );
$tm_dione_custom_class       = get_post_meta( get_the_ID(), "infinity_custom_class", true );

global  $main_menu_id,
		$dark_light_logo,
		$header_class,
		$footer_dark_light,
		$hide_main_nav;

$main_menu_id = get_post_meta( get_the_ID(), "infinity_page_main_menu", true );
$sticky_header_enable = get_post_meta( get_the_ID(), "infinity_sticky_header_enable", true );
$header_dark_light = get_post_meta( get_the_ID(), "infinity_header_dark_light", true );
$footer_dark_light = get_post_meta( get_the_ID(), "infinity_footer_dark_light", true );

if('on' == get_post_meta( get_the_ID(), "infinity_hide_main_nav", true )) {
	$hide_main_nav = 1;
}

if(empty($header_dark_light)) {
	$header_dark_light = Kirki::get_option( 'tm-dione', 'header_dark_light' );
}
if(empty($sticky_header_enable)) {
	$sticky_header_enable = Kirki::get_option( 'tm-dione', 'sticky_header_enable' );
}
if($sticky_header_enable == 'on' || $sticky_header_enable == 1) {
	$header_class = ' sticky-header';
}

switch ($header_dark_light) {
	case 'dark':
		$dark_light_logo = 'light';
		break;
	case 'light':
		$dark_light_logo = 'dark';
		break;
}

$page_breadcrumb = get_post_meta( get_the_ID(), "infinity_breadcrumb", true );
if ( $page_breadcrumb == 'default' ) {
	$page_breadcrumb = Kirki::get_option( 'tm-dione', 'breadcrumb_enable' );
}

if ( $tm_dione_page_layout_private != 'default' && class_exists( 'cmb2_bootstrap_205' ) ) {
	$tm_dione_layout = get_post_meta( get_the_ID(), "infinity_page_layout_private", true );
} else {
	$tm_dione_layout = Kirki::get_option( 'tm-dione', 'page_layout' );
}
if ( $tm_dione_heading_image ) {
	$tm_dione_heading_image = get_post_meta( get_the_ID(), "infinity_heading_image", true );
} else {
	$tm_dione_heading_image = Kirki::get_option( 'tm-dione', 'page_bg_image' );
}

if($tm_dione_page_title == '') {
	$tm_dione_page_title = Kirki::get_option( 'tm-dione', 'page_title' );
}

$tm_dione_heading_image = do_shortcode( $tm_dione_heading_image );
$tm_dione_heading_image = str_replace( 'http://http://', 'http://', $tm_dione_heading_image );
$tm_dione_heading_image = str_replace( 'https://https://', 'https://', $tm_dione_heading_image );

$style = '';
if ( $tm_dione_heading_image ) {
	$style .= 'background-image: url("' . ( $tm_dione_heading_image ) . '");';
}
if ( $tm_dione_custom_height ) {
	$style .= 'height:' . $tm_dione_custom_height . ';';
}
if ( $title_margin_bottom ) {
	$style .= 'margin-bottom:' . $title_margin_bottom . ';';
}
$id_style = uniqid('page-header-style-');
tm_dione_apply_style($style, '#' . $id_style);

get_header(); ?>


<?php $img_id =  get_post_meta($post->ID,'banner_pictures',true); ?>
<?php $banner_img = wp_get_attachment_image_url($img_id, 'full'); ?>
<div style="background:url(<?php echo $banner_img; ?>)no-repeat;" class="banner-subpage">  

    <div class="container">
        <div class="col-md-12">
            <h1><?php the_title(); ?></h1>
        </div>
    
    </div>
    
</div>


<?php if(have_posts()) : ?>
<?php while(have_posts()) : the_post(); ?>

<div class="container custom-wrapper">
	<div class="row">
        
            <div class="col-md-8">
                <?php the_content(); ?>
            </div>
	
        
			<div class="col-md-4 right-sidebar">
                
                    <div class="sidebar-single">
                        <?php dynamic_sidebar( 'sidebar-news' );?>
                    </div>
                
			</div>
        
        
							
	</div>
</div>


<?php endwhile; ?>
<?php else : ?>
<?php endif; ?>




<?php get_footer(); ?>






