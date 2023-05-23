<?php

namespace PersiLiao\Engagelab;

use InvalidArgumentException;
use ParagonIE\ConstantTime\Base64;

class App {

    private string $domain = "https://push.api.engagelab.cc/";

    private string $appKey;

    private string $masterSecret;

    private static App $app;

    /**
     * @param  string  $appKey
     * @param  string  $masterSecret
     */
    private function __construct(string $appKey, string $masterSecret) {
        $this->appKey = $appKey;
        $this->masterSecret = $masterSecret;
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
     * @return string
     */
    public function getDomain(): string {
        return $this->domain;
    }

    /**
     * @return string
     */
    public function getAppKey(): string {
        return $this->appKey;
    }

    /**
     * @return string
     */
    public function getMasterSecret(): string {
        return $this->masterSecret;
    }

}