<?php

namespace PersiLiao\Engagelab;

use GuzzleHttp\Client;

abstract class Service {

    protected static function getHttpClient(): Client {
        return new Client([
            'base_uri' => App::getInstance()->getDomain(),
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => sprintf("Basic %s", App::getInstance()->getAuth()),
            ],
        ]);
    }
}