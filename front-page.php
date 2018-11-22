<?php get_header(); ?>

<!-- Get the banner to display -->
<?php get_template_part( 'template-parts/bannerheader' ); ?>

<section class="front-page margin-two-column mt-5">
    
	<div class="front-page-header margin-one-column">
        <h1>Acervo Museológico</h1>
        <!-- <p>Subtítulo, se necessário for.</p> -->
        <hr class="mi-hr title"/>
		<p class="text-justify">
			<?php the_post(); the_content(); ?>
		</p>
    </div>
	
</section>

<section class="front-page margin-two-column mt-5">	
	
	<div class="front-page-header margin-one-column">
        <h1>Coleções em destaque</h1>
        <!-- <p>Subtítulo, se necessário for.</p> -->
        <hr class="mi-hr title"/>
    </div>
	<?php $categorias = tainacan_mi_get_home_categories(); ?>
    <div class="front-page-body">
        <div class="row">
            <?php foreach ($categorias as $cat):  ?>
                <?php $image_id = $cat->get_header_image_id(); ?>
				<div class="col p-0 mt-5">
                    <a href="<?php echo $MuseuDoIndioMods->get_term_link($cat); ?>">
                        <figure class="figure">
                            <?php if ($image_id): ?>
                                <img src="<?php echo wp_get_attachment_url($image_id); ?>" class="figure-img" width="320" height="320">
                            <?php endif; ?>
                            
                            <figcaption class="figure-caption">
                                <?php echo $cat->get_name(); ?>
                            </figcaption>
                        </figure>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</section>

<section class="front-page margin-two-column mt-5">
    <div class="front-page-header margin-one-column">
        <h1>Por povo indígena</h1>
        <p class="italic">Navegue no acervo vendo as peças de cada um dos povos indígenas abaixo</p>
        <hr class="mi-hr title"/>
    </div>

    <div class="front-page-body">
        <div class="row justify-content-center margin-two-column">
            <div class="front-page-list w-100 mt-5">
                <?php tainacan_mi_get_nomes_povos(); ?>
            </div>
            <a id="more" class="my-5" title="<?php _e('Display More', 'tainacan-interface'); ?>"><i class="mdi mdi-chevron-down text-white"></i></a>
        </div>
    </div>

</section>

<!-- teste -->

<?php get_footer(); ?>