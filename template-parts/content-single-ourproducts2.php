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



<!--FROM BANNER SUBPAGES POST BACKGROUND-->
<?php $page = get_page( 1383 ); ?>
<?php $img_id =  get_post_meta($page->ID,'upload_banner_image',true); ?>
<?php $banner_img = wp_get_attachment_image_url($img_id, 'full'); ?>

<div style="background:url(<?php echo $banner_img; ?>)no-repeat;" class="banner-subpage">  

    <div class="container">
        <div class="col-md-12">
            
            <div class="col-md-12 text-center">
                <h1><?php the_title(); ?></h1>
                <div class="breadcrumb">
                    <?php echo tm_bread_crumb( array( 'home_label' => Kirki::get_option( 'tm-dione', 'breadcrumb_home_text' ) ) ); ?>
                </div>
            </div>
            
        </div>
    
    </div>
    
</div>




	<div class="container single-wrapper">
        
        
        
        
        
        
<?php if(have_posts()) : ?>
<?php while(have_posts()) : the_post(); ?>
        
            

        
                         <?php
//                                Product FEATURE IMAGE
                                $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'full') );
        
//                                BROCHURES 
                                $data_brochure1 = get_field('brochure1');
                                $data_brochure1_link =  $data_brochure1['url'];
                                $data_brochure1_text =  end(explode('/', $data_brochure1['url'] ));
        
                                $data_brochure2 = get_field('brochure2');
                                $data_brochure2_link =  $data_brochure2['url'];
                                $data_brochure2_text =  end(explode('/', $data_brochure2['url'] ));
        
                                $data_brochure3 = get_field('brochure3');
                                $data_brochure3_link =  $data_brochure3['url'];
                                $data_brochure3_text =  end(explode('/', $data_brochure3['url'] ));

//                                DATA SHEET
                                $data_sheet1 = get_field('data_sheet_1'); 
                                $data_sheet1_link =  $data_sheet1['url'];
                                $data_sheet1_text =  end(explode('/', $data_sheet1['url'] ));
            
                                $data_sheet2 = get_field('data_sheet_2'); 
                                $data_sheet2_link =  $data_sheet2['url'];
                                $data_sheet2_text =  end(explode('/', $data_sheet2['url'] ));
            
                                $data_sheet3 = get_field('data_sheet_3'); 
                                $data_sheet3_link =  $data_sheet3['url'];
                                $data_sheet3_text =  end(explode('/', $data_sheet3['url'] ));

                                $data_sheet4 = get_field('data_sheet_4'); 
                                $data_sheet4_link =  $data_sheet4['url'];
                                $data_sheet4_text =  end(explode('/', $data_sheet4['url'] ));
            
                                $data_sheet5 = get_field('data_sheet_5'); 
                                $data_sheet5_link =  $data_sheet5['url'];
                                $data_sheet5_text =  end(explode('/', $data_sheet5['url'] ));
                    
        
//                                DATA SHEET SAFETY
        
                                $data_sheetsafety1 = get_field('data_sheet_safety_1'); 
                                $data_sheetsafety1_link =  $data_sheetsafety1['url'];
                                $data_sheetsafety1_text =  end(explode('/', $data_sheetsafety1['url'] ));
            
                                $data_sheetsafety2 = get_field('data_sheet_safety_2'); 
                                $data_sheetsafety2_link =  $data_sheetsafety2['url'];
                                $data_sheetsafety2_text =  end(explode('/', $data_sheetsafety2['url'] ));
            
                                $data_sheetsafety3 = get_field('data_sheet_safety_3'); 
                                $data_sheetsafety3_link =  $data_sheetsafety3['url'];
                                $data_sheetsafety3_text =  end(explode('/', $data_sheetsafety3['url'] ));

                                $data_sheetsafety4 = get_field('data_sheet_safety_4'); 
                                $data_sheetsafety4_link =  $data_sheetsafety4['url'];
                                $data_sheetsafety4_text =  end(explode('/', $data_sheetsafety4['url'] ));
            
                                $data_sheetsafety4 = get_field('data_sheet_safety_5'); 
                                $data_sheetsafety4_link =  $data_sheetsafety4['url'];
                                $data_sheetsafety4_text =  end(explode('/', $data_sheetsafety4['url'] ));
        
        
        
            
        
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
        
                                $brochure = get_field('upload_brochure','product_categories_'.$current_cat->term_id);
                                $brochure_link = $brochure['url'];

                                $data_data = get_field('upload_data_sheet','product_categories_'.$current_cat->term_id);
                                $data_data_link =  $data_data['url'];

                                $data_safety = get_field('upload_safety_datasheet','product_categories_'.$current_cat->term_id);
                                $data_safety_link =  $data_safety['url'];
        
        
                        ?>
        
        
        

        <div class="col-md-12">

            <div class="single-content">
                
                   
                <div class="content-summary col-md-12">
                    
                    <div class="col-md-12">  <h2> <?php the_title(); ?></h2>  </div>
                    
                    <div class="col-md-4">
                         <div class="featured_img">
                              <img src="<?php echo $url; ?>">
                             
                            <div class="category-featured">
                              <?php echo $img_cat; ?>
                            </div>    
                        </div>
                        
                        <ul class="single-buttons">
                            
                            <li class="brochure">
                                <a href="#" class="brochure-icon"> Brochure </a>
                                <ul class="sub-menu">
                                    <?php if(!empty($data_brochure1_link)):?>
                                    <li><a href="<?php echo $data_brochure1_link ?>" target="_blank"> <?php echo $data_brochure1_text ?></a></li>
                                    <?php endif;?> 
                                        
                                    <?php if(!empty($data_brochure2_link)):?>
                                        <li><a href="<?php echo $data_brochure2_link ?>" target="_blank"> <?php echo $data_brochure2_text ?></a></li>
                                    <?php endif;?>    
                                    
                                    <?php if(!empty($data_brochure3_link)):?>
                                    <li><a href="<?php echo $data_brochure3_link ?>" target="_blank"> <?php echo $data_brochure3_text ?></a></li>
                                    <?php endif;?>      
                                   
                                </ul>
                            </li>
                            
                            <li class="datasheet">
                                <a href="#" class="datasheet-icon"> DATA SHEET </a>
                                <ul class="sub-menu">
                                    
                                    <?php if(!empty($data_sheet1_link)):?>
                                    <li><a href="<?php echo $data_sheet1_link ?>" target="_blank"> <?php echo $data_sheet1_text?></a></li>
                                    <?php endif;?> 
                                        
                                     <?php if(!empty($data_sheet2_link)):?>   
                                    <li><a href="<?php echo $data_sheet2_link ?>" target="_blank"> <?php echo $data_sheet2_text ?></a></li>
                                    <?php endif;?>    
                                     
                                     <?php if(!empty($data_sheet3_link)):?>    
                                    <li><a href="<?php echo $data_sheet3_link ?>" target="_blank"> <?php echo $data_sheet3_text ?></a></li>
                                    <?php endif;?>     
                                    
                                     <?php if(!empty($data_sheet4_link)):?>
                                    <li><a href="<?php echo $data_sheet4_link ?>" target="_blank"> <?php echo $data_sheet4_text ?></a></li>
                                    <?php endif;?>    
                                      
                                     <?php if(!empty($data_sheet5_link)):?>
                                    <li><a href="<?php echo $data_sheet5_link ?>" target="_blank"> <?php echo $data_sheet5_text ?></a></li>
                                    <?php endif;?>    
                                        
                                        
                                </ul>
                            </li>
                            
                            <li class="datasafety">
                                <a href="#" class="safetydata-icon"> Safety DATA SHEET </a>
                                <ul class="sub-menu">
                                    
                                    <?php if(!empty($data_sheetsafety1_link)):?>
                                    <li><a href="<?php echo $data_sheetsafety1_link ?>" target="_blank"> <?php echo $data_sheetsafety1_text?></a></li>
                                    <?php endif;?> 
                                        
                                     <?php if(!empty($data_sheetsafety2_link)):?>   
                                    <li><a href="<?php echo $data_sheetsafety2_link ?>" target="_blank"> <?php echo $data_sheetsafety2_text ?></a></li>
                                    <?php endif;?>    
                                     
                                     <?php if(!empty($data_sheetsafety3_link)):?>    
                                    <li><a href="<?php echo $data_sheetsafety3_link ?>" target="_blank"> <?php echo $data_sheetsafety3_text ?></a></li>
                                    <?php endif;?>     
                                    
                                     <?php if(!empty($data_sheetsafety4_link)):?>
                                    <li><a href="<?php echo $data_sheetsafety4_link ?>" target="_blank"> <?php echo $data_sheetsafety4_text ?></a></li>
                                    <?php endif;?>    
                                      
                                     <?php if(!empty($data_sheetsafety5_link)):?>
                                    <li><a href="<?php echo $data_sheetsafety5_link ?>" target="_blank"> <?php echo $data_sheetsafety5_text ?></a></li>
                                    <?php endif;?>    
                                    
                                    
                                </ul>
                            </li>
                            
                            
                        </ul>
                        
                      
                        <div class="tag">
                           
                          <h3>Tags</h3>
                          <?php  
                           
                            $args = array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'names');
                            $terms = wp_get_post_terms( get_the_ID(), 'product_tags', $args );
                           
                                    
                             foreach ($terms as $term ) {
                                        
                                echo '<span>'.$term.'</span>';
                                       
                            }
                                
                           ?>
                        
                        </div>
                       
                        
                    </div>
                    
                    <div class="col-md-8">
                        
                        <div class="category-information">
                             <p><?php echo $taxonomy_description; ?></p>
                        </div>
                        
                        <div class="right-content">
                            <?php the_content(); ?>
                        </div>
                        
                        <ul class="button-holder">
                            <li><a href="#" class="inquiry-btn" data-name2="<?php the_title(); ?>"> Request Quotation </a></li>
                        </ul>
                        
                        
                        <div class="filter-holder">
                           
                            <h3> FILTER SECTION HERE </h3>
                            
                            <?php  echo do_shortcode('[shortcode-cables]');?>

                        
                        </div>
                        
                    </div>
                  
                   
                </div>
                
              
            </div>
            

        </div>
        
        
        
        <?php endwhile; ?>
        <?php else : ?>
        <?php endif; ?>
        
        
	</div>



                
    <div class="related_main_wrapper">
        <div class="container">
            
            
<!--            next and prev-->
                <div class="col-md-12 buttons_wrapper">
                    <div class="col-md-6 text-left"> <?php next_post_link('%link', '<i class="fa fa-long-arrow-left" aria-hidden="true"></i>  Previous'); ?>  </div>
                    <div class="col-md-6 text-right"> <?php previous_post_link('%link', 'Next <i class="fa fa-long-arrow-right" aria-hidden="true"></i>'); ?>  </div>
                </div>

            
                <div class="clearfix"></div>
            
                <div class="col-md-12">
                     <?php  echo do_shortcode('[related-products]');?>
                </div>
        </div>
    </div>






<section class="getquote-product">
            <div class="invisible_btn"></div>

            <div class="container quote-wrapper">

                <div class="header-wrapper">
                    <div class="col-xs-11">   
                        <h3> Product Inquiry - <span class="product-title"> <?php the_title(); ?> </span> </h3>  
                    </div>
                    <div class="col-xs-1">   
                        <a href="#" class="close2"></a> 
                    </div>
                </div>
                
                
<!--                GET THE PAGE ID TITLE-->
                <?php $page = get_page( 1067 ); ?>

                <div class="col-md-12 body-content">
                    <?php echo do_shortcode( $page->post_content ); ?>

                </div>
            </div>

</section>


<script>

        jQuery(".getquote-product").hide();
        jQuery(".inquiry-btn").click(function(e){
            e.preventDefault();
                jQuery(".getquote-product").fadeIn(800);
        });

        jQuery(".close2").click(function(e){
            e.preventDefault();
                jQuery(".getquote-product").fadeOut(800);
        }); 

        jQuery(".invisible_btn").click(function(e){
            e.preventDefault();
                jQuery(".getquote-product").fadeOut(800);
        });
    
    
//        RELATED ARROW FAVICON
        jQuery('.getquote-product a.close2').append('<i class="fa fa-times" aria-hidden="true"></i>'); 

</script>



<script>

        jQuery(".single-buttons .sub-menu").hide();
        jQuery(".single-buttons li a.brochure-icon").click(function(e){
            e.preventDefault();
                jQuery(".single-buttons li.brochure .sub-menu").toggle(100);
            
                jQuery(".single-buttons li.datasheet .sub-menu").hide(100);
                jQuery(".single-buttons li.datasafety .sub-menu").hide(100);
        });
    
    
        jQuery(".single-buttons li a.datasheet-icon").click(function(e){
            e.preventDefault();
                jQuery(".single-buttons li.datasheet .sub-menu").toggle(100);
            
                jQuery(".single-buttons li.brochure .sub-menu").hide(100);
                jQuery(".single-buttons li.datasafety .sub-menu").hide(100);
        });
    
    
        jQuery(".single-buttons li a.safetydata-icon").click(function(e){
            e.preventDefault();
                jQuery(".single-buttons li.datasafety .sub-menu").toggle(100);
            
                jQuery(".single-buttons li.brochure .sub-menu").hide(100);
                jQuery(".single-buttons li.datasheet .sub-menu").hide(100);
        });

</script>



<?php get_footer(); ?>