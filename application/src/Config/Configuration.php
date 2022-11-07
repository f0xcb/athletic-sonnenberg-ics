<?php

namespace App\Config;

use RuntimeException;

require_once __DIR__ . '/config.php';

class Configuration
{

    public static function getApiUrl(): string
    {
        if (!defined('API_URL')) {
            throw new RuntimeException('CAN NOT FIND CONFIG PARAMETER "API_URL" CHECK config.php');
        }

        return API_URL;
    }

}