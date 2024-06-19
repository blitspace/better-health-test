<?php

namespace BetterHealth\Frontend;

use BetterHealth\Data\Data;

class Shortcode {
    private $data;

    public function __construct() {
        add_shortcode('betterhealth_shortcode', [$this, 'render_shortcode']);
        $data = new Data();

        $this->data = $data->get_data();
    }

    public function render_shortcode($atts, $content = null) {
        return '<section>'
            . '<div class="betterhealth-shortcode"><strong>Hello, World!</strong></div>'
            . '<div id="betterhealth-react-app"></div>'
            . '<script>'
            . 'window.bh = '
            . $this->data
            . '</script>'
            . '</section>';
    }
}
