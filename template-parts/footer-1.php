<?php
$footer_layout_quantity_columns = Kirki::get_option( 'tm-dione', 'footer_layout_quantity_columns' );
$footer_layout_custom_width     = Kirki::get_option( 'tm-dione', 'footer_layout_custom_width' );
$footer_wide_boxed = Kirki::get_option( 'tm-dione', 'footer_wide_boxed' );

$footer_dark_light = Kirki::get_option( 'tm-dione', 'footer_dark_light' );
$footer_sticky = (Kirki::get_option( 'tm-dione', 'footer_sticky_enable' ) == 1 )? 'sticky' : '';

$cl_footer_column = 'col-md-12';
switch ( $footer_layout_quantity_columns ) {
	case 2:
		$cl_footer_column = 'col-md-6';
		break;
	case 3:
		$cl_footer_column = 'col-md-4';
		break;
	case 4:
		$cl_footer_column = 'col-md-3';
		break;
}
if ( $footer_layout_custom_width == 1 ) {
	$cl_footer_column .= ' footer-column';
}

if ( $footer_wide_boxed == 'wide' ) {
	$footer_cl = "container-fluid padding-x-200-lg";
} else {
	$footer_cl = "container";
}

$footer_container_cl = $footer_dark_light;
if ( Kirki::get_option( 'tm-dione', 'footer_parallax_enable' ) == 1 ) {
	$footer_container_cl .= ' footer-parallax';
}

?>


<div class="footer-extended">
    
        <div  class="top-detail-wrapper visible-sm visible-xs">

            <div class="container">
                <div class="col-xs-12 text-center">
                    <a href="#" class="primary-button getquote-btn"> Get A Quote </a>
                </div>

                <div class="col-xs-12 text-left">
                     <?php dynamic_sidebar ('top-details-sidemenu') ?>
                </div>

                <div class="col-xs-12  text-right">
                     <?php dynamic_sidebar ('top-social-sidemenu') ?>
                </div>

            </div>

        </div>
      
</div>



<div class="<?php echo esc_attr( $footer_container_cl ) ?>">

	<?php if ( Kirki::get_option( 'tm-dione', 'copyright_enable' ) == 1 ) { ?>
		<div class="copyright <?php echo esc_attr($footer_sticky) ?>">
			<div class="<?php echo esc_attr( $footer_cl ) ?>">
				<div class="row">
                    
                    
                    <div class="col-xs-12 col-sm-6 text-left">
                        <p><?php echo html_entity_decode( Kirki::get_option( 'tm-dione', 'copyright_text' ) ); ?></p>
                    </div>
                    
                    <div class="col-xs-12 col-sm-6 text-right">
                          <?php dynamic_sidebar ('footer-menu-sidebar') ?>
                    </div>


				</div>
			</div>
		</div><!-- .copyright -->
	<?php } ?>

</div>
