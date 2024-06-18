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
        // Add hooks here
    }
}

new Init();
