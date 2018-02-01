<?php
$tm_dione_list_boxed = Kirki::get_option( 'tm-dione', 'homepage_list_boxed_enable' );
$tm_dione_blog_hide_author = Kirki::get_option( 'tm-dione', 'blog_hide_author' );
$tm_dione_post_hide_featured_image = get_post_meta( get_the_ID(), "post_hide_featured_image", true );

if($tm_dione_list_boxed == 1) {
	$class = 'col-sm-3';
}
else {
	$class = 'col-sm-12 col-md-4';
}

?>
<div class="<?php echo esc_attr( $class ) ?> post blog-entry">


	<div class="postcontent-grid">
		<span class="date"><?php the_time('M d, Y') ?></span>
		<div class="blog-entry-header">
			<div class="blog-entry-title">
				<?php the_title( sprintf( '<h5><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' ); ?>
			</div>
		</div>
		<div class="blog-entry-content">
			<?php the_excerpt(); ?>
			<p><a class="read-more"
			   href="<?php echo get_permalink() ?>"><span><?php echo esc_html__( 'Continue Reading', 'tm-dione' ) ?></span></a></p>
		</div>

	</div>
</div>
<!-- /.post -->
