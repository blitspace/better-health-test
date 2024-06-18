<?php
/**
 * Plugin Name: My Plugin
 * Description: A simple WordPress plugin with namespaces
 * Version: 1.0
 * Author: Your Name
 * Text Domain: my-plugin
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/init.php';
