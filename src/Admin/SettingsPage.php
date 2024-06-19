<?php

namespace BetterHealth\Admin;

use BetterHealth\Data\Data;
use BetterHealth\FrontEnd\Shortcode;


class SettingsPage {
    const OPTION_NAME = 'betterhealth_plugin_options';
    const PAGE = 'betterhealth_plugin';
    const JSON_DATA_FIELDNAME = 'json_data';

    public function __construct() {
        add_action('admin_menu', [$this, 'add_plugin_page']);
        add_action('admin_init', [$this, 'register_settings']);
        add_action('admin_post_' . 'fetch_data_action', [$this, 'fetch_data_action']);
        add_action('admin_notices', [$this, 'admin_notices']);
    }

    public function admin_notices() {
        if (isset($_GET['data_fetched']) && $_GET['data_fetched'] === 'true') {
            echo '<div class="notice notice-success is-dismissible"><p><strong>Data fetch done.</strong></p></div>';
        }
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
        echo '<h2>How to Use</h2>';
        echo '<p>On the page editor please use</p>';
        echo '<p><strong>[' . Shortcode::SHORTCODE . ']</strong></p>';
        echo '<hr />';
        echo '<form method="post" action="options.php">';

        settings_fields('betterhealth_plugin_options');
        // wp_nonce_field('update_data_action');
        do_settings_sections('betterhealth_plugin');
        submit_button();

        echo '</form>';

        echo '<hr />';

        echo '<form method="post" action="' . esc_url(admin_url('admin-post.php')) . '">';
        // wp_nonce_field('fetch_data_action');
        echo '<input type="hidden" name="action" value="fetch_data_action" />';
        submit_button('Fetch data from Mockaroo', 'secondary');
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
        <p>&nbsp;</p>
        <div><strong>Sample data:</strong></div>
        <pre>
[{
    "id": 1,
    "sku": "sku-1000",
    "category": "design",
    "name": "Fantastic Widget",
    "description": "Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.",
    "technology": "smartphone",
    "sub_technology": "AR/VR",
    "vendor": "Global Imports",
    "product_type": "electronics"
}]
        </pre>
        <?php
    }

    public function sanitize($input) {
        return $input;
    }

    public function fetch_data_action() {
        $data = new Data();

        // check_admin_referer('fetch_data_action');
        $options = get_option(self::OPTION_NAME);

        $options[self::JSON_DATA_FIELDNAME] = $data->get_sample_data();
        update_option(self::OPTION_NAME, $options);

        wp_redirect(
            add_query_arg([
                'page' => 'better-health',
                'data_fetched' => 'true',
            ],
            admin_url('options-general.php')
        ));

        exit;
    }
}