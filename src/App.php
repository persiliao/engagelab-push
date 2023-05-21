<?php

namespace PersiLiao\Engagelab;

use InvalidArgumentException;
use ParagonIE\ConstantTime\Base64;

class App {

    private string $domain = "https://push.api.engagelab.cc/v4";

    private string $auth;

    private static App $app;

    /**
     * @param  string  $appKey
     * @param  string  $masterSecret
     */
    private function __construct(string $appKey, string $masterSecret) {
        $this->auth = $this->buildAuth($appKey, $masterSecret);
    }

    /**
     * @return \PersiLiao\Engagelab\App
     * @throws \InvalidArgumentException
     */
    public static function getInstance() {
        if (self::$app instanceof self) {
            return self::$app;
        }
        throw new InvalidArgumentException("Must provide a app instance");
    }

    /**
     * @param  string  $appKey
     * @param  string  $masterSecret
     *
     * @return void
     */
    public static function initialize(string $appKey, string $masterSecret) {
        self::$app = new App($appKey, $masterSecret);
    }

    /**
     * @param  string  $appKey
     * @param  string  $masterSecret
     *
     * @return string
     */
    private function buildAuth(string $appKey, string $masterSecret) {
        return Base64::encode(implode(":", [$appKey, $masterSecret]));
    }

    /**
     * @return string
     */
    public function getDomain(): string {
        return $this->domain;
    }

    /**
     * @return string
     */
    public function getAuth(): string {
        return $this->auth;
    }

    public function buildServiceApiUrl(string ...$service) {
        return implode("/", [$this->domain, $service]);
    }
}