<?php
/**
 * Author: Theo Champion
 * Date: 15/02/2023
 * Time: 15:40
 */

return [
    'providers' => [
        'sendinblue' => [
            'api_key' => env('SENDINBLUE_API_KEY', null)
        ]
    ]
];
