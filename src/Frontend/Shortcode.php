<?php

namespace BetterHealth\Frontend;

class Shortcode {
    public function __construct() {
        add_shortcode('betterhealth_shortcode', [$this, 'render_shortcode']);
    }

    public function render_shortcode($atts, $content = null) {
        return '<div class="betterhealth-shortcode"><strong>Hello, World!</strong></div>';
    }
}
