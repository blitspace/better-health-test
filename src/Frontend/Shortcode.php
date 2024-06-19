<?php

namespace BetterHealth\Frontend;

use BetterHealth\Data\Data;
use BetterHealth\Admin\SettingsPage;

class Shortcode {
    private $raw_data;
    private $decoded_data;

    public function __construct() {
        $data = new Data();

        $this->raw_data = $data->get_data();
        $this->decoded_data = json_decode($this->raw_data);

        add_shortcode('betterhealth_shortcode', [$this, 'render_shortcode']);
    }

    private function get_unique_options($prop) {
        $_options = [];


        foreach($this->decoded_data as $row) {
            $_options[] = $row->{$prop};
        }
    
        $unique = array_unique($_options);

        return array_values($unique);
    }

    private function get_technology_options() {
        return $this->get_unique_options('technology');
    }

    private function get_sub_technology_options() {
        return $this->get_unique_options('sub_technology');
    }

    private function get_vendor_options() {
        return $this->get_unique_options('vendor');
    }

    private function get_product_type_options() {
        return $this->get_unique_options('product_type');
    }

    public function render_shortcode($atts, $content = null) {
        $data = get_option(SettingsPage::OPTION_NAME)[SettingsPage::JSON_DATA_FIELDNAME];

        return '<section>'
            // . '<pre class="text-sm">' . $data . '</pre>'
            . '<div id="betterhealth-react-app"></div>'
            . '<script>'
            . 'window.bh = {};'
            . 'window.bh.data = ' . $this->raw_data . ';'
            . 'window.bh.technologyOptions = ' . json_encode($this->get_technology_options()) . ';'
            . 'window.bh.subTechnologyOptions = ' . json_encode($this->get_sub_technology_options()) . ';'
            . 'window.bh.vendorOptions = ' . json_encode($this->get_vendor_options()) . ';'
            . 'window.bh.productTypeOptions = ' . json_encode($this->get_product_type_options()) . ';'
            . '</script>'
            . '</section>';
    }
}
