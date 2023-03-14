<?php

namespace App\Parce\Users;

use App\Interfaces\Entity;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use DiDom\Document;

class Users implements Entity
{
    public const PATH = ROOT."/docs/emails.txt";
    public const FIRST = 40000;
    public const LAST = 40100;
    
    public $emails = [];

    public function parce($settings)
    {
        try{
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HEADER, false);
            
            for($i = self::FIRST; $i <= self::LAST; $i++){
                curl_setopt($curl, CURLOPT_URL, $settings::DOMAIN."$i/");
                $str = curl_exec($curl);
                
                $document = new Document($str);
                $content = $document->find('div.soc-block-contact-item');
                if(!empty($content[0])){
                    if(str_contains($content[0]->text(), '@')){
                        $email = trim($content[0]->text());
                        
                        file_put_contents(self::PATH, $email."\r\n", FILE_APPEND);
                    }

                } 
            }
            curl_close($curl);   
        }catch(\Exception $e){
            $error->exceptionHandler($e);
            die();
        }
       
    }
}