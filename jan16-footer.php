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

        
<script>
 jQuery(document).ready(function() {
     
        jQuery(".getquote-product").hide();
        jQuery("#inquiry_btn").click(function(){
                jQuery(".getquote-product").fadeIn(800);
        });
     
        jQuery(".close2").click(function(){
                jQuery(".getquote-product").fadeOut(800);
        }); 
     
        jQuery(".invisible_btn").click(function(){
                jQuery(".getquote-product").fadeOut(800);
        });
     
     
//        RELATED ARROW FAVICON
        jQuery('.getquote-product a.close2').html('');
        jQuery('.getquote-product a.close2').append('<i class="fa fa-times" aria-hidden="true"></i>'); 
     
     
        jQuery('.top-wrapper ul.menu li#menu-item-27 a').prepend('<i class="fa fa-phone" aria-hidden="true"></i>'); 
        jQuery('.top-wrapper ul.menu li#menu-item-28 a').prepend('<i class="fa fa-envelope" aria-hidden="true"></i>'); 
    
     
//        var txt = jQuery('.vc_gitem-acf').text();
//                  jQuery('.vc_gitem-acf').text(txt.substring(0,5));
     
    });
</script>  
    

<?php tha_body_bottom(); ?>
<?php wp_footer(); ?>
</body>
</html>


    