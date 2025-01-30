<?php

namespace App\Services;

use GuzzleHttp\Client;

class AfricaTalkingService
{
    protected $client;
    protected $username;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->username = env('AFRICASTALKING_USERNAME');
        $this->apiKey = env('AFRICASTALKING_API_KEY');
    }

    public function sendSMS($to, $message)
    {
        $url = 'https://api.africastalking.com/version1/messaging';
        
        $response = $this->client->post($url, [
            'auth' => [$this->username, $this->apiKey],
            'form_params' => [
                'username' => $this->username,
                'to' => $to,
                'message' => $message,
                'from' => 'sandbox',
            ],
        ]);

        return json_decode($response->getBody(), true);
    }
}
