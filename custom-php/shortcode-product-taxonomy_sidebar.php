<?php

add_shortcode('sc_product_taxonomy_sidebar', 'render_sc_product_taxonomy2');
function render_sc_product_taxonomy2($atts){

    $terms = get_terms('product_categories', array('hide_empty' => false,'parent'=>0));
   

    $html = '';
    $html .= '<div>';

    if (!is_wp_error($terms) && !empty($terms)) {
        
        $current_term = get_queried_object();
        
        $html .= '<ul class="menu">';
        
        
        
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
            
            
//            CURRENT ACTIVE 
            $is_current_term = $current_term->term_id ==  $term_id;
            
            
            foreach($products as $product) {
                $title = $product->post_title;
                $link = get_permalink($product->ID);
                //var_dump($product);
                
                
                 $term_products .= '
                                <li> <a href="'. $link .'"  > '. $title .' </a></li> 
                ';
                
                
            }
                
            $term_products .= '
                            </ul>
            ';
            

                
            $html .= '    


                         <li class="'. ( $is_current_term ? 'current-menu-item':'') .'">
                                
                                <a href="'. $term_link .'">' . $term_name .'</a>
                                '. $term_products .'    
                            
                         </li>

                    ';

        }
        
        

        $html .= '</ul>';  

    } else {
        $html .=' <p> No Available Posts </p> ';
    }

    
    $html .= '</div>';

//    $script = '
//        <script>
//        jQuery(document).ready(function() {
//
//            var owl = $(".owl-carouse");
//            owl.owlCarousel({
//                 loop:true,
//                    margin:10,
//                    nav:false,
//                    autoPlay:3,
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
//
//
//        });
//        </script>
//
//';




    return $html.$script;




}
