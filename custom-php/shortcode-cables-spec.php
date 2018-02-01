<?php

add_shortcode('shortcode-cables', 'render_shortcode_cables_taxonomy');
function render_shortcode_cables_taxonomy($atts){

    $terms = get_terms('cable_categories', array('hide_empty' => false,'parent'=>0));
   

    $html = '';
    $html .= '<div id="category-wrapper">';

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
            
                
            $data_download_link =  $data_download['url'];
            
            
            
    /************************************************************/
            
            
//            FOR TERM PRODUCTS
            $term_products = '
                            <ul class="sub-menu">
            ';
            
            
            
            
            
            
            $products = get_posts(array(
                'post_type'=>'cable_products',
                'posts_per_page'=>'-1',
                'post_status'=>'publish',
                'tax_query'=>array(array(
                    'taxonomy'=>'cable_categories',
                    'terms'=>$term_id,
                    'field'=>'term_id',
                )),
            ));
            
        
            
            foreach($products as $product) {
                $title = $product->post_title;
                $link = get_permalink($product->ID);
                $meta_text_one = get_post_meta(get_the_ID(),'nominal_diameter',true);
                $meta_text_two = get_post_meta(get_the_ID(),'max_temp_f',true);
                $meta_text_three = get_post_meta(get_the_ID(),'breaking_strength_(lbs)',true);
                
            }
                             
            
                
            $html .= '    


                         <li>
                                 '.$term_name .'       
                                
                         </li>

                    ';

        }
        
        

        $html .= '</ul>';  
        
        
        
        $html .= 
            
            '
            
                
            <div class="container filter-wrapper">
                    <div class="col-md-12"> 
                            <div class="filter-names">
                                <form name="cablefilter-form" id="cablefilter-form">
                                    <ul>
                                        <li> 
                                        
                                            <select>
                                                <option> option 1 </options>
                                                <option> option 1 </options>
                                                <option> option 1 </options>
                                            </select>
                                           
                                        </li>
                                    </ul>
                                    <ul>
                                        <li> 
                                            <select>
                                                <option> option 1 </options>
                                                <option> option 1 </options>
                                                <option> option 1 </options>
                                            </select>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li> 
                                            <select>
                                                <option> option 1 </options>
                                                <option> option 1 </options>
                                                <option> option 1 </options>
                                            </select>
                                        </li>
                                    </ul>
                                     <ul>
                                        <li> 
                                            <select>
                                                <option> option 1 </options>
                                                <option> option 1 </options>
                                                <option> option 1 </options>
                                            </select>
                                        </li>
                                    </ul>
                                    </form>
                            </div>
                            
                            
                            <div class="cable-contents">
                                 <ul>
                                    <li> Cable name </li>
                                    <li> Nominal Diameter </li>
                                    <li> Max. Temp. F </li>
                                    <li> Breaking Strength (lbs)

 </li>
                                 </ul>
                                 
                                  <ul>
                                    <li> Cable name </li>
                                    <li> Nominal Diameter </li>
                                    <li> Max. Temp. F </li>
                                    <li> Breaking Strength (lbs)

 </li>
                                 </ul>
                                 
                                 <ul>
                                    <li> Cable name </li>
                                    <li> Nominal Diameter </li>
                                    <li> Max. Temp. F </li>
                                    <li> Breaking Strength (lbs)

 </li>
                                 </ul>
                            
                            </div>
                            
                    </div>
            </div>

            
            ';
        
        

    } else {
        $html .=' <p> No Available Posts </p> ';
    }

    
    $html .= '</div>';


    return $html.$script;
    


}