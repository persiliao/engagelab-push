<?php

namespace PersiLiao\Engagelab;

class Push extends Service {

    protected static string $service = "push";

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function send(array $body) {
        self::getHttpClient()->post(self::$service)->withBody(json_decode($body));
    }
}