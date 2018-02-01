<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Infinity
 */
$tm_dione_layout      = Kirki::get_option( 'tm-dione', 'archive_layout' );
$tm_dione_list_boxed = 1;
$tm_dione_page_title = Kirki::get_option( 'tm-dione', 'archive_title' );
$tm_dione_heading_image = Kirki::get_option( 'tm-dione', 'page_bg_image' );
$page_breadcrumb = Kirki::get_option( 'tm-dione', 'breadcrumb_enable' );

$style = '';
if ( $tm_dione_heading_image ) {
	$style .= 'background-image: url("' . ( $tm_dione_heading_image ) . '");';
}
$id_style = uniqid('page-header-style-');

get_header();

tm_dione_apply_style($style, '#' . $id_style);


?>



<!--FROM BANNER SUBPAGES POST BACKGROUND-->
<?php $page = get_page( 1399 ); ?>
<?php $img_id =  get_post_meta($page->ID,'upload_banner_image',true); ?>
<?php $banner_img = wp_get_attachment_image_url($img_id, 'full'); ?>

<div style="background:url(<?php echo $banner_img; ?>)no-repeat;" class="banner-subpage">  

    <div class="container">
        <div class="col-md-12">
            
            <div class="col-md-12 text-center">
                <h1><?php //the_title(); ?> Market Place</h1>
                <div class="breadcrumb">
                    <?php echo tm_bread_crumb( array( 'home_label' => Kirki::get_option( 'tm-dione', 'breadcrumb_home_text' ) ) ); ?>
                </div>
            </div>
            
        </div>
    
    </div>
    
</div>




<div class="product-main-wrapper">

    <div class="container">
        <div class="col-md-3">
            
            <div class="product-sidebar market-sidebar">
                    <h2> Categories </h2>
                
                    <div class="sidebar-holder"> 
<!--                        widget connected-->
                        <?php //dynamic_sidebar( 'products-sidebar' );?>
                        
<!--                        shortcode -->
                        <?php  echo do_shortcode('[sc_marketplace_taxonomy_sidebar]');?>
                        
                        <div class="heightplus"></div>
                        <?php dynamic_sidebar( 'marketplace-sidebar' );?>
                        
                    </div>
                   
            </div>
        
        </div>
        
        
        <div class="col-md-9">
            
                    <?php  echo do_shortcode('[rev_slider alias="Market Place Slider"]');?>
                    
                    <div class="heightplus"></div>
                      
                    <?php  echo do_shortcode('[sc_market_taxonomy_category]');?>
    
        </div>

    </div>
    
</div>
                



<?php get_footer(); ?>
