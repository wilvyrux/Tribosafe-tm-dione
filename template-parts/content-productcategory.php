<?php $post_id              = get_the_ID();  ?>
<?php $category_link        = get_permalink ($post_id); ?>


<?php $category_background = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') ); ?>



<div class="col-md-3">
    <div class="">
        
            
           <img src="<?php echo $category_background;  ?>">
            <div class="row">
                <div class="col-md-8">
                    <h3>  <?php the_title(); ?></h3>
                </div>
                <div class="col-md-4">
                     <a href="#" class="inquire"> inquire</a>
                </div>
                <div class="col-md-12">
                    <a href="<?php echo $category_link; ?>"> View Product</a>
                </div>
            </div>
         
           
        
    </div>
</div>

