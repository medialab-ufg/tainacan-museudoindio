<?php if(has_nav_menu('MenuBannerBefore')) : ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-0">
        <div class="container">
            <?php echo tainacan_get_logo(); ?> 
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php
                wp_nav_menu( array(
                    'theme_location'	=> 'MenuBannerBefore',
                    'depth'				=> 2, // 1 = with dropdowns, 0 = no dropdowns.
                    'container'			=> 'div',
                    'container_class'	=> 'collapse navbar-collapse',
                    'container_id'		=> 'menubannerbefore',
                    'menu_class'		=> 'navbar-nav',
                    'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
                    'walker'			=> new WP_Bootstrap_Navwalker()
                ) );
            ?>
        </div>
    </nav>
<?php endif; ?>