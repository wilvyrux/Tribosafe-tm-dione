<?php
function render_shortcode_media( $attribute )
{
    $DefaultImage  = get_template_directory_uri()."/custom-php/default-image.jpg";

    $args = array(
        "post_type"      => "our_media",
        "posts_per_page" => -1,
        "orderby"        => "post_date",
        "order"          => "ASC"
//        "order"          => "DESC"
    );

    $loop = new WP_Query( $args );
    $html = '';


    $html .= '<div class="ourteam-main-wrapper">';

    if ($loop->have_posts()) {
        
    $html .= '<div id="shortcode-ourteam">';
        
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
            
            
            $team_name = get_post_meta($post_id,'team_name',true);
            $team_position = get_post_meta($post_id,'team_position',true);
            
            

            $html .= '    
                   
                    <div class="content">
                        <p class="message-client">'. $post_content .'</p>
                        <h4>'. $team_name .'</h4>
                        <p> '. $team_position .'</p>
                    </div>

                    ';

        }
    
    $html .= '</div>';  
        
    } else {
        $html .=' <p> No Available Posts </p> ';
    }
    
    
    wp_reset_postdata();
    $html .= '</div>';
   


return $html.$script;
      
}
add_shortcode( "media_output" ,"render_shortcode_media");
?>