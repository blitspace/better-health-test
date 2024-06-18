<?php

namespace BetterHealth;

use BetterHealth\Admin\SettingsPage;
use BetterHealth\Frontend\Shortcode;

class Init {
    public function __construct() {
        $this->load_dependencies();
        $this->setup_hooks();
    }

    private function load_dependencies() {
        new SettingsPage();
        new Shortcode();
    }

    private function setup_hooks() {
        add_action('wp_enqueue_scripts', function () {
            wp_enqueue_script(
                'betterhealth-plugin-react-app',
                plugins_url('./Frontend/build/bundle.js', __FILE__),
                [],
                '1.0.0',
                true
            );
        });
    }
}

new Init();
