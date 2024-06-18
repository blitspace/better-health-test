<?php

namespace BetterHealth\Admin;

class SettingsPage {
    public function __construct() {
        add_action('admin_menu', [$this, 'add_plugin_page']);
    }

    public function add_plugin_page() {
        add_menu_page(
            'Better Health Settings',
            'Better Health Demo',
            'manage_options',
            'better-health',
            [$this, 'create_admin_page'],
            'dashicons-admin-generic'
        );
    }

    public function create_admin_page() {
        echo '<div class="wrap">';
        echo '<h1>Better Health Settings</h1>';
        echo '<form method="post" action="options.php">';
        settings_fields('betterhealth_plugin_options');
        do_settings_sections('betterhealth_plugin');
        submit_button();
        echo '</form>';
        echo '</div>';
    }
}
