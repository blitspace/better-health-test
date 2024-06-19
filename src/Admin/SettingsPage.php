<?php

namespace BetterHealth\Admin;

class SettingsPage {
    const OPTION_NAME = 'betterhealth_plugin_options';
    const PAGE = 'betterhealth_plugin';
    const JSON_DATA_FIELDNAME = 'json_data';

    public function __construct() {
        add_action('admin_menu', [$this, 'add_plugin_page']);
        add_action('admin_init', [$this, 'register_settings']);
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

    public function register_settings() {
        register_setting(self::OPTION_NAME, self::OPTION_NAME, [
            'type' => 'array',
            'sanitize_callback' => [$this, 'sanitize'],
            'default' => [
                self::JSON_DATA_FIELDNAME => '',
            ],
        ]);


        add_settings_section(
            self::OPTION_NAME . '__section',
            'JSON Data',
            null,
            self::PAGE
        );

        add_settings_field(
            self::JSON_DATA_FIELDNAME,
            'Data',
            [$this, 'render_data_field'],
            self::PAGE,
            self::OPTION_NAME . '__section'
        );
    }

    public function render_data_field() {
        $options = get_option(self::OPTION_NAME);
        ?>
        <textarea
            type="text"
            name="<?= self::OPTION_NAME; ?>[<?= self::JSON_DATA_FIELDNAME ?>]"
            value="<?= esc_attr($options[self::JSON_DATA_FIELDNAME]); ?>"
            style="width: 100%;"
            rows="10"
        ><?= esc_attr($options[self::JSON_DATA_FIELDNAME]); ?></textarea>
        <?php
    }

    public function sanitize($input) {
        return $input;
    }
}