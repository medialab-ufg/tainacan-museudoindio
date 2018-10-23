<?php

class TainacanMuseuIndioThemeTerm {
    
    public $show_term_as_link = 'show_term_as_link';

    function __construct() {
        add_action( 'tainacan-register-admin-hooks', array( $this, 'register_hook' ) );
        add_action( 'tainacan-insert-tainacan-taxonomy', array( $this, 'save_meta' ) );
        add_filter( 'tainacan-api-response-taxonomy-meta', array( $this, 'add_meta_to_response' ), 10, 2 );
        add_filter( 'tainacan-term-to-html', array( $this, 'tainacan_museuindio_term_to_html' ), 10, 3 );
    }

    function register_hook() {
        if ( function_exists( 'tainacan_register_admin_hook' ) ) {
            tainacan_register_admin_hook( 'taxonomy', array( $this, 'form' ) );
        }
    }
    
    function add_meta_to_response( $extra_meta, $request ) {
        $extra_meta = array(
            $this->show_term_as_link
        );
        return $extra_meta;
    }
    
    function save_meta( $object ) {
        if ( ! function_exists( 'tainacan_get_api_postdata' ) ) {
            return;
        }
        $post = tainacan_get_api_postdata();
        if ( $object->can_edit() ) {
            if ( isset( $post->{$this->show_term_as_link} ) ) {
                update_post_meta( $object->get_id(), $this->show_term_as_link, $post->{$this->show_term_as_link} );
            }
        }
    }

    function form() {
        if ( ! function_exists( 'tainacan_get_api_postdata' ) ) {
            return '';
        }
        ob_start();
        ?>
        <div class="field tainacan-term-show-link">
            <label class="label"><?php _e( 'Apresentar como link', 'tainacan-interface' ); ?></label>
            <span class="help-wrapper">
                <a class="help-button has-text-secondary">
                    <span class="icon is-small">
                        <i class="mdi mdi-help-circle-outline"/></i>
                    </span>
                </a>
                <div class="help-tooltip">
                    <div class="help-tooltip-header">
                        <h5><?php _e( 'Mostrar a taxonomia como link', 'tainacan-interface' ); ?></h5>
                    </div> 
                    <div class="help-tooltip-body">
                        <p><?php _e( 'Mostrar a taxonomia como link', 'tainacan-interface' ); ?></p>
                    </div>
                </div>
            </span>
            
            <div class="control">
                <span class="select">
                    <select id="show-term-as-link" name="<?php echo $this->show_term_as_link; ?>">
                        <option selected="selected" value="0">Sim</option>
                        <option value="1">Não</option>
                    </select>
                </span>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    function tainacan_museuindio_term_to_html( $string_html, $term ) {
        $show_as_link = get_post_meta($this->get_id_by_db_identifier($term->get_taxonomy()), $this->show_term_as_link, true);
        if($show_as_link == 1) {
            $noTags = strip_tags($string_html);
            return $noTags;
        }
        return $string_html;
    }

    public function get_id_by_db_identifier( $db_identifier ) {
        $prefix = "tnc_tax_";
        $sufix  = "";
        $id     = str_replace( $prefix, '', $db_identifier );
        $id     = str_replace( $sufix, '', $id );
        if ( is_numeric( $id ) ) {
            return (int) $id;
        }
        return false;
    }
}

new TainacanMuseuIndioThemeTerm();

?>
