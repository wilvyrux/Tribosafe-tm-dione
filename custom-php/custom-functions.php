<?php

function get_mata( $post_id, $meta_key )
{
    echo get_post_meta( $post_id, $meta_key, true ); 
}

/*<----// WX Basic Needs //---->*/

//wx shortcodes
//require_once get_template_directory() . '/custom-php/wx_custom-shortcodes.php';

//wx cleanup functions extras
require_once get_template_directory() . '/custom-php/wx_custom-cleanups.php';

//wx login and admins scripts
require_once get_template_directory() . '/custom-php/wx_custom-login_admin.php';

//wx style and jquery scripts
require_once get_template_directory() . '/custom-php/wx_custom-style_scripts.php';
/*<----//  //---->*/


//FIXED SHORTCODE
require_once get_template_directory() . '/custom-php/wx_short_main_category_display.php';
require_once get_template_directory() . '/custom-php/shortcode-ourpartners-slider.php';
require_once get_template_directory() . '/custom-php/shortcode-wx-ourproduct-taxonomy.php';

//media news
require_once get_template_directory() . '/custom-php/wx_shortcode_media.php';

//the sidebar products
require_once get_template_directory() . '/custom-php/shortcode-sidebar-product-slider.php';

//faq accordion
require_once get_template_directory() . '/custom-php/shortcode-accordion-faq.php';

//aaplication
require_once get_template_directory() . '/custom-php/shortcode-application-display.php';
require_once get_template_directory() . '/custom-php/shortcode-media-display.php';

//application related
require_once get_template_directory() . '/custom-php/shortcode-related-application.php';

/*<----// WX EXTRA Shortcode posts //---->*/
require_once get_template_directory() . '/custom-php/wx_custom-shortcodes.php';
require_once get_template_directory() . '/custom-php/wx_widgets.php';

/*<----//  //---->*/









require_once get_template_directory() . '/custom-php/shortcode-related-products.php';

//require_once get_template_directory() . '/custom-php/shortcode-product-slider.php';
require_once get_template_directory() . '/custom-php/shortcode-featured-taxonomy.php';
require_once get_template_directory() . '/custom-php/shortcode-certificate-slider.php';
require_once get_template_directory() . '/custom-php/shortcode-clienttestimonial-slider.php';
require_once get_template_directory() . '/custom-php/shortcode-ourteam-slider.php';
//require_once get_template_directory() . '/custom-php/shortcode-resources-display.php';

//require_once get_template_directory() . '/custom-php/shortcode-resource-category.php';



require_once get_template_directory() . '/custom-php/shortcode-product-taxonomy_sidebar.php';
require_once get_template_directory() . '/custom-php/shortcode-marketplace-taxonomy_sidebar.php';
require_once get_template_directory() . '/custom-php/shortcode-product-taxonomy_submenu.php';


//MARKET PLACE
require_once get_template_directory() . '/custom-php/shortcode-featured-taxonomy-market.php';
require_once get_template_directory() . '/custom-php/shortcode-market-taxonomy-category.php';
require_once get_template_directory() . '/custom-php/shortcode-cables-spec.php';
require_once get_template_directory() . '/custom-php/shortcode-application-display-all.php';



require_once get_template_directory() . '/custom-php/shortcode-services-display.php';
require_once get_template_directory() . '/custom-php/shortcode-portfolio-fullslide-display.php';
require_once get_template_directory() . '/custom-php/services_slide_display.php';




function contact_form_drop_down_content( $form )
{
    if( $form["id"] != 1 )
        return $form;

    $items = array();
    $items2 = array();

    $products = get_posts(
        array(
            "post_type"      => "our_products",
            "post_status"    => "publish",
            "orderby"        => "title",
            "order"          => "ASC",
            "posts_per_page" => -1
        )
    );
    
    
    $products2 = get_posts(
        array(
            "post_type"      => "applications",
            "post_status"    => "publish",
            "orderby"        => "title",
            "order"          => "ASC",
            "posts_per_page" => -1
        )
    );


    foreach( $products as $product ) :
    $items[] = array( "text" => $product->post_title, "value" => $product->post_name );
    endforeach;
    
    foreach( $products2 as $product ) :
    $items2[] = array( "text" => $product->post_title, "value" => $product->post_name );
    endforeach;
    


    foreach($form["fields"] as &$field) :
    
    if($field["id"] == 7 ) :
    $field["choices"] = $items;
    endif;
    
    if($field["id"] == 6 ) :
    $field["choices"] = $items2;
    endif;
    
    endforeach;

    return $form;
}
add_filter("gform_pre_render_1", "contact_form_drop_down_content");
add_filter("gform_admin_pre_render_1", "contact_form_drop_down_content");





require_once get_template_directory() . '/custom-php/class.mb_image_gallery.php';

/*{{{ Add Image gallery to taopix product }}}*/
function add_meta_box_gallery_product(){
if(!class_exists('Image_Gallery_Metabox')) return;
new Image_Gallery_Metabox(array('post_types' => array('products_slider', 'our_products')));
}
add_action('init', 'add_meta_box_gallery_product');



?>