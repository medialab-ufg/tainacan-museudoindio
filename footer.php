<?php if ( ! is_404() ) : ?>
	<footer class="container-fluid p-4 p-sm-5 mt-5 tainacan-footer" style="padding-bottom: 0 !important;">
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
		</div>
        <hr class="bg-scooter"/>
        <div class="row p-4 tainacan-mindio-footer--barra-logos text-white justify-content-around justify-content-sm-around align-items-center">
			<div><img src="<?php echo get_template_directory_uri() ?>/assets/images/logo-footer.svg" alt="" class="logo-tainacan"></div>
			<div><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/SAMI.svg" alt="" class="logo-sami"></div>
			<div><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/Museu_do_Indio.svg" alt="" class="logo-mindio"></div>
            <div><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/Funai.svg" alt="" class="logo-funai"></div>
            <div><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/Unesco.svg" alt="" class="logo-unesco"></div>
			<div><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/nome-governo-federal.png" alt="" class="logo-govfederal"></div>
        </div>
		<div class="row">
			<div class="col-12 tainacan-powered mb-3 text-white">
				<span>
					<?php if ( true == get_theme_mod( 'tainacan_display_powered', false ) ) {
						/* translators: 1: WordPress; 2: Tainacan*/
						printf( __( 'Proudly powered by %1$s and %2$s.', 'tainacan-interface' ), '<a href="https://wordpress.org/">Wordpress</a>', '<a href="http://tainacan.org/">Tainacan</a>' ); } ?>
				</span>
			</div>
		</div>
	</footer>
<?php endif; ?>
<?php wp_footer(); ?>
</body>

</html>
