<?php get_header(); ?>

<!-- Get the banner to display -->
<?php get_template_part( 'template-parts/bannerheader' ); ?>

<section class="front-page margin-two-column mt-5">
    <div class="front-page-header margin-one-column">
        <h1>Coleções em destaque</h1>
        <p>Subtítulo, se necessário for.</p>
        <hr class="mi-hr title"/>
    </div>

    <div class="front-page-body">
        <div class="row">
            <?php for($x = 0; $x<=9; $x++) { ?>
                <div class="col p-0 mt-5">
                    <figure class="figure">
                        <img src="https://cdn.pixabay.com/photo/2017/04/25/06/15/father-and-son-2258681_960_720.jpg" class="figure-img" width="320" height="320">
                        <figcaption class="figure-caption">Título</figcaption>
                    </figure>
                </div>
            <?php } ?>
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
                <?php for($x = 0; $x<=99; $x++) { ?>
                    <li><a href="#">Etnia (<?php echo $x; ?>)</a></li>
                <?php } ?>
            </div>
            <a id="more" class="mt-3"><i class="mdi mdi-chevron-down text-white"></i></a>
        </div>
    </div>

</section>

<?php get_footer(); ?>