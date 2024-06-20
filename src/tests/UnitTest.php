<?php
namespace UnitTestFiles\Test;

use PHPUnit\Framework\TestCase;
use BetterHealth\Data\Data;


class UnitTest extends TestCase
{
    public function test_data__parse_csv() {
        $data = new Data($preload = False);
        $file = '../Data/sample.csv';

        $data_array = $data->parse_csv($file);

        $sample_data = $data_array[0];

        $this->assertTrue(array_key_exists('id', $sample_data));
        $this->assertTrue(array_key_exists('sku', $sample_data));
        $this->assertTrue(array_key_exists('category', $sample_data));
        $this->assertTrue(array_key_exists('name', $sample_data));
        $this->assertTrue(array_key_exists('description', $sample_data));
        $this->assertTrue(array_key_exists('technology', $sample_data));
        $this->assertTrue(array_key_exists('sub_technology', $sample_data));
        $this->assertTrue(array_key_exists('vendor', $sample_data));
        $this->assertTrue(array_key_exists('product_type', $sample_data));

        $this->assertTrue(count($data_array) === 11);
    }
}

?>
