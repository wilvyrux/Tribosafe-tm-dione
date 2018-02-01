<?php

add_shortcode('wx_short_main_category_display', 'render_wx_short_main_category_display');
function render_wx_short_main_category_display($atts){

    
//    CATEGORY TAXONOMY
    $terms = get_terms('product_categories', array('hide_empty' => false,'parent'=>0));
   

    
    $html = '';
    $html .= '<div id="main-category-display-wrapper">';

    if (!is_wp_error($terms) && !empty($terms)) {

        $html .= '<ul class="categories_results">';
        
        
        
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
            
            
            $category_summary_desc = get_field('summary_description','product_categories_'.$term_id);
            
            
            
    /************************************************************/
            
            
//            FOR TERM PRODUCTS
            $term_products = '
            <ul class="sub-menu">
                            
            ';
            
            $products = get_posts(array(
                'post_type'=>'our_products',
                'posts_per_page'=>'-1',
                'post_status'=>'publish',
                'tax_query'=>array(array(
                    'taxonomy'=>'product_categories',
                    'terms'=>$term_id,
                    'field'=>'term_id',
                )),
            ));
            
            
            
            foreach($products as $product) {
                $title = $product->post_title;
                $link = get_permalink($product->ID);
                //var_dump($product);
                
                
                
                 $term_products .= '
                                <li> <a href="'. $link .'"> '. $title .' </a></li> 
                ';
                
                
                
            }
                
            $term_products .= '
                            </ul>
            ';
            

                
            
            
            $html .= '    

                         <li class="col-md-6">
                         
                            <div class="main-category-thumbnail">
                                <div class="header-part clearfix">
                                       <h1>' . $term_name . '</h1>
                                </div> <!--end of header-part-->
                                <div class="body-part clearfix">
                                   
                                       '. $img_cat .'
                                       <div class="overlay-wrapper">
                                            <p>'. $term_description_output .' </p>
                                              '. $term_products .'  
                                       </div>
                                      
                                </div><!--end of body-part-->
                                <div class="footer-part clearfix">
                                
                                    <div class="col-md-6 col-sm-6">
                                        <div class="product_btn">
                                                <ul>
                                                    <li>
                                                       <a href="'. $term_link .'" class="custom_btn"> <i class="fa fa-plus" aria-hidden="true"></i> View More </a>
                                                    </li>
                                                </ul>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-sm-6">
                                        <div class="get-inquiry">
                                                 <a href="#" class="inquire-button"> <i class="fa fa-envelope-o" aria-hidden="true"></i> ENQUIRY </a>   
                                                 
                                                 <h1>'. $category_summary_desc .' </h1>
                                        </div>
                                    </div>
                                
                                
                                </div><!--end of footer-part-->
                            
                            
                            
                            </div> <!--end of main-category-thumbnail-->
                            
                        </li>

                    ';

        }
        
        

    $html .= '</ul>';  

    } else {
        $html .=' <p> No Available Posts </p> ';
    }

    
    
    $html .= '</div>';
    
    $script .='
    
s
    
    ';



    return $html.$script;
    
} 


