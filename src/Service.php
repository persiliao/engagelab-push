<?php

namespace PersiLiao\Engagelab;

use GuzzleHttp\Client;

abstract class Service {

    protected static function getHttpClient(): Client {
        return new Client([
            'baseUrl' => static::getApiUrl(),
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => sprintf("Basic %s", App::getInstance()->getAuth()),
            ],
        ]);
    }

    protected static function buildMessage() {

    }

    protected static function getApiUrl(): string {
        return App::getInstance()->buildServiceApiUrl(static::$service);
    }
}