<?php

namespace PersiLiao\Engagelab;

use GuzzleHttp\Client;

abstract class Service {

    protected static function getHttpClient(): Client {
        return new Client([
            'base_uri' => App::getInstance()->getDomain(),
        ]);
    }
}