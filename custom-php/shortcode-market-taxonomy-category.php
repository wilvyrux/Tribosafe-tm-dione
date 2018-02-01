<?php

add_shortcode('sc_market_taxonomy_category', 'render_sc_market_taxonomy');
function render_sc_market_taxonomy($atts){

    
    $current_term = get_queried_object();
    $terms = get_terms('market_categories', array('hide_empty' => false,'parent'=>$current_term->term_id));
   

    $html = '';
    $html .= '<div>';

    if (!is_wp_error($terms) && !empty($terms)) {
        
        
        $html .= '<div class="market_slider_wrapper">';
        
        
        
   /************************************************************/
        
        foreach($terms as $term){
            $term_id = $term->term_id;
            
//          title & Description for categories
            $term_name = $term->name;
            $term_description = $term->description;
            $term_description_output = wp_trim_words( $term_description, 50 );
            
//          term perlink
            $term_link = get_term_link($term_id);
            
            
//          images category
            $img_cat = '<img src="'. do_shortcode('[wp_custom_image_category onlysrc="true" size="full" term_id="'. $term_id.'" alt="alt :)"]') .'">';
            
//          meta categories
            
            $brochure = get_field('upload_brochure','product_categories_'.$term_id);
            $brochure_link = $brochure['url'];
            
            $data_data = get_field('upload_data_sheet','product_categories_'.$term_id);
            $data_data_link =  $data_data['url'];
            
            $data_safety = get_field('upload_safety_datasheet','product_categories_'.$term_id);
            $data_safety_link =  $data_safety['url'];
            
            $data_download = get_field('upload_for_download_resources','product_categories_'.$term_id);
            $data_download_link =  $data_download['url'];
            
//           CURRENT ACTIVE 
            $is_current_term = $current_term->term_id ==  $term_id;
            
           
            
            
    /************************************************************/
            
            
//            FOR TERM PRODUCTS
            $random_number = rand(0,9999);
            $term_products = '
                            <ul class="marketplace">
                            
            ';
            
            $products = get_posts(array(
                'post_type'=>'market_places',
                'posts_per_page'=>'-1',
                'post_status'=>'publish',
                'tax_query'=>array(array(
                    'taxonomy'=>'market_categories',
                    'terms'=>$term_id,
                    'field'=>'term_id',
                )),
            ));
            
            
            
            foreach($products as $product) {
                $title = $product->post_title;
                $link = get_permalink($product->ID);
                $post_image = wp_get_attachment_image(get_post_thumbnail_id($product->ID),'medium');
                //var_dump($product);
                
                
            $term_products .= '
                            <div class="market-content"> 
                                <a href="'. $link .'"  > '. $post_image .' </a>
                                <h4>'.  $title .'</h4>
                                <a href="#" class="request-quote inquiry-btn" data-name="'. $title .'"> Request a Quote </a>
                            </div> 
            ';
                
                
            }
                
            $term_products .= '
                            </ul>
            ';
            

                
            $html .= '    
                         <div class="market_slider">
                                <h4 class="sub-category-title"><a href="'. $term_link .'">' . $term_name .'</a></h4>
                                '. $term_products .'    
                                
                         </div>
                    ';

        }
        
        

        $html .= '</div>';  

    } else {
        $html .=' <p> No Available Posts </p> ';
    }

    
    $html .= '</div>';
    
    
   
    

    $script = '
        
                      <script>
                            jQuery(document).ready(function() {

                                var owl = jQuery(".marketplace");
                                owl.each(function(){
                                var owl_carousel = jQuery(this);
                                        owl_carousel.owlCarousel({
                                        loop:true,
                                        margin:0,
                                        nav:true,
                                        autoplay:true,
                                        autoplayTimeout:6000,
                                        navText: ["<i class=\"fa fa-angle-left\" aria-hidden=\"true\"></i>", "<i class=\"fa fa-angle-right\" aria-hidden=\"true\"></i>"],
                                        responsive:{
                                            0:{
                                                items:1
                                            },
                                            600:{
                                                items:2
                                            },
                                            1000:{
                                                items:3
                                            }
                                        }
                                });

                                
                                
                                }); 
                                

                            
                            });
                        </script>
    ';
    
    
    
    
    
    $html .='
    
                    
    
                        <section class="getquote-product">
                                    <div class="invisible_btn"></div>

                                    <div class="container quote-wrapper">

                                        <div class="header-wrapper">
                                            <div class="col-xs-11">   
                                                <h3> Product Inquiry<span class="product-title"></span> </h3>  
                                            </div>
                                            <div class="col-xs-1">   
                                                <a href="#" class="close2">
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                </a> 
                                            </div>
                                        </div>

                                        <div class="col-md-12 body-content">
                                           '. do_shortcode('[gravityform id="6" title="true" description="true" ajax="true"]') .'

                                        </div>
                                    </div>
                        </section>
                    
    ';
    

    
    $script .= '
    
        <script>

                jQuery(".getquote-product").hide();
                jQuery(".request-quote").click(function(e){
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
                
        </script>

    ';
    
    $script .='
    
            <script>
               jQuery(".market-content .inquiry-btn").click(function(){
                   var product_name = jQuery(this).attr("data-name")
                   jQuery(".quote-wrapper #field_6_7").val(product_name);
                   jQuery(".quote-wrapper h3 .product-title").html("- " + product_name);
               });
            </script>

    ';
    


    return $html.$script;




}
