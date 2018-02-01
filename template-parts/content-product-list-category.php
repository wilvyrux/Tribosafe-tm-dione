
<?php 

        $post_id  = get_the_ID();
        
        $category_link        = get_permalink ($post_id);
        $category_background = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );
        $page_title = $post_id->post_title; 

//        $category_product = get_the_content($post_id);
        $post_shortcontent = get_post_meta($post_id,'short_descriptions',true);

?>




<div class="col-md-4 col-sm-12">
    <div class="row product-wrapper clearfix">
        
                <div class="product-holder">
        
                <div class="col-md-12">
                    <div class="feaured-img img-responsive">  
                        <img src="<?php echo $category_background; ?>">
                    </div>  
                </div>
                
                <div class="body-content">
                    <div class="col-xs-8">
                        <a href="<?php echo $category_link; ?>" class="product-title"><?php the_title(); ?></a> 
                    </div>
                    <div class="col-xs-4">
                         <a href="#" id="inquiry_btn" data-name="<?php the_title(); ?>" class="enquire-btn"> <i class="fa fa-envelope-o" aria-hidden="true"></i> ENQUIRE  </a>
                    </div>
                </div>
                
                <div class="footer-content">
                    <div class="col-md-12 clearfix"> 
                        <a href="<?php echo $category_link; ?>" class="view-products"> View Products </a>
                    </div>  
                </div>
            
        
                </div>
                
        
                  
        </div>
</div>




