<?php
function render_shortcode_testimonial( $attribute )
{
    $DefaultImage  = get_template_directory_uri()."/custom-php/default-image.jpg";

    $args = array(
        "post_type"      => "client_testimonials",
        "posts_per_page" => -1,
        "orderby"        => "post_date",
        "order"          => "ASC"
//        "order"          => "DESC"
    );

    $loop = new WP_Query( $args );
    $html = '';


    $html .= '<div class="testimonial-main-wrapper">';

    if ($loop->have_posts()) {
        
    $html .= '<div id="shortcode-testimonial">';
        
        while ( $loop->have_posts() ) { 

            $loop->the_post();
            $post_id          = get_the_id();
            $post_object      = get_post( $post_id );
            $post_object_link  = get_permalink ($post_id);
            $post_image       = wp_get_attachment_image_url( get_post_thumbnail_id( $post_id ), "large");
            $post_title       = $post_object->post_title;
            $post_content     = $post_object->post_content;
            $post_excerpt     = $post_object->post_excerpt;
            
//            LIMIT TEXT 
            $post_shortcontent = get_post_meta($post_id,'short_descriptions',true);
            $post_shortcontent = wp_trim_words( $post_shortcontent, 25 );
            
//            META WITH LINK
            $postbutton = get_post_meta($post_id,'button_url',true);
            $linkurl = get_permalink ($postbutton);
            
            
            $testimonial_name = get_post_meta($post_id,'client_name',true);
            $testimonial_message = get_post_meta($post_id,'client_message',true);
            $testimonial_position = get_post_meta($post_id,'client_position',true);
            
            

            $html .= '    
                   
                    <div class="testify">
                        <p class="message-client">'. $testimonial_message .'</p>
                        <h4>'. $testimonial_name .'</h4>
                        <p> '. $testimonial_position .'</p>
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

            var owl = $("#shortcode-testimonial");
            
            var owl_carousel = owl.owlCarousel({
                    margin:0,
                    navText: ["<i class=\"fa fa-angle-left\" aria-hidden=\"true\"></i>", "<i class=\"fa fa-angle-right\" aria-hidden=\"true\"></i>"],
                    items:1,
                    margin:10,
                    autoWidth:false,
                    autoplay:true,
                    autoplayTimeout:1000,
                    
                   
            });
            setTimeout(function(){
                owl.trigger("refresh.owl.carousel");
            }, 500);
         
        });
        </script>
        
        
';
    
 
    

return $html.$script;
      
}
add_shortcode( "testimonial-slider" ,"render_shortcode_testimonial");
?>