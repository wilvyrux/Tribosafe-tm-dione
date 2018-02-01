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
<?php $page = get_page( 1545 ); ?>

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




	<div class="product-main-wrapper">
        
        
        <?php if(have_posts()) : ?>
        <?php while(have_posts()) : the_post(); ?>
        

        
                         <?php
//                                Product FEATURE IMAGE
                                $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'full') );
        
        
                                //TO CALL THE CATEGORIES
//                                $current_cat = get_queried_object();
        
                                $args = array('orderby' => 'term_id', 'order' => 'ASC' );
                                $terms = get_the_terms( get_the_ID(), 'product_categories', $args );
                         
                                if ( $terms && ! is_wp_error( $terms ) ) {
                                $current_cat = $terms[0];
                                }
        
                            
//                              category image
                                $img_cat = '<img src="'. do_shortcode('[wp_custom_image_category onlysrc="true" size="full" term_id="'.$current_cat ->term_id.'" alt="alt :)"]') .'">';
//                              category description
                                $current_cat_name_desc = $current_cat->description;
                                $current_cat_name = $terms ->name;
//                              summary category
                                $taxonomy_description = get_field('summary_description','product_categories_'.$current_cat->term_id);
        
//                              post page
                                $product_description = get_post_meta(get_the_ID(),'product_description',true); 
        
                                $brochure_download = get_field('download_brochure',get_the_ID());
                                $brochure_download_link =  $brochure_download['url'];

                        ?>
        
        
        
                <div class="container">
        

                        <div class="col-md-9 col-md-push-3">

                            <div class="featured_img col-md-7 padding-reset">
<!--                                  <img src="<?php// echo $url; ?>">-->
                                
                                  <div class="gallery-images">
                                      
                                            <div class="slider-for col-md-9">
                                                   <?php next_post_link( $format, $link, $in_same_term = false, $excluded_terms = '', $taxonomy = 'category' ); ?>

                                                         <?php

                                                            $images = get_post_meta( get_the_ID(), 'rty_gallery_id', true );

                                                            if( $images ) {

                                                                foreach( $images as $img ) {

                                                                    $image = wp_get_attachment_image_src( $img, 'full' );

                                                                    echo '<div class="">
                                                                            <img src="'.$image[0].'">
                                                                          </div>';

                                                                }

                                                            }

                                                        ?>

                                            </div>

                                            <div class="slider-nav col-md-3">
                                                   <?php next_post_link( $format, $link, $in_same_term = false, $excluded_terms = '', $taxonomy = 'category' ); ?>

                                                         <?php

                                                            $images = get_post_meta( get_the_ID(), 'rty_gallery_id', true );

                                                            if( $images ) {

                                                                foreach( $images as $img ) {

                                                                    $image = wp_get_attachment_image_src( $img, 'full' );

                                                                    echo '<div class="">
                                                                            <img src="'.$image[0].'">
                                                                          </div>';

                                                                }

                                                            }

                                                        ?>

                                            </div>
                                      
                                  </div>
                                
                                

                            </div>

                            <div class="content-summary col-md-5 padding-right-reset">
                                        <h2 class="heading"> <?php the_title(); ?></h2> 
                                         <?php the_content(); ?>

                                        <div class="buttons-holder">
                                            <div class="col-md-6 padding-left-reset">
                                                <a href="#" class="primary-button enquire-btn" data-name="<?php the_title(); ?>"> GET ENQUIRY</a>
                                            </div>
                                            <div class="col-md-6 padding-reset">
                                                <a href="<?php echo  $brochure_download_link; ?>" class="primary-button blue"> DOWNLOAD SHEET </a>
                                            </div>
                                        </div>
                            </div>

                            <div class="product-description col-md-12 padding-left-reset">
                                <h3 class="description">Product Description</h3>
                                <?php echo $product_description; ?>
                            </div>
                            
                        



                        </div>
                    
                    
                    
                        <div class="col-md-3 col-md-pull-9 padding-left-reset">

                            <div class="product-sidebar">


                                    <div class="sidebar-holder"> 
                <!--                        widget connected-->
                                        <?php dynamic_sidebar( 'products-sidebar' );?>


                                    </div>

                            </div>

                        </div>
                    
                    
                </div>
                    
        
        
        <?php endwhile; ?>
        <?php else : ?>
        <?php endif; ?>
        
        
	</div>


        <script>
        jQuery(document).ready(function() {

//            var owl = $(".next");
//            owl.owlCarousel({
//                    loop:true,
//                    margin:10,
//                    nav:true,
//                    autoplay:true,
//                    autoplayTimeout:3000,
//                    navText: ["<i class=\"fa fa-angle-left\" aria-hidden=\"true\"></i>", "<i class=\"fa fa-angle-right\" aria-hidden=\"true\"></i>"],
//                    responsive:{
//                        0:{
//                            items:1
//                        },
//                        600:{
//                            items:2
//                        },
//                        1000:{
//                            items:3
//                        }
//                    }
//            });
            
            
            jQuery('.slider-for').slick({
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows: false,
              fade: true,
              asNavFor: '.slider-nav'
            });
            
            jQuery('.slider-nav').slick({
              slidesToShow: 4,
              slidesToScroll: 1,
              asNavFor: '.slider-for',
              dots: false,
              centerMode: false,
              focusOnSelect: true,
              
              centerPadding: "15px",
              draggable: false,
              infinite: true,
              swipe: true,
              touchMove: true,
              vertical: true,
              speed: 1000,
              autoplaySpeed: 2000,
              arrows: false
                
            });
            
         
        });
        </script>


<?php get_footer(); ?>