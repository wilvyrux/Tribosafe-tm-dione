<?php
/**
 * The template for displaying all single posts.
 *
 * @package Infinity
 */
get_header();

$portfolio_header_section = Kirki::get_option( 'tm-dione', 'portfolio_header_section_enable' );
$tm_dione_heading_image = get_post_meta( get_the_ID(), "portfolio_heading_image", true );
$portfolio_single_layout = get_post_meta( get_the_ID(), "portfolio_single_layout", true );

$tm_dione_heading_image = do_shortcode( $tm_dione_heading_image );
$tm_dione_heading_image = str_replace( 'http://http://', 'http://', $tm_dione_heading_image );
$tm_dione_heading_image = str_replace( 'https://https://', 'https://', $tm_dione_heading_image );

if(empty($portfolio_single_layout)) {
	$portfolio_single_layout = Kirki::get_option( 'tm-dione', 'portfolio_single_layout' );
}

$style = '';
if ( $tm_dione_heading_image ) {
	$style .= 'background-image: url(\'' . ( $tm_dione_heading_image ) . '\');';
}
$id_style = uniqid('page-header-style-');
tm_dione_apply_style($style, '#' . $id_style);
?>



<!--FROM SERVICES FEATURED BACKGROUND-->
<?php $page = get_page( 1537 ); ?>

<?php $page_title = $page->post_title; ?>
<?php $img_id =  get_post_meta($page->ID,'upload_banner_image',true); ?>
<?php $banner_img = wp_get_attachment_image_url($img_id, 'full'); ?>

<div style="background:url(<?php echo $banner_img; ?>)no-repeat;" class="banner-subpage">  

    <div class="container">
        <div class="col-md-12">
            
            <div class="col-md-12 text-left">
                <h1><?php echo $page_title; ?></h1>
                <div class="breadcrumb">
                    <?php echo tm_bread_crumb( array( 'home_label' => Kirki::get_option( 'tm-dione', 'breadcrumb_home_text' ) ) ); ?>
                </div>
            </div>
            
        </div>
    
    </div>
    
</div>




<div class="application-page-main-wrapper">
        
        
    <?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post(); ?>


            <div class="container">
                
                        <div class="featured_img col-md-4 col-sm-12">
                          <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'full') ); ?>
                          <img src="<?php echo $url; ?>">
                        </div>

                        <div class="content-summary col-md-8 col-sm-12">
                            <h2 class="heading"> <?php the_title(); ?></h2>
                            <div class="short-description-content"> <?php echo do_shortcode( get_the_content() ); ?> </div>
                            
                            <div class="col-md-12 padding-reset">
                                <a href="#" id="inquiry_btn" class="primary-button enquire-btn"> ENQUIRE </a>
                            </div>
                            
                        </div>
                  
                    
            
                
              
        <?php endwhile; ?>
        <?php else : ?>
        <?php endif; ?>
                
                
                        <div class="related_main_wrapper clearfix">
                            <div class="container">
                                    <div class="col-md-12 padding-reset">
                                         <?php  echo do_shortcode('[related-application]');?>
                                    </div>
                            </div>
                        </div>
                
                
            </div>
        
        
</div>


      
                







<?php get_footer(); ?>