<?php

namespace App\Libraries;

class Bantuan
{
    function rajaOngkirAPI($url, $token, $data = null, $method = null)
    {
        $client = service(
            'curlrequest',
            ['verify' => false]
        );
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'key' => $token,
        ];
        $response = $client->request(
            $method,
            $url,
            [
                'form_params' => $data,
                'headers' => $headers,
                'http_errors' => false
            ]
        );
        return $response->getBody();
    }
}
