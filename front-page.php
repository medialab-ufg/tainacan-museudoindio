<?php get_header(); ?>

<!-- Get the banner to display -->
<?php get_template_part( 'template-parts/bannerheader' ); ?>

<section class="front-page margin-two-column mt-5">
    <div class="front-page-header margin-one-column">
        <h1>Coleções em destaque</h1>
        <p>Subtítulo, se necessário for.</p>
        <hr class="mi-hr title"/>
    </div>
	<?php $categorias = tainacan_mhn_get_home_categories(); ?>
    <div class="front-page-body">
        <div class="row">
            <?php foreach ($categorias as $cat):  ?>
                <?php $image_id = $cat->get_header_image_id(); ?>
				<div class="col p-0 mt-5">
                    <figure class="figure">
                        <?php if ($image_id): ?>
							<img src="<?php echo wp_get_attachment_url($image_id); ?>" class="figure-img" width="320" height="320">
						<?php endif; ?>
						
                        <figcaption class="figure-caption">
							<a href="<?php echo $MuseuDoIndioMods->get_term_link($cat); ?>">
								<?php echo $cat->get_name(); ?>
							</a>
						</figcaption>
                    </figure>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</section>

<section class="front-page margin-two-column mt-5">
    <div class="front-page-header margin-one-column">
        <h1>Povo indígena</h1>
        <p>Lorem ipsum sit amet, consectetuer adipiscing elit.</p>
        <hr class="mi-hr title"/>
    </div>

    <div class="front-page-body">
        <div class="row justify-content-center">
            <div class="front-page-list w-100 mt-5">
                <?php $povos = 	tainacan_mhn_get_nomes_povos(); ?>
				<?php foreach ($povos as $povo):  ?>
                    <li><?php echo $povo->_toHtml(); ?></li>
                <?php endforeach; ?>
            </div>
            <a id="more" class="my-5" title="<?php _e('Display More', 'tainacan-interface'); ?>"><i class="mdi mdi-chevron-down text-white"></i></a>
        </div>
    </div>

</section>

<?php get_footer(); ?>