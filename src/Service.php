<?php

namespace PersiLiao\Engagelab;

use GuzzleHttp\Client;

abstract class Service {

    protected static function getHttpClient(): Client {
        $app = App::getInstance();

        return new Client([
            'base_uri' => $app->getDomain(),
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'auth' => [
                $app->getAppKey(),
                $app->getMasterSecret(),
            ],
        ]);
    }
}