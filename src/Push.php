<?php

namespace PersiLiao\Engagelab;

class Push extends Service {

    protected static string $service = "/v4/push";

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function send(array $body) {
        return self::getHttpClient()->post(self::$service, [
            'body' => json_encode($body),
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => sprintf("Basic %s", App::getInstance()->getAuth()),
            ],
        ]);
    }
}