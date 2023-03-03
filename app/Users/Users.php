<?php

namespace App\Users;

use App\Interfaces\Entity;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use DiDom\Document;

class Users implements Entity
{
    public function parce($settings)
    {
        
        try{
            //for($i = 2; $i <= 5; $i++){
                $response = $settings->getClient()->get($settings::DOMAIN."4/");
                
                if($response->getStatusCode() == 500){
                    
                    $resBody = (string)$response->getBody();
                    $resBody = iconv("windows-1251","utf-8", $resBody);
                    $document = new Document($resBody);
                     
                    $emails = $document->find("div soc-block-contact-item");
                    var_dump($emails);
                    //file_put_contents(ROOT."/docs/users.txt", "hello \r\n", FILE_APPEND);
                }
            //}

        }catch(RequestException $e){
            echo Psr7\Message::toString($e->getRequest());
            echo "<p>";
            echo Psr7\Message::toString($e->getResponse());
            
        }
    }
}