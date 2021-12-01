<?php 
    function finest_docs_shortcode($atts) {
        if (empty($atts)) {
            $atts = array();
        }
        if (empty($atts['stopat'])) {
            $atts['stopat'] = 'h4';
        }
        if (empty($atts['offset'])) {
            $atts['offset'] = '20';
        }
        return '<div class="autoc" data-stopat="'.$atts['stopat'].'" data-offset="'.$atts['offset'].'"></div>';
    }
    add_shortcode('finest-doc-toc', 'finest_docs_shortcode');


?>
