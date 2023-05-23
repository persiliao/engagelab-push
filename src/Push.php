<?php

namespace PersiLiao\Engagelab;

class Push extends Service {

    protected static string $service = "/v4/push";

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function send(array $body) {
        return self::getHttpClient()->post(self::$service, [
            'json' => $body,
        ]);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function sendRegistrationNotification(
        array $registrationIds,
              $alert,
              $title = '',
              $platform = 'all',
              $androidOptions = [],
              $iosOptions = [],
              $options = []
    ) {
        $to = [
            'registration_id' => $registrationIds,
        ];

        return self::sendNotification($to, $alert, $title, $platform, $androidOptions, $iosOptions, $options);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function sendAllNotification(
        $alert,
        $title = '',
        $platform = 'all',
        $androidOptions = [],
        $iosOptions = [],
        $options = []
    ) {
        return self::sendNotification('all', $alert, $title, $platform, $androidOptions, $iosOptions, $options);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function sendNotification(
        $to,
        $alert,
        $title = '',
        $platform = 'all',
        $androidOptions = [],
        $iosOptions = [],
        $options = []
    ) {
        $body = [
            'to' => $to,
            'body' => [
                'platform' => $platform,
                'notification' => [
                    'android' => array_merge([
                        'alert' => $alert,
                        "title" => $title,
                    ], $androidOptions),
                    'ios' => array_merge([
                        "alert" => $alert,
                    ], $iosOptions),
                ],
            ],
        ];

        return self::send(array_merge($body, $options));
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function sendMessage(
        $to,
        $message,
        $title = '',
        $contextType = 'text',
        $platform = 'all',
        $extras = [],
        $options = []
    ) {
        $body = [
            'to' => $to,
            'body' => [
                'platform' => $platform,
                'message' => [
                    'msg_content' => $message,
                    'content_type' => $contextType,
                    'title' => $title,
                    'extras' => $extras,
                ],
            ],
        ];

        return self::send(array_merge($body, $options));
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function sendRegistrationMessage(
        array $registrationIds,
              $message,
              $title = '',
              $contextType = 'text',
              $platform = 'all',
              $extras = [],
              $options = []
    ) {
        $to = [
            'registration_id' => $registrationIds,
        ];

        return self::sendMessage($to, $message, $title, $contextType, $platform, $extras, $options);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function sendAllMessage(

        $message,
        $title = '',
        $contextType = 'text',
        $platform = 'all',
        $extras = [],
        $options = []
    ) {
        return self::sendMessage('all', $message, $title, $contextType, $platform, $extras, $options);
    }
}