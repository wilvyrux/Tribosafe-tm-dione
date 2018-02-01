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
<?php $page = get_page( 1550 ); ?>

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





	<div class="media-page-main-wrapper">
        
        
<?php if(have_posts()) : ?>
<?php while(have_posts()) : the_post(); ?>
        
            

            <div class=" container single-content">
                
                
                <div class="content-summary col-md-9 col-md-push-3">
                    
                    <div class="featured-img">
                          <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'full') ); ?>
                          <img src="<?php echo $url; ?>">
                    </div>
                  
                    <h2 class="heading"> <?php the_title(); ?></h2>
                    <?php echo do_shortcode( get_the_content() ); ?>
                    
                </div>
                
                
                
                <div class="col-md-3 col-md-pull-9">
            
                    <div class="product-sidebar">

                            <div class="sidebar-holder"> 
                                <?php dynamic_sidebar( 'our_media' );?>
                            </div>

                    </div>

                </div>
                
                
              
            </div>
        

        </div>
        
        
        
        <?php endwhile; ?>
        <?php else : ?>
        <?php endif; ?>
        
        
                






<section class="getquote-product">
            <div class="invisible_btn"></div>

            <div class="container quote-wrapper">
                
                <div class="header-wrapper">
                    <div class="col-xs-11">   
                        <h3> <?php the_title(); ?> </h3>  
                    </div>
                    <div class="col-xs-1">   
                        <a href="#" class="close2"></a> 
                    </div>
                </div>
                
<!--                GET THE PAGE ID TITLE-->
                <?php $page = get_page( 910 ); ?>

                <div class="col-md-12 body-content">
                    <?php echo do_shortcode( $page->post_content ); ?>

                </div>
            </div>

</section>





<script>

        jQuery(".getquote-product").hide();
        jQuery("#inquiry_btn").click(function(){
                jQuery(".getquote-product").fadeIn(800);
        });
     
        jQuery(".close2").click(function(){
                jQuery(".getquote-product").fadeOut(800);
        }); 
     
        jQuery(".invisible_btn").click(function(){
                jQuery(".getquote-product").fadeOut(800);
        });
     
     
//        RELATED ARROW FAVICON
        jQuery('.getquote-product a.close2').append('<i class="fa fa-times" aria-hidden="true"></i>'); 
            
</script>








<?php get_footer(); ?>