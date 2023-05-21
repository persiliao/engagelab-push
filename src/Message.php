<?php

namespace PersiLiao\Engagelab;

class Message {

    private string $form;

    /**
     * @var string|array
     */
    private $to;

    /*
     * [
    "from" =>"push",
    "to" =>"all",
    "body" => [
        "platform" =>"all",
        "notification" => [
            "android" => [
                "alert" =>"Hi, Push!",
                "title" =>"Send to Android",
                "builder_id" =>1,
                "extras" => [
                    "newsid" =>321
                ]
            ],
            "ios" => [
                "alert" =>"Hi, MTPush!",
                "sound" =>"default",
                "badge" =>"+1",
                "extras" => [
                    "newsid" =>321
                ]
            ]
        ],
        "message" => [
            "msg_content" =>"Hi,MTPush",
            "content_type" =>"text",
            "title" =>"msg",
            "extras" => [
                "key" =>"value"
            ]
        ],
        "options" => [
            "time_to_live" =>60,
            "apns_production" =>false
        ]
    ],
    "request_id" =>"12345678",
    "custom_args" =>"business info"
]
     * */
}