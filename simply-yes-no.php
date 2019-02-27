<?php
/**
 * Plugin Name: Simply Yes or No
 * Plugin URI: http://github.com/iamandrewluca/simply-yes-no
 * Description: Simply Yes or No
 * Version: 1.0
 * Author: Andrew Luca
 * Author URI: https://iamandrewluca.com
 **/

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

call_user_func(function () {
    $plugin = new \SimplyYesNo\Plugin();
    $plugin->bootstrap();
});
