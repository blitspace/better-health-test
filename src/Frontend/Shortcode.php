<?php

namespace BetterHealth\Frontend;

use BetterHealth\Data\Data;
use BetterHealth\Admin\SettingsPage;

class Shortcode {
    const SHORTCODE = 'betterhealth_shortcode';
    private $raw_data;
    private $decoded_data;

    public function __construct() {
        $data = new Data();

        $this->raw_data = $data->get_data();
        $this->decoded_data = json_decode($this->raw_data);

        add_shortcode(self::SHORTCODE, [$this, 'render_shortcode']);
    }

    private function get_unique_options($prop) {
        $_options = [];


        foreach($this->decoded_data as $row) {
            if (property_exists($row, $prop)) {
                $_options[] = $row->{$prop};
            }
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
        $data = apply_filters('betterhealth_shortcode_data', $data);

        $technology_options = apply_filters('betterhealth_technology_options', $this->get_technology_options());
        $sub_technology_options = apply_filters('betterhealth_sub_technology_options', $this->get_sub_technology_options());
        $vendor_options = apply_filters('betterhealth_vendor_options', $this->get_vendor_options());
        $product_type_options = apply_filters('betterhealth_product_type_options', $this->get_product_type_options());


        return '<section>'
            // . '<pre class="text-sm">' . $data . '</pre>'
            . '<div id="betterhealth-react-app"></div>'
            . '<script>'
            . 'window.bh = {};'
            // . 'window.bh.data = ' . $this->raw_data . ';'
            . 'window.bh.data = ' . $data . ';'
            . 'window.bh.technologyOptions = '     . json_encode($technology_options)     . ';'
            . 'window.bh.subTechnologyOptions = '  . json_encode($sub_technology_options) . ';'
            . 'window.bh.vendorOptions = '         . json_encode($vendor_options)         . ';'
            . 'window.bh.productTypeOptions = '    . json_encode($product_type_options)   . ';'
            . '</script>'
            . '</section>';
    }
}
