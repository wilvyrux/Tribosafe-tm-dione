<?php
function render_shortcode_related_application( $attribute )
{
    $DefaultImage  = get_template_directory_uri()."/custom-php/default-image.jpg";

//    ORDER OPTION
    $current_post_id = get_the_ID();
//    get the taxonomy name 
    $taxonomy = '';
    $current_post_terms = $terms = wp_get_post_terms( $current_post_id, $taxonomy );

    $current_post_terms_ids = array();
    foreach($current_post_terms as $term){
        $current_post_terms_ids[] = $term->term_id;
    }
    $args = array( 'post_type' => get_post_type($current_post_id), 'orderby' => 'rand', 'posts_per_page' => '6' );


    $loop = new WP_Query( $args );
    $html = '';


    $html .= '<div id="related-wrapper">';
    
    //$html .= '<h2> Related Services</h2>';

    if ($loop->have_posts()) {
        
    $html .= '<div class="related-application">';
        
        while ( $loop->have_posts() ) { 

            $loop->the_post();
            $post_id          = get_the_id();
            $post_object      = get_post( $post_id );
            $post_object_link  = get_permalink ($post_id);
            $post_image       = wp_get_attachment_image_url( get_post_thumbnail_id( $post_id ), "large"); 
            $post_title       = $post_object->post_title;
            $post_content     = $post_object->post_content;
            $post_content_trim  = wp_trim_words( $post_content, 10 );
            $post_excerpt     = $post_object->post_excerpt;
            $postbutton = get_post_meta($post_id,'button_url',true);
            $linkurl = get_permalink ($postbutton);

            $html .= '    
                   
                       
                                <div class="application-holder">
                                    <div class="featured-img">
                                          <a href="'.$post_object_link.'"><img src="'.( ( $post_image != NULL ) ? $post_image: $DefaultImage ).'" alt="'. $post_title .'" ></a>
                                    </div>
                                  
                                        <a href="'.$post_object_link.'"><h4>'. $post_title .'</h4></a>
                                        <p>'. $post_content_trim .'</p>
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

            var owl = $(".related-application");
            owl.owlCarousel({
                 loop:true,
                    margin:10,
                    nav:false,
                    autoPlay:3,
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
        </script>
        
';

    

    
return $html.$script;
      
}
add_shortcode( "related-application" ,"render_shortcode_related_application");
?>