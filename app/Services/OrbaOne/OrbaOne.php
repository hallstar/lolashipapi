<?php

namespace App\Services\OrbaOne;

use GuzzleHttp\Client;

class OrbaOne
{
    public $key;
    public $secret;
    public $url;

    public function __construct()
    {
        $this->key = env('ORBA_ONE_ACCESS_KEY', '7d3125245e644ce29f0e56e47034ba84');
        $this->secret = env('ORBA_ONE_SECRET_KEY', '7a4435ff901e4ebeaae785b648344076');
        $this->url = env('ORBA_ONE_API', 'http://orbadataapi.us-east-2.elasticbeanstalk.com/api/v1');
    }

    public function verify($loginToken)
    {
        $client = new Client();

        $res = $client->post("$this->url/login/verify", [
            'json' => ['loginToken' => $loginToken],
            'headers' => [
                'AccessKey' => $this->key,
                'Secret' => $this->secret,
                'Content-Type' => 'application/json',
            ],
        ]);

        $result = new \StdClass;
        $result->data = json_decode($res->getBody());
        $result->status = $res->getStatusCode();
        $result->isSuccessful = $res->getStatusCode() == 200 ? true : false;

        return $result;
    }

    public function fetchUserData($userId)
    {
        $client = new Client();

        $res = $client->get("$this->url/user/$userId/data", [
            'headers' => [
                'AccessKey' => $this->key,
                'Secret' => $this->secret,
            ],
        ]);

        $result = new \StdClass;
        $result->data = json_decode($res->getBody());
        $result->status = $res->getStatusCode();
        $result->isSuccessful = $res->getStatusCode() == 200 ? true : false;

        return $result;
    }
}
