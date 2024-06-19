<?php

namespace BetterHealth\Data;

class Data {
    const SAMPLE_DATA_PATH = './sample.json';
    const URL = 'https://my.api.mockaroo.com/better_health.json';
    const KEY = 'de6560a0';

    private $data = [];

    public function __construct() {
        // $jsonString = file_get_contents(plugin_dir_path( __FILE__ ) . self::SAMPLE_DATA_PATH);
        // $this->data = $jsonString;

        $this->do_curl();
        // $this->data = '[]';
    }

    public function get_data() {
        return $this->data;
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
    }
}

