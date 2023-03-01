<?php 

namespace App\Ohranatruda;

use App\Interfaces\Entity;
use App\Interfaces\ParceSettings;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use DiDom\Document;

class Ohranatruda implements Entity
{

    public function parce(ParceSettings $settings)
    {
        
        $response = $settings->getClient()->get($settings::DOMAIN.'/news');
        if($response->getStatusCode() == 200){
            $resBody = (string)$response->getBody();
            $document = new Document($resBody);
            $news = [];
            $ids = $document->find('div.news-link a');
            foreach($ids as $id){
                $news[$this->getIdNews($id->attr('href'))]['id'] = $this->getIdNews($id->attr('href'));

                
            }
            
            foreach($news as $items){
                foreach($items as $item){
                    $response = $settings->getClient()->get($settings::DOMAIN.'/news/show/'.$item);
                    if($response->getStatusCode() == 200){
                        $resBody = (string)$response->getBody();
                        
                        $document = new Document($resBody);
                        $content = $document->find('div.news-inner');
                        
                        //$text = $document->find('div.b-news__text');
                        foreach($content as $title){

                            $str = $title->html();
                            
                            $news[$this->getIdNews($item)]['title'] = $this->getHeader($str);
                            $news[$this->getIdNews($item)]['date'] = trim($this->getDate($str));
                            $news[$this->getIdNews($item)]['text'] = strip_tags($this->getText($str));
                        }
                        

                    }
                }
              
           $settings->getDb()->save(
                $news[$this->getIdNews($item)]['id'],
                $news[$this->getIdNews($item)]['title'], 
                $news[$this->getIdNews($item)]['text'], 
                date('Y-m-d', strtotime('2023-02-24'))); 
            } 
            
        }
    }

    protected function getIdNews($string): string
    {
        preg_match('#[0-9]{4}#', $string, $matches);
        return $matches[0];
    }

    protected function getHeader($str)
    {   
        preg_match('#<h1>(.*?)<\/h1>#', $str, $matches);
        return $matches[1];
    }
    protected function getDate($str){
        preg_match('#<div class="news-inner__date">(\n.*?)<\/div>#', $str, $matches);
        return $matches[1];
    }
    protected function getText($str){
        preg_match('/<div class="b-news__text">(.*?<\/div>){1,}/s', $str, $matches);
        return $matches[0];
    }
}
