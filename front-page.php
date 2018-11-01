<?php get_header(); ?>

<!-- Get the banner to display -->
<?php get_template_part( 'template-parts/bannerheader' ); ?>
<!-- Get the menu if is create in panel admin -->
<?php get_template_part( 'template-parts/menubellowbanner' ); ?>

<section class="front-page margin-two-column mt-5">
    <div class="front-page-header margin-one-column">
        <h1>Coleções em destaque</h1>
        <p>Subtítulo, se necessário for.</p>
        <hr class="mi-hr title"/>
    </div>

    <div class="front-page-body">
        <div class="row">
            <?php for($x = 0; $x<=9; $x++) { ?>
                <div class="col p-0">
                    <figure class="figure">
                        <img src="https://cdn.pixabay.com/photo/2017/04/25/06/15/father-and-son-2258681_960_720.jpg" class="figure-img" width="320" height="320">
                        <figcaption class="figure-caption">Título</figcaption>
                    </figure>
                </div>
            <?php } ?>
        </div>
    </div>

</section>

<?php get_footer(); ?>