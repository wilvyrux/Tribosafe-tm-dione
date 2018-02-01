
<?php 

        $post_id  = get_the_ID();
        
        $category_link        = get_permalink ($post_id);
        $category_background = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );

//        $category_product = get_the_content($post_id);
        $post_shortcontent = get_post_meta($post_id,'short_descriptions',true);

?>



    <div class="col-md-12">
            <?php  echo do_shortcode('[sc_market_taxonomy_category]');?>
    </div>


