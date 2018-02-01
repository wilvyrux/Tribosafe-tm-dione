<?php
function render_portfolio_fullslide_display( $attribute )
{
    $DefaultImage  = get_template_directory_uri()."/custom-php/default-image.jpg";

    $args = array(
        "post_type"      => "applications",
        "posts_per_page" => -1,
        "orderby"        => "post_date",
        "order"          => "ASC"
//        "order"          => "DESC"
    );

    $loop = new WP_Query( $args );
    $html = '';


    $html .= '<div class="portfolio-main-wrapper">';

    if ($loop->have_posts()) {
        
    $html .= '<div id="shortcode-portfolio-full">';
        
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
                            <div class="portfolio-display-full">
                                <img src="'.( ( $post_image != NULL ) ? $post_image: $DefaultImage ).'" alt="'. $post_title .'" >
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

            var owl = $("#shortcode-portfolio-full");
            owl.owlCarousel({
                    loop:true,
                    margin:0,
                    nav:false,
                    autoplay:true,
                    autoplayTimeout:3000,
                    navText: ["<i class=\"fa fa-angle-left\" aria-hidden=\"true\"></i>", "<i class=\"fa fa-angle-right\" aria-hidden=\"true\"></i>"],
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:6
                        },
                        1500:{
                            items:6
                        },
                        2000:{
                            items:6
                        },
                    }
            });
            
         
        });
        </script>
        
';
    
 
    

return $html.$script;
      
}
add_shortcode( "portfolio_fullslide_display" ,"render_portfolio_fullslide_display");
?>