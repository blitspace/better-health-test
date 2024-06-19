<?php

namespace BetterHealth\Data;

class Data {
    const SAMPLE_DATA_PATH = './sample.json';
    private $data = [];

    public function __construct() {
        $jsonString = file_get_contents(plugin_dir_path( __FILE__ ) . self::SAMPLE_DATA_PATH);
        $this->data = $jsonString;
    }

    public function get_data() {
        return $this->data;
    }
}

