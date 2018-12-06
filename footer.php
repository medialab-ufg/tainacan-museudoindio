<?php if ( ! is_404() ) : ?>
	<footer class="container-fluid p-4 p-sm-5 mt-5 tainacan-footer" style="padding-bottom: 0 !important;">
		<?php if ( is_active_sidebar( 'tainacan-sidebar-footer' ) ) { ?>
			<div class="row">
				<div class="col-12 col-lg">
					<ul class="p-4 d-lg-flex justify-content-md-center mb-md-0">
						<?php dynamic_sidebar( 'tainacan-sidebar-footer' ); ?>
					</ul>
				</div>
			</div>
			<hr class="bg-scooter"/>
		<?php } ?>
		<div class="row p-4 tainacan-footer-info">
			<div class="col text-white font-weight-normal">
				<p class="tainacan-footer-info--blog">
					<?php echo bloginfo( 'title' );
					if ( ! wp_is_mobile() ) {
						echo '<br>';
					} else {
						echo '</p><p>';
					}
					if ( get_option( 'tainacan_blogaddress' ) ) {
						echo wp_filter_nohtml_kses( get_option( 'tainacan_blogaddress', '' ) );
					} ?>
				</p>
				<p class="tainacan-footer-info--blog">
<?php if ( get_option( 'tainacan_blogemail' ) ) {
	printf( __( 'E-mail: %s', 'tainacan-interface' ), sanitize_email( get_option( 'tainacan_blogemail', '' ) ) );
}
if ( get_option( 'tainacan_blogemail' ) && get_option( 'tainacan_blogphone' ) ) {
	if ( wp_is_mobile() ) :
		echo '<br>';
	else :
		echo ' - ';
	endif;
}
if ( get_option( 'tainacan_blogphone' ) ) {
	printf( __( 'Telephone: %s', 'tainacan-interface' ), wp_filter_nohtml_kses( get_option( 'tainacan_blogphone', '' ) ) );
} ?>
				</p>
			</div>
			<div class="col-auto pr-0 pr-md-3 d-none d-md-block align-self-md-top">
					<img src="<?php if ( get_theme_mod( 'tainacan_footer_logo' ) ) { echo esc_attr( get_theme_mod( 'tainacan_footer_logo' ) ); }else{ echo get_template_directory_uri() ?>/assets/images/logo-footer.svg<?php }?> ?>" class="tainacan-footer-info--logo" alt="">
			</div>
			<div class="col-12 tainacan-powered">
				<span>
					<?php if ( true == get_theme_mod( 'tainacan_display_powered', false ) ) {
						/* translators: 1: WordPress; 2: Tainacan*/
						printf( __( 'Proudly powered by %1$s and %2$s.', 'tainacan-interface' ), '<a href="https://wordpress.org/">Wordpress</a>', '<a href="http://tainacan.org/">Tainacan</a>' ); } ?>
				</span>
			</div>
		</div>
        <hr class="bg-scooter"/>
        <div class="row p-4 tainacan-mindio-footer--barra-logos text-white justify-content-around justify-content-sm-start align-items-center">
            <div><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/Funai.svg" alt=""></div>
            <div><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/Unesco.svg" alt=""></div>
        </div>
	</footer>
<?php endif; ?>
<?php wp_footer(); ?>
</body>

</html>
