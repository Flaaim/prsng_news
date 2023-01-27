<?php

namespace App;

use App\Entity;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use App\Abstract\Parce;
use DiDom\Document;
use GuzzleHttp\Client;

class News implements Entity
{

    public function parce()
    {
        $client = new Client();
        $response = $client->get('https://www.google.com');
        if($response->getStatusCode() == 200){
            $resBody = (string)$response->getBody();
            echo $resBody;
        }
    }


}
