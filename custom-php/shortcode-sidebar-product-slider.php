<?php
function render_shortcode_sidebar_products( $attribute )
{
    
    extract(shortcode_atts(array(
        'category' => '100',
        'count' => '5',
    ),$atts));
    
    
    $DefaultImage  = get_template_directory_uri()."/custom-php/default-image.jpg";

    $args = array(
        "post_type"      => "our_products",
        "posts_per_page" => -1,
        "orderby"        => "post_date",
        "order"          => "ASC"
//        "order"          => "DESC"
    );
    
    
    if($category){
        $args['tax_query'] = array(array(
            'taxonomy' => 'product_categories',
            'field' => 'term_id',
            'terms' => array($category),
        ));
    }

    $loop = new WP_Query( $args );
    $html = '';


    $html .= '<div class="sidebar-product-main-wrapper">';

    if ($loop->have_posts()) {
        
    $html .= '<div id="shortcode-product">';
        
        while ( $loop->have_posts() ) { 

            $loop->the_post();
            $post_id          = get_the_id();
            $post_object      = get_post( $post_id );
            $post_object_link  = get_permalink ($post_id);
            $post_image       = wp_get_attachment_image_url( get_post_thumbnail_id( $post_id ), "medium");
            $post_title       = $post_object->post_title;
            $post_content     = $post_object->post_content;
            $post_excerpt     = $post_object->post_excerpt;
            
//            LIMIT TEXT 
            $post_shortcontent = get_post_meta($post_id,'short_descriptions',true);
            $post_shortcontent = wp_trim_words( $post_shortcontent, 25 );
            
//            META WITH LINK
            $postbutton = get_post_meta($post_id,'button_url',true);
            $linkurl = get_permalink ($postbutton);

            $html .= '    
                   
                        <div>
                            <div class="">
                                <img src="'.( ( $post_image != NULL ) ? $post_image: $DefaultImage ).'" alt="'. $post_title .'" >
                                <div class="product_details">
                                     <h1>' . $post_title . '</h1>
                                </div>
                               
                            </div> 
                        </div>

                    ';

        }
    
    $html .= '</div>';  
        
    } else {
        $html .=' <p> No Available Posts </p> ';
    }
    
    
    wp_reset_postdata();
    $html .= '</div>';
   
$script = '
        <script>
        jQuery(document).ready(function() {

            var owl = $("#shortcode-product");
            owl.owlCarousel({
                    loop:true,
                    margin:10,
                    nav:true,
                    autoplay:true,
                    dots:false,
                    autoplayTimeout:3000,
                    navText: ["<i class=\"fa fa-angle-left\" aria-hidden=\"true\"></i>", "<i class=\"fa fa-angle-right\" aria-hidden=\"true\"></i>"],
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:1
                        },
                        1000:{
                            items:1
                        }
                    }
            });
            
         
        });
        </script>
        
';
    
 
    

return $html.$script;
      
}
add_shortcode( "product__sidebar_slider" ,"render_shortcode_sidebar_products");
?>