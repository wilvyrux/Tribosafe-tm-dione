<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Infinity
 */
?>
<?php tha_content_bottom(); ?>
</div> <!-- #content -->
<?php tha_content_after(); ?>
	<div class="footer-wrapper">
		<?php get_template_part('template-parts/footer', Kirki::get_option( 'tm-dione', 'footer_type' )); ?>
	</div>
</div><!-- #page -->
<?php tha_body_bottom(); ?>
<?php wp_footer(); ?>
<?php if(Kirki::get_option( 'tm-dione', 'scroll_top_top_enable' ) == 1): ?>
	<a class="scrollup show" title="<?php esc_html_e('Go to top', 'tm-dione') ?>"><i class="fa fa-angle-up"></i></a>
<?php endif; ?>
</body>
</html>






<section class="getquote-product getquote-wrapper">
            <div class="invisible_btn"></div>

            <div class="container quote-wrapper">
                <a href="#" class="close2"><i class="fa fa-times" aria-hidden="true"></i></a>

                
<!--                GET THE PAGE ID TITLE-->
                <?php $page = get_page( 1534 ); ?>

                <div class="col-md-12">
                    <div class="header-title">
                        <h2><?php echo do_shortcode( $page->post_title ); ?></h2>
                    </div>
                </div>

                <div class="col-md-12 body-content">
                    <?php //echo do_shortcode( $page->post_content ); ?>
                    <?php  echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]');?>


                </div>
            </div>

</section>


   <script>
                jQuery(".getquote-product").hide();
                jQuery(".getquote-btn").click(function(e){
                    e.preventDefault();
                        jQuery(".getquote-wrapper").fadeIn(800);
                });
                jQuery(".close2").click(function(e){
                    e.preventDefault();
                        jQuery(".getquote-wrapper").fadeOut(800);
                });
                jQuery(".invisible_btn").click(function(e){
                    e.preventDefault();
                        jQuery(".getquote-wrapper").fadeOut(800);
                });
    </script>







<section class="getquote-product enquire-wrapper">
            <div class="invisible_btn"></div>

            <div class="container quote-wrapper">
                <a href="#" class="close2"><i class="fa fa-times" aria-hidden="true"></i></a>

                
<!--                GET THE PAGE ID TITLE-->
                <?php $page = get_page( 1534 ); ?>

                <div class="col-md-12">
                    <h3 class="header-title">
                    </h3>
                </div>

                <div class="col-md-12 body-content" data-name="">
                    <?php //echo do_shortcode( $page->post_content ); ?>
                    <?php  echo do_shortcode('[gravityform id="5" title="true" description="true" ajax="true"]');?>


                </div>
            </div>

</section>


<script>
            jQuery(".enquire-wrapper").hide();
            jQuery(".enquire-btn").click(function(e){
                e.preventDefault();
                 
            });
            jQuery(".close2").click(function(e){
                e.preventDefault();
                    jQuery(".enquire-wrapper").fadeOut(800);
            });
            jQuery(".invisible_btn").click(function(e){
                e.preventDefault();
                    jQuery(".enquire-wrapper").fadeOut(800);
            });
        
    
    
//            GET THE PRODUCT TITLE ON ARCHIVE
            jQuery(".product-holder").on('click','.enquire-btn',function(e){
            e.preventDefault();

            var buttonclick = jQuery(this).data('name');
            jQuery("#gform_5 .product-inquiry input").val(buttonclick);
                    jQuery(".enquire-wrapper").fadeIn(800);
                    jQuery(".quote-wrapper").find(".header-title").html(buttonclick);
       
        
            });
    
    
//            SINGLE PAGE PRODUCT CALL
            jQuery(".content-summary").on('click','.enquire-btn',function(e){
            e.preventDefault();

            var buttonclick2 = jQuery(this).data('name');
            jQuery("#gform_5 .product-inquiry input").val(buttonclick2);
                    jQuery(".enquire-wrapper").fadeIn(800);
                    jQuery(".quote-wrapper").find(".header-title").html(buttonclick2);
       
        
            });
    
    
            
            jQuery(".inquire-button").click(function(e) {
                e.preventDefault();
               var button2 = jQuery (this);
               
               var container = button2.closest('.main-category-thumbnail');
               container.find('.overlay-wrapper').toggleClass('show-overlay');
            });

    
</script>
