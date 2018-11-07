<!-- Get the banner to display -->
<?php get_template_part( 'template-parts/bannerheader' ); ?>

<?php
/**
 * This template adss Collections details to the header
 *
 * It will only work with tainacan plugin enabled.
 *
 */
?>

<!-- Get the menu if is create in panel admin -->
<?php //get_template_part( 'template-parts/menubellowbanner' ); ?>

<section class="front-page margin-two-column my-5">
    <div class="front-page-header margin-one-column">
        <h1>Lista de itens da coleção <?php tainacan_the_collection_name(); ?></h1>
        <p><?php tainacan_the_collection_description(); ?></p>
        <hr class="mi-hr title"/>
    </div>
</section>