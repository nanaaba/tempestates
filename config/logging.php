<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
return [
    'channels' => [
        'stack' => [
            'driver' => 'stack',
            'name' => 'channel-name',
            'channels' => ['syslog', 'slack'],
        ],
        'syslog' => [
            'driver' => 'syslog',
            'level' => 'debug',
        ],
        'slack' => [
            'driver' => 'slack',
            'url' => env('LOG_SLACK_WEBHOOK_URL'),
            'username' => 'rotamac',
            'emoji' => ':boom:',
            'level' => 'critical',
        ],
    ],
];
