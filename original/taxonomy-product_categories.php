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

<!--FROM OUR PRODUCTS FEATURED BACKGROUND-->
<?php $page = get_page( 936 ); ?>
<?php $img_id =  get_post_meta($page->ID,'upload_banner_image',true); ?>
<?php $banner_img = wp_get_attachment_image_url($img_id, 'full'); ?>

<div style="background:url(<?php echo $banner_img; ?>)no-repeat;" class="banner-subpage">  

    <div class="container">
        <div class="col-md-12">
            
            <div class="col-md-6 text-left">
                <h1> Products </h1>
            </div>
            
            <div class="col-md-6 text-right">
                <div class="breadcrumb">
                    <?php echo tm_bread_crumb( array( 'home_label' => Kirki::get_option( 'tm-dione', 'breadcrumb_home_text' ) ) ); ?>
                </div>
            </div>
            
        </div>
    
    </div>
    
</div>



<div class="main-wrapper">

    <div class="container">
        <div class="col-md-3">
            
            <div class="product-sidebar">
                    <h2> Our Product </h2>
                
                    <div class="sidebar-holder"> 
                        <?php dynamic_sidebar( 'products-sidebar' );?>
                    </div>
                   
            </div>
        
        </div>
        
        
        <div class="col-md-9">
        
            	<?php if ( have_posts() ) : ?>
            
                    <div class="row">
                    
                    
                        <?php /* Start the Loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>

                            <?php
                            /* Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part( 'template-parts/content', 'productcategory' );
                            ?>

                        <?php endwhile; ?>
                        
                        
                        <?php else : ?>
                            <?php get_template_part( 'content', 'none' ); ?>
                        <?php endif; ?>
                        
        
                    </div>
    
        </div>

    </div>
    
</div>
                



<?php get_footer(); ?>
