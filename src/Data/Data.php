<?php

namespace BetterHealth\Data;

class Data {
    const SAMPLE_DATA_PATH = './sample.json';
    const SAMPLE_CSV_DATA_PATH = './sample.csv';
    const URL = 'https://my.api.mockaroo.com/better_health.json';
    const KEY = 'de6560a0';

    private $data = [];

    public function __construct($preload = True) {
        if ($preload) {
            $this->data = $this->get_sample_data();
        }
    }

    public function get_data() {
        return $this->data;
    }

    public function get_sample_data() {
        $jsonString = file_get_contents(plugin_dir_path(__FILE__) . self::SAMPLE_DATA_PATH);

        return $jsonString;
    }

    public function do_curl() {
        $curl = curl_init();
        
        curl_setopt($curl, CURLOPT_URL, self::URL . '?key=' . self::KEY);

        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        $response = curl_exec($curl);
        
        if($e = curl_error($curl)) {
            echo $e;
        } else {
            $decodedData = json_decode($response, true); 
                
            // var_dump($decodedData);

            $this->data = $response;
        }
        
        curl_close($curl);

        return $response;
    }

    public function parse_csv($uploaded_file) {
        $csv_array = array_map('str_getcsv', file($uploaded_file));
        $header = array_shift($csv_array);

        $assoc_array = [];

        foreach ($csv_array as $row) {
            $assoc_row = [];
            foreach ($header as $index => $column_name) {
                if (isset($row[$index])) {
                    $assoc_row[$column_name] = $row[$index];
                } else {
                    error_log('Missing column (' . __FILE__ . ':' . __LINE__ . '): '. $column_name);
                }
            }
            $assoc_array[] = $assoc_row;
        }

        return $assoc_array;
    }
}

